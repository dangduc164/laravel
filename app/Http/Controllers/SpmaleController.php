<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Spmale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpmaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data = DB::table('spmales')->get();


        // dd($data);

        return view('spmale');
    }

    /**
     * 
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StorePostRequest $request)
    {
        //

        $input = $request->all();
        Spmale::create($input);
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

        if ($request->hasFile('content')) //kiểm tra xem trong $request có file hay không
        {
            $img = $request->content;
            //lấy tên file
            $imgNew =  $img->getClientOriginalName();
            $img->move('images', $imgNew); //upload file vào thư mục public/images
            // Lưu tên ảnh trên DB
            $input['content'] = $imgNew;
        } else {
            echo "k co file";
        }
        Spmale::add($input);
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
        $posts = Spmale::all();
        return view('posts.index', compact('posts'));
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
