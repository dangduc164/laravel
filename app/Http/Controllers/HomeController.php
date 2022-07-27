<?php

namespace App\Http\Controllers;

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


    // đếm tổng đơn hàng được order
    public function index()
    {
        $sumOrder = DB::table('carts')->where('status', '1')->count();
        return view('layouts.dashboard', compact('sumOrder'));
    }
}
