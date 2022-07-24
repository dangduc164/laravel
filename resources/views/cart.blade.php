<!DOCTYPE html>
<html lang="en">

@include('head')

<body>

    {{-- header --}}
    @include('header')
    {{-- end header --}}
    {{-- main --}}
    <main>



        <div class="container">
            <div class="text-danger py-5 h1"><b> Giỏ hàng</b></div>
            <div class="row pb-16">
                <div class="col-12 col-12 col-md-12 pb-5">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Size</th>
                                <th>Đơn giá</th>
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
                                @endphp
                                <tr>
                                    <td>{{ $show->id }}</td>
                                    <td>
                                        <img src="./images/img-female/{{ $show->image_path }}" width="150px"
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
                                    <td>
                                        <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                                        <a class="btn btn-primary" name="btnUpdate" id="btnUpdate" href="#"
                                            data-bs-toggle="modal" data-bs-target="#myModal{{ $show->id }}">
                                            <i class="fa-solid fa-pen-alt"></i>
                                        </a>
                                        {{-- cập nhật thông tin sp --}}
                                        <a id="btnDelete" name="btnDelete" class="btn btn-danger" href="#">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- The Modal -->
                                <div class="modal" id="myModal{{ $show->id }}">
                                    <form method="POST" action="{{ route('updateItem', $show->id) }}">
                                        @csrf
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header bg-warning">
                                                    <h4 class="modal-title">Cập nhật sản phẩm {{ $show->id }}</h4>
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

                                                    {{-- <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">Cập nhật</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--end modal--->
                            @endforeach
                        </tbody>
                    </table>

                    <div class="priceSum text-end">
                        <h2 class="h3 text-end">Tổng tiền: <span class="ml-3">$ {{ $total }}</span> </h2>
                        <input type="submit" class="btn btn-success p-3" value="Đặt hàng" />
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
