<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UI\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Male_product;
use App\Models\Order;
use Exception;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $males = DB::table('female_products')->get();
        $females = DB::table('male_products')->get();
        $shoes = DB::table('shoes_products')->get();

        return view('welcome', compact('males', 'females', 'shoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = DB::all();
        return view('welcome', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addcart(Request $request, $id)
    {
        if (Auth::check()) {
            $user = auth()->user();
            $product = Male_product::find($id);
            $cart = new cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->name = $product->name;
            $cart->price = $product->price;
            $cart->content = $product->content;
            $cart->image_path = $product->image_path;
            $cart->amount = $request->amount;
            $cart->size = $request->size;
            $cart->phone = $request->phone;
            // dd($cart);
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function showcart()
    {
        $email_user = Auth::user()->email;
        // dd($email_user);
        $shows = DB::table('carts')->where('email', $email_user)->get();
        // dd($shows);
        return view('cart', compact('shows'));
    }

    public function updataItem(Request $request, $id)
    {
        $input = $request->except(['_token']);;
        try {
            Cart::newItem($input, $id);
            return redirect()->route('cartUI')->with('success', 'Cập nhật thành công!');
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function dltItem($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('cartUI')->with('success', 'Xóa thông tin liên hệ thành công!');
    }
    public function orderItem(Request $request, $id)
    {
        // $user = auth()->user();
        // $product = Cart::find($id);
        // $order = new order;
        // $order->name = $user->name;
        // $order->email = $user->email;
        // $order->name = $product->name;
        // $order->price = $product->price;
        // $order->content = $product->content;
        // $order->image_path = $product->image_path;
        // $order->amount = $request->amount;
        // $order->size = $request->size;
        // $order->phone = $request->phone;
        // $item_id = DB::table('carts')->get('id');
        $orders = Cart::find($id);
        //dd($orders);
        return view('layouts.order', compact('orders'));
    }
}
