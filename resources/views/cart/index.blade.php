@extends('layouts.app')

@section('content')
    <h1>Giỏ Hàng</h1>
    @if(count($cart) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên Sách</th>
                    <th>Thể Loại</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    <tr>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['category'] }}</td>
                        <td>{{ number_format($item['price'], 0, ',', '.') }} VNĐ</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control" style="width: 60px;">
                                <button type="submit" class="btn btn-sm btn-primary mt-1">Cập nhật</button>
                            </form>
                        </td>
                        <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VNĐ</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Nút checkout -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('checkout.index') }}" class="btn btn-success">Tiến Hành Thanh Toán</a>
        </div>
    @else
        <p>Giỏ hàng của bạn hiện tại chưa có sản phẩm nào.</p>
    @endif
@endsection
