<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Thêm sản phẩm nam</title>
</head>

<body>

    <div class="container mt-3">
        <h2>Thêm sản phẩm nam</h2>
        <form action="{{ route('themspmale') }}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name">Tên sản phẩm: </label>
                <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm"
                    name="name">
            </div>
            <div class="mb-3">
                <label for="pwd">Nhập giá sản phẩm $: </label>
                <input type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm"
                    name="price">
            </div>

            <div class="mb-3">
                <label for="comment">Mô tả sản phẩm: </label>
                <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
            </div>

            <div class="mb-3">
                <label for="comment">ảnh sản phẩm </label>
                <input class="text" rows="5" id="images_path" name="images_path">
            </div>

            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
