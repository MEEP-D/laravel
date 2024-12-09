<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Hiển thị danh sách sách
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    public function show()
    {
        // Lấy sách theo ID
        $books = Book::all();
    
        // Trả về view 'books.show' với dữ liệu sách
        return view('books.show', compact('books'));
    }
    
    // Hiển thị form tạo sách mới
    public function create()
    {
        return view('books.create');
    }

    // Lưu sách mới
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255', // Thêm validation cho category
            'price' => 'required|numeric|min:0',
            'pages' => 'required|integer|min:1',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'publish_year' => 'required|integer|min:1900|max:'.date('Y'),
            'summary' => 'nullable|string|max:1000',
            'quantity' => 'required|integer|min:0',
        ]);

        // Tạo mới sách
        Book::create([
            'title' => $request->title,
            'category' => $request->category,
            'price' => $request->price,
            'pages' => $request->pages,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publish_year' => $request->publish_year,
            'summary' => $request->summary,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('books.index')->with('success', 'Sách đã được thêm thành công!');
    }

    // Hiển thị form sửa sách
    public function edit($id)
    {
        $book = Book::findOrFail($id); // Tìm sách theo ID
        return view('books.edit', compact('book'));
    }

    // Cập nhật sách
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'pages' => 'required|integer|min:1',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'publish_year' => 'required|integer|min:1900|max:'.date('Y'),
            'summary' => 'nullable|string|max:1000',
            'quantity' => 'required|integer|min:0',
        ]);

        $book = Book::findOrFail($id); // Tìm sách theo ID
        $book->update([
            'title' => $request->title,
            'category' => $request->category,
            'price' => $request->price,
            'pages' => $request->pages,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publish_year' => $request->publish_year,
            'summary' => $request->summary,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('books.index')->with('success', 'Sách đã được cập nhật thành công!');
    }

    // Xóa sách
    public function destroy($id)
    {
        $book = Book::findOrFail($id); // Tìm sách theo ID
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Sách đã được xóa thành công!');
    }
}

