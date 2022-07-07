@extends('layouts.app')


@section('content')

<div class="main py-5">
    <div class="container">
        <h2>Thêm sản phẩm nam</h2>
        <form action="{{ route('add-male') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name">Tên sản phẩm: </label>
                <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="name">
            </div>
            <div class="mb-3">
                <label for="pwd">Nhập giá sản phẩm $: </label>
                <input type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm" name="price">
            </div>
            
            <div class="mb-3">
                <label for="content">Mô tả sản phẩm:  </label>
                <input type="text" class="form-control" rows="5" id="content" name="content">
            </div>

            <div class="mb-3">
                <label for="image_path">Ảnh sản phẩm:  </label>
                <input type="file" class="form-control" rows="5" id="images" name="image_path">
            </div>

           

            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>
</div>
@endsection