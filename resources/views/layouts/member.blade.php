@extends('layouts.app')


@section('content')
    <div id="infromation">
        <div class="title pt-5">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success h4 text-white" id="alert" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('recall'))
                    <div class="alert alert-danger h4 text-white" id="alert" role="alert">
                        {{ session('recall') }}
                    </div>
                @endif
                <h5>Thông tin tài khoản</h6>
            </div>
        </div>
        <div class="container-fluid" style="overflow: scroll; height: 500px;">
            <table class="table border text-center">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($member as $m)
                        <tr>
                            <th scope="row">{{ $m->id }}</th>
                            </td>
                            <td>{{ $m->name }}</td>
                            <td class="text-primary" style="text-decoration: underline">{{ $m->email }}</td>
                            <td>
                                @if ($m->admin == 1)
                                    admin
                                @else
                                    member
                                @endif
                            </td>
                            <td style="display: flex; justify-content: space-evenly;">
                                @if ($m->admin == 1)
                                    <a class="btn btn-danger" name="btnUpdate" id="btnUpdate" href="#"
                                        data-bs-toggle="modal" data-bs-target="#myModalComfirmRecall{{ $m->id }}">
                                        Thu quyền
                                    </a>
                                @else
                                    <a class="btn btn-info" name="btnUpdate" id="btnUpdate" href="#"
                                        data-bs-toggle="modal" data-bs-target="#myModalComfirmGrant{{ $m->id }}">
                                        Cấp quyền
                                    </a>
                                @endif
                            </td>
                            <div class="modal" id="myModalComfirmGrant{{ $m->id }}">
                                <form method="POST" action="{{ route('comfirmGrant', $m->id) }}">
                                    @csrf
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title">Cấp quyền cho member:
                                                    <strong> {{ $m->name }}</strong>
                                                </h5>

                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input class="d-none" type="text" name="admin" value="1">
                                                    <p class="text-center">
                                                        Bạn có chắc chắn cấp quyền truy cập admin cho tài khoản: <br>
                                                        <strong class="h6">{{ $m->email }}</strong>
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer" style="display: flex; justify-content: space-around;">
                                                {{-- <input type="submit" class="btn btn-success" value="Yes"> --}}
                                                <form method="post"
                                                    action="{{ route('comfirmGrant', ['id' => $m->id]) }}">
                                                    @csrf
                                                    <input style="width: 90px !important" type="submit"
                                                        class="btn btn-success" value="Yes" />
                                                </form>

                                                <input style="width: 90px !important" type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal" value="No">

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal" id="myModalComfirmRecall{{ $m->id }}">
                                <form method="POST" action="{{ route('comfirmRecall', $m->id) }}">
                                    @csrf
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title">Thông báo
                                                </h5>

                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input class="d-none" type="text" name="admin" value="0">
                                                    <p class="text-center">
                                                        Bạn có chắc muốn thu hồi quyền truy cập admin của tài khoản : <br>
                                                        <strong class="h5 mt-3">{{ $m->email }}</strong>
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer" style="display: flex; justify-content: space-around;">
                                                {{-- <input type="submit" class="btn btn-success" value="Yes"> --}}
                                                <form method="post"
                                                    action="{{ route('comfirmRecall', ['id' => $m->id]) }}">
                                                    @csrf
                                                    <input style="width: 90px !important" type="submit"
                                                        class="btn btn-success" value="Yes" />
                                                </form>

                                                <input style="width: 90px !important" type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal" value="No">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
