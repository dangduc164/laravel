@extends('layouts.app')


@section('content')
    <div class="main py-5">
        <div class="container-fluid">
            <div class="hanldeBtnCreateMale">
                <h2>Danh sách đơn hàng đồ thể thao nữ</h2>
            </div>
            <table class="table border">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        {{-- <th scope="col">Ảnh</th> --}}
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        {{-- <th scope="col">Địa chỉ</th> --}}
                        <th scope="col">Trang thái</th>
                        <th scope="col">Thao tác</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($item_gs as $g)
                        <tr>
                            <th scope="row">{{ $g->id }}</th>
                            <td>{{ $g->userName }}</td>
                            <td>{{ $g->email }}</td>
                            <td>{{ $g->phone }}</td>
                            <td>{{ $g->amount }}</td>
                            <td>{{ $g->price }}</td>
                            <td>{{ $g->nameItem }}</td>
                            <td>{{ $g->phone }}</td>
                            <td>đã thanh toán...</td>
                            <td>
                                <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Lên đơn</button>
                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Hủy đơn</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="main py-5">
        <div class="container-fluid">
            <div class="hanldeBtnCreateMale">
                <h2>Danh sách đơn hàng đồ thể thao nam</h2>
            </div>
            <table class="table border">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        {{-- <th scope="col">Ảnh</th> --}}
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        {{-- <th scope="col">Địa chỉ</th> --}}
                        <th scope="col">Trang thái</th>
                        <th scope="col">Thao tác</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="main py-5">
        <div class="container-fluid">
            <div class="hanldeBtnCreateMale">
                <h2>Danh sách đơn hàng giày thể thao</h2>
            </div>
            <table class="table border">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        {{-- <th scope="col">Ảnh</th> --}}
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        {{-- <th scope="col">Địa chỉ</th> --}}
                        <th scope="col">Trang thái</th>
                        <th scope="col">Thao tác</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
