@extends('layouts.app')

@section('content')
    <div id="dashboard">
        <div class="container-fuild">
            <div class="wrap pt-5">
                <ul style="list-style: none" class="text-center">
                    <li>
                        <div class="box border border-secondary bg-secondary" style="padding:8px 20px; opacity: 0.8;">
                            <div class="title h5">Tổng số đơn hàng được đặt:</div>
                            <p class="content h5 text-center py-3">
                                {{ $sumOrder }} đơn
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="box border border-success bg-success" style="padding:8px 20px; opacity: 0.8;">
                            <div class="title h5">Tổng số đơn hàng được thanh toán:</div>
                            <p class="content h5 py-3">
                                {{ $sumSuccess }} đơn
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="box border border-primary bg-primary" style="padding:8px 20px; opacity: 0.8;">
                            <div class="title h5">Tổng số đơn hàng đang giao:</div>
                            <p class="content h5 py-3">
                                {{ $sumShip }} đơn
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="box border border-danger bg-danger" style="padding:8px 20px; opacity: 0.8;">
                            <div class="title h5">Tổng số đơn hàng đang chờ xử lý:</div>
                            <p class="content h5 py-3">
                                {{ $sumHandle }} đơn
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="box border border-warning bg-warning" style="padding:8px 20px; opacity: 0.8;">
                            <div class="title h5">Tổng số đơn hàng đã được xử lý:</div>
                            <p class="content h5 py-3">
                                {{ $sumProcessed }} đơn
                            </p>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
@endsection
