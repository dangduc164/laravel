@extends('layouts.app')


@section('content')

<div class="main py-5">
    <div class="container">
        <h2>Sửa thông tin sản phẩm nữ</h2>
        <form action="{{route('show-female',$females->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            

            <div class="alert alert-warning mb-3 mt3">
                 Bạn đang sửa sản phẩm có ID là: <strong>{{$females->id}}</strong>
              </div>

            <div class="mb-3 mt-3">
                <label for="name">Tên sản phẩm: </label>
                <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="name" value="{{$females->name}}">
            </div>

            <div class="mb-3">
                <label for="pwd">Nhập giá sản phẩm $: </label>
                <input type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm" name="price" value="{{$females->price}}">
            </div>

            <div class="mb-3">
                <label for="content">Mô tả sản phẩm:  </label>
                <input type="text" class="form-control" rows="5" id="content" name="content" value="{{$females->content}}">
            </div>

            <div class="mb-3">
                <label for="image_path">Ảnh sản phẩm:  </label>
                <input type="file" class="form-control" rows="5" id="images" name="image_path" value="{{$females->image_path}}">
            </div>
            
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>
</div>
@endsection