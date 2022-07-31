<?php

namespace App\Http\Controllers;

use App\Models\Demo;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfromationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = DB::table('users')->get();
        return view('layouts.member', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_token']);;
        // dd($input);
        try {
            User::comfirm($input, $id);
            return redirect()->route('member')->with('success', 'Đã cấp quuyền');
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function reCall(Request $request, $id)
    {
        $input = $request->except(['_token']);;
        // dd($input);
        try {
            User::comfirm($input, $id);
            return redirect()->route('member')->with('recall', 'Đã thu hồi quyền!');
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
