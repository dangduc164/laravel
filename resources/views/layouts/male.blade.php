 @extends('layouts.app')


 @section('content')
     <div class="main py-5">

         <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
             <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                 <path
                     d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
             </symbol>
             <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                 <path
                     d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
             </symbol>
             <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                 <path
                     d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
             </symbol>
         </svg>

         {{-- thông báo --}}
         @if (session('success'))
             <div class="alert alert-success h4 text-white" id="alert" role="alert">
                 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                     <use xlink:href="#check-circle-fill" />
                 </svg>
                 {{ session('success') }}
             </div>
         @endif
         {{-- end thông báo --}}

         <div class="hanldeBtnCreateMale">
             <div class="container-fluid">
                 <button class="btn btn-success">
                     <a class="text-white" href={{ route('create-male') }}>
                         <i class="fa-solid fa-circle-plus"></i> Thêm sản phẩm mới
                     </a>
                 </button>
             </div>
         </div>
         <div class="container-fluid" style="overflow-x: scroll">
             <table class="table border text-center">
                 <thead class="bg-warning">
                     <tr>
                         <th scope="col">id</th>
                         <th scope="col">Ảnh</th>
                         <th scope="col">Tên sản phẩm</th>
                         <th scope="col">Mô tả sản phẩm</th>
                         <th scope="col">Giá sản phẩm</th>
                         <th scope="col">Thao tác</th>

                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($males as $male)
                         <tr>
                             <th scope="row">{{ $male->id }}</th>
                             <td><img style="width: 150px" src="./images/products/{{ $male->image_path }}" alt="">
                             </td>
                             <td>{{ $male->name }}</td>
                             <td>{{ $male->content }}</td>
                             <td class="text-danger">$ {{ $male->price }}</td>
                             <td style="display: flex; justify-content: space-evenly;">
                                 <button class="btn btn-primary">
                                     <a class="text-white" href={{ route('update-spmale', $male->id) }}>
                                         <i class="fa-solid fa-pen"></i>
                                     </a>
                                 </button>


                                 <form action="{{ route('delete-male', ['id' => $male->id]) }}" method="POST"
                                     onsubmit="returnConfirmDeletr(this)">
                                     @csrf
                                     @method('delete')
                                     <button class="btn btn-danger text-white" type="submit">
                                         <i class="fa-solid fa-trash-can"></i>
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
