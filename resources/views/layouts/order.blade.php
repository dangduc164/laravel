@extends('layouts.app')


@section('content')
    <div class="main py-5">
        <div class="container-fluid">
            <div class="hanldeBtnCreateMale">
                <button class="btn btn-primary">Quản lý đơn hàng</button>
            </div>
            <table class="table border">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Trang thái</th>
                        <th scope="col">Thao tác</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>name</td>
                        <td>098172</td>
                        <td>map</td>
                        <td>đã thanh toán...</td>
                        <td>
                            <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Lên đơn</button>
                            <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Hủy đơn</button>
                        </td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
