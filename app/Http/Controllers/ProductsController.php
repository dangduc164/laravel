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
use App\Models\Shoes_product;
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
            $random = rand();
            $cart->orderNumber = ($random + $product->id);
            $cart->userName = $user->name;
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
            return redirect()->route('welcome')->with('success', '???? th??m v??o gi??? h??ng');
        } else {
            return redirect('login');
        }
    }
    public function addcartB(Request $request, $id)
    {
        if (Auth::check()) {
            $user = auth()->user();
            $product = Female_product::find($id);
            $random = rand();
            $cart = new cart;
            $cart->orderNumber = ($random + $product->id);
            $cart->userName = $user->name;
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
            return redirect()->route('welcome')->with('success', '???? th??m v??o gi??? h??ng');
        } else {
            return redirect('login');
        }
    }
    public function addcartS(Request $request, $id)
    {
        if (Auth::check()) {
            $user = auth()->user();
            $product = Shoes_product::find($id);
            $random = rand();
            $cart = new cart;
            $cart->orderNumber = ($random + $product->id);
            $cart->userName = $user->name;
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
            return redirect()->route('welcome')->with('success', '???? th??m v??o gi??? h??ng');
        } else {
            return redirect('login');
        }
    }
    public function showcart()
    {
        if (Auth::check()) {
            //show s???n ph???m th??m v??o gi??? h??ng theo user_email
            $email_user = Auth::user()->email;
            // dd($email_user);
            $shows = DB::table('carts')->where('email', $email_user)->get();
            // dd($shows);
            return view('cart', compact('shows'));
        } else {
            return redirect('login');
        }
    }

    public function updataItem(Request $request, $id)
    {
        //s???a s??? l?????ng size trong gi??? h??ng
        $input = $request->except(['_token']);;
        try {
            Cart::newItem($input, $id);
            return redirect()->route('cartUI')->with('success', 'C???p nh???t th??nh c??ng!');
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /*-- order --*/
    public function orderItem(Request $request, $orderNumber)
    {
        $input = $request->except(['_token']);;
        // dd($input);
        try {
            Cart::newOrder($input, $orderNumber);
            return redirect()->route('cartUI')->with('success', '?????t h??ng th??nh c??ng!');
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    /** cancel order  */
    public function cancelOrder(Request $request, $orderNumber)
    {
        $input = $request->except(['_token']);;
        // dd($input);
        try {
            Cart::cancelOrder($input, $orderNumber);
            return redirect()->route('cartUI')->with('delete', 'H???y ?????t h??ng th??nh c??ng!');
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**-- x??a products trong gi??? h??ng- */
    public function dltItem($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('cartUI')->with('delete', 'X??a s???n ph???m th??nh c??ng!');
    }
    // public function orderItem(Request $request, $id)
    // {
    //     $user = auth()->user();
    //     $product = Cart::find($id);
    //     $order = new order_product;
    //     // $order->name = $user->name;
    //     $order->orderNumber = $product->orderNumber;
    //     $order->userName = $user->name;
    //     $order->email = $user->email;
    //     $order->nameItem = $product->name;
    //     $order->price = $product->price;
    //     // $order->content = $product->content;
    //     $order->image_path = $product->image_path;
    //     $order->amount = $product->amount;
    //     $order->size = $product->size;
    //     $order->phone = $product->phone;
    //     $order->type = $product->type;
    //     // dd($order);
    //     $order->save();
    //     // Order::newOrder($newOrder);
    //     // return view('cart');
    //     return redirect()->route('cartUI')->with('success', '?????t h??ng th??nh c??ng!');
    // }
    public function showOrder()
    {
        $item_gs = DB::table('carts')->where('type', '1')->Where('status', '1')->get();
        $item_bs = DB::table('carts')->where('type', '2')->Where('status', '1')->get();
        $item_Ss = DB::table('carts')->where('type', '3')->Where('status', '1')->get();
        return view('layouts.order', compact('item_gs', 'item_bs', 'item_Ss'));
    }
    /** cancel order  */
    public function comfirm(Request $request, $orderNumber)
    {
        $input = $request->except(['_token']);;
        // dd($input);
        try {
            Cart::comfirm($input, $orderNumber);
            return redirect()->route('order')->with('success', '???? x??c nh???n ????n h??ng!');
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //g???i h??ng
    public function comfirmShip(Request $request, $orderNumber)
    {
        $input = $request->except(['_token']);;
        // dd($input);
        try {
            Cart::comfirm($input, $orderNumber);
            return redirect()->route('order')->with('ship', '???? x??c nh???n g???i ????n h??ng!');
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //x??c nh???n thanh to??n
    public function comfirmPaid(Request $request, $orderNumber)
    {
        $input = $request->except(['_token']);;
        // dd($input);
        try {
            Cart::comfirm($input, $orderNumber);
            return redirect()->route('order')->with('paid', 'Giao h??ng th??nh c??ng!');
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    //x??a ????n h??ng
    // public function dltOrder($orderNumber)
    // {
    //     $dltOrder = Order_product::find($orderNumber);
    //     $dltOrder->delete();
    //     return redirect()->route('order')->with('success', 'X??a ????n h??ng th??nh c??ng!');
    // }


}
