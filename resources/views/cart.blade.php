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
                                <th>Thành tiền</th>
                                <th>thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                            <tr>
                                <td>1</td>
                                <td>
                                    <img src="./images/img-female/sp4.png" width="150px" height="150px" class="hinhdaidien" />
                                </td>
                                <td>Áo Bra</td>
    
                                <!-- số lượng -->
                                <td class="text-right">
                                    <input value="1"/>
                                </td>
                                
                                <!-- chọn size  -->
                                <td>
                                    <select style="width: 68px">
                                        <option value="xs">XS</option>
                                        <option value="s">S</option>
                                        <option value="m">M</option>
                                        <option value="l">L</option>
                                        <option value="xl">XL</option>
                                        <option value="xxl">XLL</option>
                                    </select>
                                </td>
                                <td class="text-right">$ 2</td>
                                <td class="text-right">$ 2</td>
                                <td>
                                    <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                                    <a class="btn btn-primary" name="btnUpdate" id="btnUpdate" href="#">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </a>
                                    {{-- cập nhật thông tin sp --}}
                                    <a id="btnDelete" name="btnDelete" class="btn btn-danger" href="#">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{route('welcome')}}" class="btn btn-warning btn-md">
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