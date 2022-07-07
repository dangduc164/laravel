<?php

namespace App\Http\Controllers;

use App\Models\Shoes_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoes = DB::table('shoes_products')->get();
        return view('layouts.shoes', compact('shoes'));
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
        $input = $request->all();

        if ($request->hasFile('image_path')) //kiểm tra xem trong $request có file hay không
        {
            $img = $request->image_path;
            //lấy tên file
            $imgNew =  $img->getClientOriginalName();
            $img->move('images/img-shoes', $imgNew); //upload file vào thư mục public/images
            // Lưu tên ảnh trên DB
            $input['image_path'] = $imgNew;
        } else {
            echo "Bạn chưa có file";
        }
        Shoes_product::add($input);

        return redirect()->route('layouts.shoes')->with('success', 'Thên sản phẩm mới thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
