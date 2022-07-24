@extends('layouts.app')


@section('content')
    <div class="main py-5">
        <div class="container-fluid">

            {{-- thông báo --}}
            @if (session('success'))
                <div class="alert alert-success h4 text-white" id="alert" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- end thông báo --}}

            <div class="hanldeBtnCreateMale">
                <button class="btn btn-success">
                    <a class="text-white" href={{ route('create-female') }}>
                        <i class="fa-solid fa-circle-plus"></i> Thêm sản phẩm mới
                    </a>
                </button>
            </div>
            <table class="table border">
                <thead class="bg-warning">
                    <tr class="border">
                        <th scope="col">id</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Thao tác</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($females as $female)
                        <tr>
                            <th scope="row">{{ $female->id }}</th>
                            <td><img style="width: 150px" src="./images/img-female/{{ $female->image_path }}"
                                    alt=""></td>
                            <td>{{ $female->name }}</td>
                            <td>{{ $female->price }}</td>
                            <td style="display: flex; justify-content: space-evenly;">

                                <button class="btn btn-primary">
                                    <a class="text-white" href={{ route('update-spfemale', $female->id) }}>
                                        <i class="fa-solid fa-pen"></i> Chỉnh sửa
                                    </a>
                                </button>

                                <form action="{{ route('delete-female', ['id' => $female->id]) }}" method="POST"
                                    onsubmit="returnConfirmDeletr(this)">
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
