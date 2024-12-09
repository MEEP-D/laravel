{{-- resources/views/orders/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết Đơn hàng #{{ $order->id }}</h1>

    {{-- Hiển thị thông báo thành công nếu có --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4>Thông tin khách hàng</h4>
            <p><strong>Tên khách hàng:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
            <p><strong>Tổng giá:</strong> {{ $order->total_price }}</p>
            <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
        </div>
    </div>

    <h4 class="mt-4">Sản phẩm trong đơn hàng</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên sách</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->total_price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('orders.index') }}" class="btn btn-primary">Trở lại danh sách đơn hàng</a>
</div>
@endsection
