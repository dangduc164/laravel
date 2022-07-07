<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="{{ route('demo.store') }}" method="POST">

        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="input" class="form-control" id="name" placeholder="Enter name" name="title">
        </div>
        <div class="mb-3">
            <label for="gia" class="form-label">Price:</label>
            <input type="input" class="form-control" id="price" placeholder="Enter Price" name="content">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>