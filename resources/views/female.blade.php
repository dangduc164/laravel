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
                                                            src="./images/products/{{ $female->image_path }}" />
                                                    </div>
                                                    <div class="btn_main">
                                                        <div class="buy_bt">
                                                            <button type="button" class="btn btn-warning text-dark"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#myModal{{ $female->id }}">
                                                                Mua ngay
                                                            </button>
                                                        </div>
                                                        <div class="seemore_bt">
                                                            <a onclick="showModal()">Xem thêm...</a>
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

        @include('modal.modal-female')

    </main>
    {{-- end main --}}

    {{-- footer --}}
    @include('footer')
    {{-- end footer --}}

    {{-- link js --}}
    @include('linkjs')
    {{-- end link js --}}

    <script>
        function showModal() {
            let x = document.getEmlementByID('viewsp');
            if (x.style.display === "none") {
                x.style.display === "block";
            }
        }
    </script>
</body>

</html>

</html>
