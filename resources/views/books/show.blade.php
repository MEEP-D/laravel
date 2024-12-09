@extends('layouts.app')

@section('content')
    <h1>Danh Sách Sách</h1>

    <!-- Bảng danh sách sách -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên Sách</th>
                <th>Thể Loại</th>
                <th>Giá</th>
                <th>Tác Giả</th>
                <th>Nhà Xuất Bản</th>
                <th>Năm Xuất Bản</th>
                <th>Số Trang</th>
                <th>Tóm Tắt</th>
                <th>Số Lượng</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ number_format($book->price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->publish_year }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->summary }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>
                        <!-- Nút thêm vào giỏ hàng -->
                        <form action="{{ route('cart.add', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Thêm vào giỏ hàng</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
