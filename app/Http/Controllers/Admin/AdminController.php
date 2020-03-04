<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lottery;
use App\Models\Draw;
use App\Models\PrizeType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function drawForm(Request $request){
        $lottery = Lottery::select('user_id', 'type')->get();
        $winnerArray = array();
        $prizeArray = array();
        if($lottery){
            foreach($lottery as $lott){
                array_push($winnerArray, $lott->user_id);
                array_push($prizeArray, $lott->type);
            }
        }
        $draw = Draw::select('*')
                    ->whereNotIn('user_id', $winnerArray)
                    ->get();
        
        $prize = PrizeType::select('*')
                          ->whereNotIn('name', $prizeArray)
                          ->get();

        return view('admin.drawForm',['data' => $draw, 'dropdown' => $prize]);
    }

    public function submitDraw(Request $request){
        $validator = Validator::make($request->all(),[
			'prize_type' => 'required',
            'auto_generate' => 'required'
        ]);
        $prize_type = $request->input('prize_type');
        $auto_generate = $request->input('auto_generate');
        $winner_number = $request->input('winner_number');
        
        $lottery = Lottery::select('user_id')->get();
        $winnerArray = array();
        if($lottery){
            foreach($lottery as $lott){
                array_push($winnerArray, $lott->user_id);
            }
        }
        $mostDraw = Draw::select('user_id', DB::raw('count(*) as total'))
                        ->whereNotIn('user_id', $winnerArray)
                        ->groupBy('user_id')
                        ->limit(2)
                        ->orderBy('total', 'desc')
                        ->get();
        $mostArray = array();
        if($mostDraw){
            foreach($mostDraw as $most){
                array_push($mostArray, $most->user_id);
            }
        }
        if($auto_generate == 'yes'){
            if($mostArray){
                $draw = Draw::select('user_id', 'draw_number')
                    ->whereIn('user_id', $mostArray)
                    ->limit(1)
                    ->orderByRaw('RAND()')
                    ->get();
                $random_number = $draw[0]->draw_number;
                $user_id = $draw[0]->user_id;
                $winner_number = str_pad($random_number, 4, "0", STR_PAD_LEFT);
            }else{
                return redirect()->back()->with('error', 'All user has been WIN their prize.');
            }
        }else{
            if($winner_number == null || $winner_number == '' ){
                return redirect()->back()->with('error', 'Please select winner number, if not generate randomly');
            }else{
                $draw = Draw::select('*')
                            ->where('draw_number', $winner_number)
                            ->first();
                $user_id = $draw->user_id;
            }
        }
        $lotteryHistory = new Lottery;
        $lotteryHistory->type = $prize_type;
        $lotteryHistory->winner_number = $winner_number;
        $lotteryHistory->user_id = $user_id;
        $lotteryHistory->save();
        return redirect()->back()->with('success', 'Your lucky draw has been selected!');
    }
}
