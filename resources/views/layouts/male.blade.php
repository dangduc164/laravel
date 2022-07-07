 @extends('layouts.app')


@section('content')

<div class="main py-5">
   
        <div class="success">@if(session('success')){{ session('success') }} @endif</div>

    <div class="container-fluid">
        <div class="hanldeBtnCreateMale" >
            <button class="btn btn-success">
                <a class="text-white" href={{route('create-male')}}>
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
                @foreach($males as $male)
                <tr>
                    <th scope="row">{{$male -> id}}</th>
                    <td><img style="width: 150px" src="./images/img-male/{{$male -> image_path}}" alt=""></td>
                    <td>{{$male -> name}}</td>
                    <td>{{$male -> price}}</td>
                    <td  style="display: flex; justify-content: space-evenly;">
                        <button class="btn btn-primary"><i class="fa-solid fa-pen"></i> Chỉnh sửa</button>


                        <form action="{{ route('delete-male',['id'=> $male->id]) }}" method="POST" onsubmit="returnConfirmDeletr(this)"> 
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger text-white" type="submit">
                                    <i class="fa-solid fa-trash-can"></i> Xóa
                                </button>
                        </form>
    
                    </td>
    
                </tr>
                @endforeach
    
            </tbody>
        </table>
    </div>
</div>
@endsection