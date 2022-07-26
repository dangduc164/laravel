<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UI\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Female_product;
use App\Models\Male_product;
use App\Models\Order;
use App\Models\Order_product;
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
            $cart->type = $request->type;
            // dd($cart);
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function addcartB(Request $request, $id)
    {
        if (Auth::check()) {
            $user = auth()->user();
            $product = Female_product::find($id);
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
            $cart->type = $request->type;
            // dd($cart);
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function showcart()
    {
        //show sản phẩm thêm vào giỏ hàng theo user_email
        $email_user = Auth::user()->email;
        // dd($email_user);
        $shows = DB::table('carts')->where('email', $email_user)->get();
        // dd($shows);
        return view('cart', compact('shows'));
    }

    public function updataItem(Request $request, $id)
    {
        //sửa số lượng size trong giỏ hàng
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
        return redirect()->route('cartUI')->with('delete', 'Xóa sản phẩm thành công!');
    }
    public function orderItem(Request $request, $id)
    {
        $user = auth()->user();
        $product = Cart::find($id);
        $order = new order_product;
        // $order->name = $user->name;
        $order->userName = $user->name;
        $order->email = $user->email;
        $order->nameItem = $product->name;
        $order->price = $product->price;
        // $order->content = $product->content;
        $order->image_path = $product->image_path;
        $order->amount = $product->amount;
        $order->size = $product->size;
        $order->phone = $product->phone;
        $order->type = $product->type;
        $order->save();
        // Order::newOrder($newOrder);
        // return view('cart');
        return redirect()->route('cartUI')->with('success', 'Đặt hàng thành công!');
    }
    public function showOrder()
    {
        $item_gs = DB::table('order_products')->where('type', 'nữ')->get();
        $item_bs = DB::table('order_products')->where('type', 'nam')->get();
        return view('layouts.order', compact('item_gs', 'item_bs'));
    }
}
