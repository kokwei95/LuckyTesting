<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Draw;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function submitDraw(Request $request){
        $validator = Validator::make($request->all(),[
			'draw_number' => 'required|unique:draws',
        ])->validate();

        $current_user = Auth::user()->id;
        $draw_number = $request->input('draw_number');
        
        $count = Draw::where('user_id', $current_user)->count();
        if($count >= 5){
            return redirect()->back()->with('error', 'Limit 5 draw number is allowed.');
        }
        if($draw_number){
            $draw = new Draw;
            $draw->user_id = $current_user;
            $draw->draw_number = $draw_number;
            $draw->save();
            return redirect()->back()->with('success', 'Your lucky draw has been confirmed!');
        }    
    }
}
