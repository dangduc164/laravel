<!DOCTYPE html>
<html lang="en">

@include('head')

<body>
    {{-- header --}}
    @include('header')
    {{-- end header --}}

    {{-- main --}}
    <main>

        <div class="female" id="female">
            <div class="fashion_section">
                <div id="main_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <h1 class="fashion_taital">Đồ tập GYM nữ</h1>
                                <div class="fashion_section_2">
                                    <div class="row">
                                        @foreach ($females as $female)
                                            <div class="col-lg-4 col-sm-4">
                                                <div class="box_main">
                                                    <h4 class="shirt_text">{{ $female->name }}</h4>
                                                    <p class="price_text">
                                                        Price <span style="color: #262626">$
                                                            {{ $female->price }}</span>
                                                    </p>
                                                    <div class="tshirt_img">
                                                        <img class="zoom-img" class="zoom-img"
                                                            src="./images/img-female/{{ $female->image_path }}" />
                                                    </div>
                                                    <div class="btn_main">
                                                        <div class="buy_bt">

                                                            <button type="button" class="btn btn-warning text-dark"
                                                                data-bs-toggle="modal" data-bs-target="#myModal">
                                                                Mua ngay
                                                            </button>
                                                        </div>
                                                        <div class="seemore_bt">
                                                            <a href="#viewsp">Xem thêm...</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="male" id="male">
            <div class="fashion_section">
                <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <h1 class="fashion_taital">Đồ tập GYM nam</h1>
                                <div class="fashion_section_2">
                                    <div class="row">
                                        @foreach ($males as $male)
                                            <div class="col-lg-4 col-sm-4">
                                                <div class="box_main">
                                                    <h4 class="shirt_text"> {{ $male->name }}</h4>
                                                    <p class="price_text">
                                                        Start Price <span style="color: #262626">$
                                                            {{ $male->price }}</span>
                                                    </p>
                                                    <div class="electronic_img">
                                                        <img class="zoom-img"
                                                            src="./images/img-male/{{ $male->image_path }}" />
                                                    </div>
                                                    <div class="btn_main">
                                                        <div class="buy_bt"><a href="#">Mua ngay</a></div>
                                                        <div class="seemore_bt">
                                                            <a href="#">Xem thêm...</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="shoes" id="shoes">
            <div class="jewellery_section">
                <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <h1 class="fashion_taital">Giầy Thể Thao</h1>
                                <div class="fashion_section_2">
                                    <div class="row">
                                        @foreach ($shoes as $shoe)
                                            <div class="col-lg-4 col-sm-4">
                                                <div class="box_main">
                                                    <h4 class="shirt_text">{{ $shoe->name }}</h4>
                                                    <p class="price_text">
                                                        Start Price <span style="color: #262626">$
                                                            {{ $shoe->price }}</span>
                                                    </p>
                                                    <div class="jewellery_img">
                                                        <img class="zoom-img"
                                                            src="./images/img-shoes/{{ $shoe->image_path }}" />
                                                    </div>
                                                    <div class="btn_main">
                                                        <div class="buy_bt"><a href="#">Mua ngay</a></div>
                                                        <div class="seemore_bt">
                                                            <a href="#">Xem thêm...</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="loader_main">
                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div id="viewsp" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-3">
                        <div class="product-main-image">
                            <img src="assets/pages/img/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                        </div>
                        <div class="product-other-images">
                            <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="assets/pages/img/products/model3.jpg"></a>
                            <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/pages/img/products/model4.jpg"></a>
                            <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/pages/img/products/model5.jpg"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-9">
                        <h2>Cool green dress with red bell</h2>
                        <div class="price-availability-block clearfix">
                            <div class="price">
                                <strong><span>$</span>47.00</strong>
                                <em>$<span>62.00</span></em>
                            </div>
                            <div class="availability">
                                Availability: <strong>In Stock</strong>
                            </div>
                        </div>
                        <div class="description">
                            <p>Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.</p>
                        </div>
                        <div class="product-page-options">
                            <div class="pull-left">
                                <label class="control-label">Size:</label>
                                <select class="form-control input-sm">
                        <option>L</option>
                        <option>M</option>
                        <option>XL</option>
                      </select>
                            </div>
                            <div class="pull-left">
                                <label class="control-label">Color:</label>
                                <select class="form-control input-sm">
                        <option>Red</option>
                        <option>Blue</option>
                        <option>Black</option>
                      </select>
                            </div>
                        </div>
                        <div class="product-page-cart">
                            <div class="product-quantity">
                                <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                            </div>
                            <button class="btn btn-primary" type="submit">Add to cart</button>
                            <a href="shop-item.html" class="btn btn-default">More details</a>
                        </div>
                    </div>

                    <div class="sticker sticker-sale"></div>
                </div>
            </div>
        </div> --}}


        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="">
                        <div class="row">
                            <div class="col">
                                <div class="img-product">
                                    <img class="zoom-img" src="./images/img-female/{{ $female->image_path }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="content-product">
                                    <div class="title-product">
                                        <h2>{{ $female->name }}</h2>
                                    </div>
                                    <div class="price">
                                        <h4>{{ $female->price }}</h4>
                                    </div>
                                    <div class="comment">
                                        <p>{{ $female->content }}</p>
                                    </div>

                                    <div class="sl">
                                        <label for="">số lượng</label>
                                        <input type="number" value="1" />

                                    </div>
                                    <div class="size-product">
                                        <label>Size</label>
                                        <select name="size" id="size" style="width: 90%">
                                            <option value="xs">xs</option>
                                            <option value="s">s</option>
                                            <option value="m">m</option>
                                            <option value="l">l</option>
                                            <option value="xl">xl</option>
                                            <option value="xxl">xxl</option>
                                        </select>
                                    </div>
                                    <div class="btn-group pt-3">
                                        <a href="" class="btn btn-warning">Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- end modal-->

    </main>
    {{-- end main --}}

    {{-- footer --}}
    @include('footer')
    {{-- end footer --}}

    {{-- link js --}}
    @include('linkjs')
    {{-- end link js --}}
</body>

</html>

</html>
