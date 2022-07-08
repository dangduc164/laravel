<?php

namespace App\Http\Controllers;

use App\Models\Shoes_product;
use Illuminate\Http\Request;

class UpdateShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $shoes = Shoes_product::find($id);
        return view('layouts.update-shoes', compact('shoes'));
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
        return view('layouts.update-shoes', [

            'shoes' => Shoes_product::find($id)
        ]);
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

        // dd($request);
        $input = $request->all();
        $img = $request->image_path;
        //lấy tên file
        $imgNew =  $img->getClientOriginalName();
        $img->move('images/img-shoes', $imgNew); //upload file vào thư mục public/images
        // Lưu tên ảnh trên DB
        $input['image_path'] = $imgNew;
        $shoes = [
            'name' => $input['name'],
            'price' => $input['price'],
            'content' => $input['content'],
            'image_path' => $input['image_path'],

        ];
        if (Shoes_product::upd($shoes, $id) == true) {
            return redirect()->route('shoes')->with('success', 'Sửa sản phẩm thành công!' . $input['name']);
        };
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
