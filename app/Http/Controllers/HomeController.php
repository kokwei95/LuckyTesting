<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lottery = DB::table('lotterys')
                    ->join('users', 'users.id', '=', 'lotterys.user_id')
                    ->join('prize_types', 'prize_types.name', '=', 'lotterys.type')
                    ->orderBy('lotterys.created_at', 'desc')
                    ->select('lotterys.*','users.name', 'prize_types.title')
                    ->paginate(10);

        return view('home',['data' => $lottery]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $lottery = DB::table('lotterys')
                    ->join('users', 'users.id', '=', 'lotterys.user_id')
                    ->join('prize_types', 'prize_types.name', '=', 'lotterys.type')
                    ->orderBy('lotterys.created_at', 'desc')
                    ->select('lotterys.*','users.name', 'prize_types.title')
                    ->paginate(10);

        return view('adminHome',['data' => $lottery]);
    }
}
