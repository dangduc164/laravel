<!DOCTYPE html>
<html lang="en">

@include('head')

<body>

    {{-- header --}}
    @include('header')
    {{-- end header --}}
    {{-- main --}}r
    <main>



        <div class="container">
            <div class="text-danger py-5 h1"><b> Giỏ hàng</b></div>
            {{-- thông báo --}}
            @if (session('success'))
                <div class="alert alert-success add h4 text-white" id="alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('delete'))
                <div class="alert alert-success delete add h4 text-white" id="alert" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                        aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    {{ session('delete') }}
                </div>
            @endif
            {{-- end thông báo --}}
            <div class="row pb-16">
                <div class="col-12 col-12 col-md-12 pb-5 overflow-auto">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Size</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($shows as $show)
                                @php
                                    $total += $show->price * $show->amount;
                                    // $random = rand();
                                @endphp
                                <tr>
                                    <td>{{ $show->orderNumber }}</td>
                                    <td>
                                        <img src="./images/products/{{ $show->image_path }}" width="150px"
                                            height="150px" class="hinhdaidien" />
                                    </td>
                                    <td>{{ $show->name }}</td>

                                    <!-- số lượng -->
                                    <td class=" text-center">
                                        {{ $show->amount }}
                                    </td>

                                    <!-- chọn size  -->
                                    <td>
                                        {{ $show->size }}
                                    </td>
                                    <td class="text-center">$ {{ $show->price }}</td>
                                    <!-- thanh tiền-->
                                    <td class="text-danger">$ {{ $show->price * $show->amount }}</td>
                                    <td style="display: flex; gap: 5px;justify-content: start">
                                        @if ($show->status == 0)
                                            {{-- cập nhật thông tin sp --}}
                                            <a class="btn btn-primary" name="btnUpdate" id="btnUpdate" href="#"
                                                data-bs-toggle="modal" data-bs-target="#myModal{{ $show->id }}">
                                                <i class="fa-solid fa-pen-alt"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-primary d-none" name="btnUpdate" id="btnUpdate"
                                                href="#" data-bs-toggle="modal"
                                                data-bs-target="#myModal{{ $show->id }}">
                                                <i class="fa-solid fa-pen-alt"></i>
                                            </a>
                                        @endif
                                        {{-- btn order --}}
                                        @if ($show->status == 0)
                                            <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                                            <form method="post"
                                                action="{{ route('deleteItem', ['id' => $show->id]) }}"
                                                onsubmit="returnConfirmDeletr(this)">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="xóa">
                                            </form>
                                            <a class="btn btn-success" name="btnUpdate" id="btnUpdate" href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#myModalOrder{{ $show->id }}">
                                                Đặt hàng
                                            </a>
                                        @elseif(($show->status == 1 && $show->delivery == 2) || ($show->status == 1 && $show->delivery == 3))
                                            Đơn hàng đang được giao!
                                        @else
                                            <a class="btn btn-warning" name="btnUpdate" id="btnUpdate" href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#myModalCancel{{ $show->id }}">
                                                Hủy đơn hàng
                                            </a>
                                        @endif
                                    </td>
                                </tr>

                                <!-- The Modal sửa -->
                                <div class="modal" id="myModal{{ $show->id }}">
                                    <form method="POST" action="{{ route('updateItem', $show->id) }}">
                                        @csrf
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header bg-warning">
                                                    <h6 class="modal-title">Cập nhật đơn hàng: {{ $show->orderNumber }}
                                                    </h6>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="amount">Số lượng: </label>
                                                            <input name="amount" value="{{ $show->amount }}" />
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="amount">Size: </label>
                                                            <input name="size" value="{{ $show->size }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-success" value="Cập nhật">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--end modal--->

                                <!-- modal order--->
                                <div class="modal" id="myModalOrder{{ $show->id }}">
                                    <form method="POST" action="{{ route('orderItem', $show->orderNumber) }}">
                                        @csrf
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header bg-warning">
                                                    <h6 class="modal-title">Đơn hàng: {{ $show->orderNumber }}
                                                    </h6>

                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <input class="d-none" type="text" name="status"
                                                            value="1">
                                                        <p class="text-center">
                                                            Bạn có muốn đặt hàng sản phẩm:
                                                            <strong class="h6">{{ $show->name }}</strong>
                                                        </p>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer"
                                                    style="display: flex; justify-content: space-around;">
                                                    <form method="post"
                                                        action="{{ route('orderItem', ['id' => $show->id]) }}">
                                                        @csrf
                                                        <input style="width: 90px !important" type="submit"
                                                            class="btn btn-success" value="Yes" />
                                                    </form>

                                                    <input style="width: 90px !important" type="button"
                                                        class="btn btn-danger" data-bs-dismiss="modal"
                                                        value="No">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- modal cancel--->
                                <div class="modal" id="myModalCancel{{ $show->id }}">
                                    <form method="POST" action="{{ route('orderItem', $show->orderNumber) }}">
                                        @csrf
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header bg-warning">
                                                    <h6 class="modal-title">Đơn hàng: {{ $show->orderNumber }}
                                                    </h6>

                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <input class="d-none" type="text" name="status"
                                                            value="0">
                                                        <p class="text-center">
                                                            Bạn có muốn hủy đơn hàng:
                                                            <strong class="h6"> {{ $show->name }}</strong>
                                                        </p>
                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer"
                                                    style="display: flex; justify-content: space-around;">
                                                    {{-- <input type="submit" class="btn btn-success" value="Yes"> --}}
                                                    <form method="post"
                                                        action="{{ route('cancelOrder', ['id' => $show->id]) }}">
                                                        @csrf
                                                        <input style="width: 90px !important" type="submit"
                                                            class="btn btn-success" value="Yes" />
                                                    </form>

                                                    <input style="width: 90px !important" type="button"
                                                        class="btn btn-danger" data-bs-dismiss="modal"
                                                        value="No">
                                                    {{-- <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">Cập nhật</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="priceSum text-end">
                        <h2 class="h3 text-end">Tổng tiền: <span class="ml-3">$ {{ $total }}</span> </h2>
                        {{-- <input type="submit" class="btn btn-success p-3" value="Đặt hàng" /> --}}
                    </div>

                    <a href="{{ route('welcome') }}" class="btn btn-warning btn-md">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Quay về trang chủ
                    </a>
                    {{-- <a href="./thanhtoan.html" class="btn btn-primary btn-md"
              ><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh
              toán</a
            > --}}
                </div>
            </div>
        </div>

    </main>
    {{-- end main --}}
    @include('footer')
    {{-- link js --}}
    @include('linkjs')
    {{-- end link js --}}

</body>

</html>
