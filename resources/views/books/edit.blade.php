@extends('layouts.app')

@section('content')
    <h1>Chỉnh Sửa Sách</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Tên Sách -->
        <div class="form-group">
            <label for="title">Tên Sách</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
        </div>
        
        <!-- Thể Loại -->
        <div class="form-group">
            <label for="category">Thể Loại</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $book->category) }}" required>
        </div>

        <!-- Giá -->
        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $book->price) }}" required>
        </div>

        <!-- Tác Giả -->
        <div class="form-group">
            <label for="author">Tác Giả</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author) }}" required>
        </div>

        <!-- Nhà Xuất Bản -->
        <div class="form-group">
            <label for="publisher">Nhà Xuất Bản</label>
            <input type="text" class="form-control" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
        </div>

        <!-- Năm Xuất Bản -->
        <div class="form-group">
            <label for="publish_year">Năm Xuất Bản</label>
            <input type="number" class="form-control" id="publish_year" name="publish_year" value="{{ old('publish_year', $book->publish_year) }}" required>
        </div>

        <!-- Số Trang -->
        <div class="form-group">
            <label for="pages">Số Trang</label>
            <input type="number" class="form-control" id="pages" name="pages" value="{{ old('pages', $book->pages) }}" required>
        </div>

        <!-- Tóm Tắt -->
        <div class="form-group">
            <label for="summary">Tóm Tắt</label>
            <textarea class="form-control" id="summary" name="summary" rows="3">{{ old('summary', $book->summary) }}</textarea>
        </div>

        <!-- Số Lượng -->
        <div class="form-group">
            <label for="quantity">Số Lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $book->quantity) }}" required>
        </div>

        <!-- Nút Cập Nhật -->
        <button type="submit" class="btn btn-success">Cập Nhật</button>
    </form>
@endsection
