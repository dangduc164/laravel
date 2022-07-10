<!DOCTYPE html>
<html lang="en">

@include('head')

<body>
    {{-- header --}}
    @include('header')
    {{-- end header --}}

    {{-- main --}}
    <main>
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
                                                        <div class="buy_bt">
                                                            <button type="button" class="btn btn-warning text-dark"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#myModalShoes{{ $shoe->id }}">
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
                    <div class="loader_main">
                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        </div>

        @include('modal.modal-shoes')
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
