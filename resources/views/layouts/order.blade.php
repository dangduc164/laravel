@extends('layouts.app')


@section('content')
    <div class="main py-5">
        <div class="titleTable">
            <h4>Danh sách đơn hàng đồ thể thao nữ</h4>
        </div>
        <div class="container-fluid" style="overflow-x: scroll">
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
                            <th scope="row">{{ $g->orderNumber }}</th>
                            <td class="fw-bold h6">{{ $g->userName }}</td>
                            <td class="text-primary" style="text-decoration: underline">{{ $g->email }}</td>
                            <td>+84{{ $g->phone }}</td>
                            <td>{{ $g->name }}</td>
                            <td>{{ $g->amount }}</td>
                            <td class="text-danger">$ {{ $g->price }}</td>
                            <td class="text-danger fw-bold">
                                <h5>$ {{ $g->amount * $g->price }}</h5>
                            </td>
                            @if ($g->status == 1)
                                {
                                <td>đang chờ xử lý...</td>
                                }
                            @elseif($g->status == 2)
                                {
                                <td>đang giao hàng!</td>
                                }
                            @else{
                                <td>đã thanh toán</td>
                                }
                            @endif
                            <td>
                                <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Lên đơn</button>
                                {{-- <form action="{{ route('dltOrder', ['id' => $g->orderNumber]) }}" method="POST"
                                    onsubmit="returnConfirmDeletr(this)">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger text-white" type="submit">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="main py-5">
        <div class="titleTable">
            <h4>Danh sách đơn hàng đồ thể thao nam</h4>
        </div>
        <div class="container-fluid " style="overflow-x:scroll">
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
                            <th scope="row">{{ $b->orderNumber }}</th>
                            <td class="h6 fw-blod">{{ $b->userName }}</td>
                            <td class="text-primary" style="text-decoration: underline">{{ $b->email }}</td>
                            <td>+84{{ $b->phone }}</td>
                            <td>{{ $b->name }}</td>
                            <td>{{ $b->amount }}</td>
                            <td class="text-danger">$ {{ $b->price }}</td>
                            <td class="text-danger fw-bold">
                                <h5>$ {{ $b->amount * $b->price }}</h5>
                            </td>
                            <td>đã thanh toán...</td>
                            <td>
                                <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Lên đơn</button>
                                {{-- <form action="{{ route('dltOrder', ['id' => $b->orderNumber]) }}" method="POST"
                                    onsubmit="returnConfirmDeletr(this)">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger text-white" type="submit">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="main py-5">
        <div class="titleTable">
            <h4>Danh sách đơn hàng giày thể thao</h4>
        </div>
        <div class="container-fluid" style="overflow-x:scroll">
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
                    @foreach ($item_Ss as $s)
                        <tr class="text-center">
                            <th scope="row">{{ $s->orderNumber }}</th>
                            <td class="h6 fw-bold">{{ $s->userName }}</td>
                            <td class="text-primary" style="text-decoration: underline">{{ $s->email }}</td>
                            <td>+84{{ $s->phone }}</td>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td class="text-danger">$ {{ $s->price }}</td>
                            <td class="text-danger fw-bold">
                                <h5>$ {{ $s->amount * $s->price }}</h5>
                            </td>
                            <td>đã thanh toán...</td>
                            <td>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa-solid fa-check"></i> Lên đơn
                                </button>

                                {{-- <form action="{{ route('dltOrder', ['id' => $s->orderNumber]) }}" method="POST"
                                    onsubmit="returnConfirmDeletr(this)">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger text-white" type="submit">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form> --}}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
