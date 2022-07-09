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
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal">Mua ngay</a>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

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
