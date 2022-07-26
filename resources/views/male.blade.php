<!DOCTYPE html>
<html lang="en">

@include('head')

<body>
    {{-- header --}}
    @include('header')
    {{-- end header --}}

    {{-- main --}}
    <main>
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
                                                            src="./images/products/{{ $male->image_path }}" />
                                                    </div>
                                                    <div class="btn_main">
                                                        <div class="buy_bt">
                                                            <button type="button" class="btn btn-warning text-dark"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#myModalMale{{ $male->id }}">
                                                                Mua ngay
                                                            </button>
                                                        </div>
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
        @include('modal.modal-male')
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
