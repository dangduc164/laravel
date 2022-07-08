

    <!-- banner bg main start -->
    <div class="banner_bg_main">
        <!-- header top section start -->
        <div class="container">
            <div class="header_section_top">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom_menu">
                            <ul>
                                <li><a href="#">Bán Chạy nhất</a></li>
                                <li><a href="#">Quà Tặng</a></li>
                                <li><a href="#">Hàng Mới </a></li>
                                <li><a href="#">Ưu đã hôm nay</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="logo_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo">
                            <a href="./index.html">
                                <h1 class="text-white"><b>DQ.SHOP</b></h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header_section">
            <div class="container">
                <div class="containt_main">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a
            >
                        <a href="{{route('welcome')}}">Trang Chủ</a>
                        <a href="{{ route('femaleUI')}}">Đồ Thể Thao Nữ</a>
                        <a href="{{ route('maleUI')}}">Đồ Thể Thao Nam</a>
                        <a href="{{ route('shoesUI')}}">Giầy Thể Thao</a>
                        <a href="{{ route('contactUI')}}">Liên Hệ</a>
                        <a href="/login">Đăng Nhập</a>

                    </div>
                    <span class="toggle_icon" onclick="openNav()"><i class="fas fa-bars fa-3x"></i
          ></span>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tất cả hoạt động
            </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    <div class="main">
                        <!-- Another variation with a button -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm" />
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color: #f26522">
                  <i class="fa fa-search"></i>
                </button>
                            </div>
                        </div>
                    </div>
                    <div class="header_box">
                        <div class="lang_box">
                            <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                                <img class="zoom-img" src="./images/logo-VN.jpg" alt="flag" width="16px" height="11px" class="mr-2" title="United Kingdom" /> Tiếng Việt
                                <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">
                                    <img class="zoom-img" src="./images/flag-uk.png" class="mr-2" alt="flag" /> English
                                </a>
                            </div>
                        </div>
                        <div class="login_menu">
                            <ul>
                                <li>
                                    <a href="{{route('cartUI')}}"><input type="button" value="Giỏ Hàng" class="btn btn-outline-danger text-white" /></a>
                                </li>
                                <li>
                                    <a href="./dangnhap.html"><input type="button" value="Đăng Nhập" class="btn btn-outline-danger text-white" /></a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner_section layout_padding">
            <div class="container">
                <div id="my_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="banner_taital">
                                        Bắt đầu <br /> Mua sắm yêu thích của bạn
                                    </h1>
                                    <div class="buynow_bt"><a href="#male">Mua ngay</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="banner_taital">
                                        Bắt đầu <br /> Mua sắm yêu thích của bạn
                                    </h1>
                                    <div class="buynow_bt"><a href="#male">Mua ngay</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="banner_taital">
                                        Bắt đầu <br /> Mua sắm yêu thích của bạn
                                    </h1>
                                    <div class="buynow_bt"><a href="#shoes">Mua ngay</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

