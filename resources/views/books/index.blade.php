@extends('layouts.app')

@section('content')
    <h1>Danh Sách Sách</h1>

    <!-- Nút thêm sách -->
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Thêm Sách</a>

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
                        <!-- Nút chỉnh sửa -->
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        
                        <!-- Form xóa -->
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
