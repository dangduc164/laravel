@extends('layouts.app')


@section('content')
    <div class="main py-5">
        {{-- thông báo --}}
        @if (session('success'))
            <div class="alert alert-success h4 text-white" id="alert" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{-- end thông báo --}}
        <div class="titleTable">
            <div class="container-fluid">
                <h4>Danh sách đơn hàng đồ thể thao nữ</h4>
            </div>
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
                            @if ($g->delivery == 0)
                                {
                                <td>Đang chờ xử lý...</td>
                                }
                            @elseif($g->delivery == 1)
                                {
                                <td>Đã xác nhận!</td>
                                }
                            @else
                                {
                                <td>Đang giao hàng</td>
                                }
                            @endif
                            <td>
                                @if ($g->delivery == 0)
                                    <a class="btn btn-info" name="btnUpdate" id="btnUpdate" href="#"
                                        data-bs-toggle="modal" data-bs-target="#myModalComfirm{{ $g->id }}">
                                        Xác Nhận
                                    </a>
                                @elseif($g->delivery == 1)
                                    <button type="submot" class="btn btn-primary">
                                        <i class="fa-solid fa-check"></i>

                                    </button>
                                @elseif($g->delivery == 2)
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-check"></i>
                                        đã thanh toán
                                    </button>
                                @endif
                                {{-- <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Lên đơn</button> --}}
                                {{-- <form action="{{ route('dltOrder', ['id' => $g->orderNumber]) }}" method="POST"
                                    onsubmit="returnConfirmDeletr(this)">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger text-white" type="submit">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form> --}}

                                <!-- modal cancel--->
                                <div class="modal" id="myModalComfirm{{ $g->id }}">
                                    <form method="POST" action="{{ route('orderItem', $g->orderNumber) }}">
                                        @csrf
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header bg-warning">
                                                    <h6 class="modal-title">Đơn hàng: {{ $g->orderNumber }}
                                                    </h6>

                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <input class="d-none" type="text" name="status" value="1">
                                                        <p class="text-center">
                                                            Bạn có chắc chắn xác nhận đơn hàng với mã là:
                                                            <strong class="h6">{{ $g->orderNumber }}</strong>
                                                        </p>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer"
                                                    style="display: flex; justify-content: space-around;">
                                                    {{-- <input type="submit" class="btn btn-success" value="Yes"> --}}
                                                    <form method="post" action="{{ route('comfirm', ['id' => $g->id]) }}">
                                                        @csrf
                                                        <input style="width: 90px !important" type="submit"
                                                            class="btn btn-success" value="Yes" />
                                                    </form>

                                                    <input style="width: 90px !important" type="button"
                                                        class="btn btn-danger" data-bs-dismiss="modal" value="No">
                                                    {{-- <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">Cập nhật</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="main py-5">
        <div class="titleTable">
            <div class="container-fluid">
                <h4>Danh sách đơn hàng đồ thể thao nam</h4>
            </div>
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
            <div class="container-fluid">
                <h4>Danh sách đơn hàng giày thể thao</h4>
            </div>
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
