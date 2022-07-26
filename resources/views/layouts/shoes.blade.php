 @extends('layouts.app')


 @section('content')
     <div class="main py-5">
         {{-- thông báo --}}
         @if (session('success'))
             <div class="alert alert-success h4 text-white" id="alert" role="alert">
                 {{ session('success') }}
             </div>
         @endif
         {{-- end thông báo --}}

         <div class="hanldeBtnCreateMale">
             <div class="container-fluid">
                 <button class="btn btn-success">
                     <a class="text-white" href={{ route('create-shoes') }}>
                         <i class="fa-solid fa-circle-plus"></i> Thêm sản phẩm mới
                     </a>
                 </button>
             </div>
         </div>
         <div class="container-fluid" style="overflow-x: scroll">
             <table class="table border">
                 <thead class="bg-warning">
                     <tr>
                         <th scope="col">id</th>
                         <th scope="col">Ảnh</th>
                         <th scope="col">Tên sản phẩm</th>
                         <th scope="col">Giá sản phẩm</th>
                         <th scope="col">Thao tác</th>

                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($shoes as $shoe)
                         <tr>
                             <th scope="row">{{ $shoe->id }}</th>
                             <td><img style="width: 150px" src="./images/products/{{ $shoe->image_path }}" alt="">
                             </td>
                             <td>{{ $shoe->name }}</td>
                             <td>{{ $shoe->price }}</td>
                             <td style="display: flex; justify-content: space-evenly;">
                                 <button class="btn btn-primary">
                                     <a class="text-white" href={{ route('update-spshoes', $shoe->id) }}>
                                         <i class="fa-solid fa-pen"></i> Chỉnh sửa
                                     </a>
                                 </button>


                                 <form action="{{ route('delete-shoes', ['id' => $shoe->id]) }}" method="POST"
                                     onsubmit="returnConfirmDeletr(this)">
                                     @csrf
                                     @method('delete')
                                     <button class="btn btn-danger text-white" type="submit">
                                         <i class="fa-solid fa-trash-can"></i> Xóa
                                     </button>
                                 </form>

                             </td>

                         </tr>
                     @endforeach

                 </tbody>
             </table>
         </div>
     </div>
 @endsection
