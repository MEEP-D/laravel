{{-- resources/views/orders/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Danh sách Đơn hàng</h1>

    {{-- Hiển thị thông báo thành công nếu có --}}
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Bảng danh sách đơn hàng --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tổng giá</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ number_format($order->total_price, 0, ',', '.') }} ₫</td> <!-- Định dạng tiền -->
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge badge-warning">{{ $order->status }}</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge badge-success">{{ $order->status }}</span>
                                @elseif($order->status == 'canceled')
                                    <span class="badge badge-danger">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Xem</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Phân trang --}}
            <!-- <div class="d-flex justify-content-center">
                {{ $orders->links() }}
            </div> -->
        </div>
    </div>
</div>
@endsection
