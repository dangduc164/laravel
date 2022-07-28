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
        $sumShip = DB::table('carts')->where('status', '1')->where('delivery', '2')->count();
        $sumProcessed = DB::table('carts')->where('status', '1')->where('delivery', '1')->count();
        $sumHandle = DB::table('carts')->where('status', '1')->where('delivery', '0')->count();
        $sumSuccess = DB::table('carts')->where('status', '1')->where('delivery', '3')->count();
        $sumComfirm = DB::table('carts')->where('delivery', '1')->count();
        return view('layouts.dashboard', compact('sumOrder', 'sumShip', 'sumComfirm', 'sumHandle', 'sumProcessed', 'sumSuccess'));
    }
}
