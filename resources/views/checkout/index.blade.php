@extends('layouts.app')

@section('content')
    <h1>Thanh Toán</h1>

    <!-- Kiểm tra nếu có thông báo thành công -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <h3>Thông Tin Người Mua</h3>
                <div class="form-group">
                    <label for="name">Họ và Tên</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Số Điện Thoại</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Địa Chỉ</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <h3>Giỏ Hàng</h3>
                @if(count($cart) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên Sách</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                                <tr>
                                    <td>{{ $item['title'] }}</td>
                                    <td>{{ number_format($item['price'], 0, ',', '.') }} VNĐ</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VNĐ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4>Tổng Tiền: {{ number_format($totalPrice, 0, ',', '.') }} VNĐ</h4>
                @else
                    <p>Giỏ hàng của bạn hiện tại chưa có sản phẩm nào.</p>
                @endif
            </div>
        </div>

        <!-- Nút thanh toán -->
        <button type="submit" class="btn btn-success mt-3">Thanh Toán</button>
    </form>
@endsection
