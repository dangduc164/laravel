 @extends('layouts.app')


@section('content')

<div class="main py-5">
  <div class="container-fluid">
    <div class="hanldeBtnCreateMale" >
        <button class="btn btn-success">
            <a class="text-white" href={{route('create-shoes')}}>
                <i class="fa-solid fa-circle-plus"></i> Thêm sản phẩm mới
            </a>
        </button>
    </div>
        <table class="table border">
            <thead class="bg-warning">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Thao tác</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach($shoes as $shoe)
                <tr>
                    <th scope="row">{{$shoe -> id}}</th>
                    <td><img style="width: 150px" src="./images/img-shoes/{{$shoe -> image_path}}" alt=""></td>
                    <td>{{$shoe -> name}}</td>
                    <td>{{$shoe -> price}}</td>
                    <td  style="display: flex; justify-content: space-evenly;">
                        <button class="btn btn-primary"><i class="fa-solid fa-pen"></i> Chỉnh sửa</button>
                        <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Xóa</button>
    
                    </td>
    
                </tr>
                @endforeach
    
            </tbody>
        </table>
  </div>
</div>
@endsection