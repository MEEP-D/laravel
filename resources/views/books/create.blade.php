<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm Sách Mới</h1>

    <!-- Hiển thị thông báo nếu có -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form thêm sách mới -->
    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Tiêu đề sách</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Thể loại</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}" required>
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" required min="0">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pages">Số trang</label>
            <input type="number" name="pages" id="pages" class="form-control" value="{{ old('pages') }}" required min="1">
            @error('pages')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="author">Tác giả</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
            @error('author')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="publisher">Nhà xuất bản</label>
            <input type="text" name="publisher" id="publisher" class="form-control" value="{{ old('publisher') }}" required>
            @error('publisher')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="publish_year">Năm xuất bản</label>
            <input type="number" name="publish_year" id="publish_year" class="form-control" value="{{ old('publish_year') }}" required min="1900" max="{{ date('Y') }}">
            @error('publish_year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="summary">Tóm tắt</label>
            <textarea name="summary" id="summary" class="form-control" rows="4">{{ old('summary') }}</textarea>
            @error('summary')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required min="0">
            @error('quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm Sách</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
