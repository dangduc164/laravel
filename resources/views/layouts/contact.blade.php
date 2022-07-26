@extends('layouts.app')


@section('content')
    <div class="main py-5">
        {{-- thông báo --}}
        @if (session('delete'))
            <div class="alert alert-success layoutdelte h4 text-white" id="alert" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        {{-- end thông báo --}}
        <div class="container-fluid" style="overflow-x: scroll">
            <table class="table border py-3">
                <thead class="bg-warning">
                    <tr class="border">
                        <th scope="col">id</th>
                        <th scope="col">Họ và tên đệm</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <th>{{ $contact->fullname }}</th>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>
                                <form action="{{ route('delete-contact', ['id' => $contact->id]) }}" method="POST"
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
