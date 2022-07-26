@extends('layouts.app')


@section('content')
    <div class="main py-5">
        <div class="container-fluid">
            <div class="hanldeBtnCreateMale">
                <h4>Danh sách đơn hàng đồ thể thao nữ</h4>
            </div>
            <table class="table border">
                <thead class="bg-warning">
                    <tr class="text-center">
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Email khách </th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Trang thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item_gs as $g)
                        <tr class="text-center">
                            <th scope="row">{{ $g->id }}</th>
                            <td>{{ $g->userName }}</td>
                            <td class="text-primary" style="text-decoration: underline">{{ $g->email }}</td>
                            <td>+84{{ $g->phone }}</td>
                            <td>{{ $g->nameItem }}</td>
                            <td>{{ $g->amount }}</td>
                            <td>{{ $g->price }}</td>
                            <td class="text-danger">$ {{ $g->amount * $g->price }}</td>
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
                <h4>Danh sách đơn hàng đồ thể thao nam</h4>
            </div>
            <table class="table border">
                <thead class="bg-warning">
                    <tr class="text-center">
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Email khách </th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Trang thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item_bs as $b)
                        <tr class="text-center">
                            <th scope="row">{{ $b->id }}</th>
                            <td>{{ $b->userName }}</td>
                            <td class="text-primary" style="text-decoration: underline">{{ $b->email }}</td>
                            <td>+84{{ $b->phone }}</td>
                            <td>{{ $b->nameItem }}</td>
                            <td>{{ $b->amount }}</td>
                            <td>{{ $b->price }}</td>
                            <td class="text-danger">$ {{ $b->amount * $b->price }}</td>
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
                <h4>Danh sách đơn hàng giày thể thao</h4>
            </div>
            <table class="table border">
                <thead class="bg-warning">
                    <tr class="text-center">
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Email khách </th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Trang thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach ($item_bs as $b)
                        <tr class="text-center">
                            <th scope="row">{{ $b->id }}</th>
                            <td>{{ $b->userName }}</td>
                            <td class="text-primary" style="text-decoration: underline">{{ $b->email }}</td>
                            <td>+84{{ $b->phone }}</td>
                            <td>{{ $b->nameItem }}</td>
                            <td>{{ $b->amount }}</td>
                            <td>{{ $b->price }}</td>
                            <td class="text-danger">$ {{ $b->amount * $b->price }}</td>
                            <td>đã thanh toán...</td>
                            <td>
                                <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Lên đơn</button>
                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Hủy đơn</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
@endsection
