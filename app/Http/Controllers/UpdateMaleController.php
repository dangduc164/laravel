<?php

namespace App\Http\Controllers;

use App\Models\Female_product;
use App\Models\Male_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateMaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $males = Female_product::find($id);
        return view('layouts.update-male', compact('males'));
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
        return view('layouts.update-female', [

            'female' => Female_product::find($id)
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
        $input = $request->all();

        $img = $request->image_path;
        //lấy tên file
        $imgNew =  $img->getClientOriginalName();
        $img->move('images/img-male', $imgNew); //upload file vào thư mục public/images
        // Lưu tên ảnh trên DB
        $input['image_path'] = $imgNew;

        $males = [
            'name' => $input['name'],
            'price' => $input['price'],
            'content' => $input['content'],
            'image_path' => $input['image_path'],
        ];
        if (Female_product::upd($males, $id) == true) {
            return redirect()->route('male')->with('success', 'Sửa sản phẩm thành công!' . $input['name']);
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
