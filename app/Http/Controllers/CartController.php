<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Thêm sách vào giỏ hàng
    public function add(Book $book)
    {
        // Kiểm tra nếu giỏ hàng đã tồn tại trong session
        $cart = session()->get('cart', []);

        // Nếu sách đã có trong giỏ hàng, tăng số lượng
        if (isset($cart[$book->id])) {
            $cart[$book->id]['quantity']++;
        } else {
            // Nếu sách chưa có trong giỏ hàng, thêm mới
            $cart[$book->id] = [
                'title' => $book->title,
                'book_id' => $book->id,
                'category' => $book->category,
                'price' => $book->price,
                'author' => $book->author,
                'publisher' => $book->publisher,
                'publish_year' => $book->publish_year,
                'pages' => $book->pages,
                'summary' => $book->summary,
                'quantity' => 1,
            ];
        }

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->route('books.index')->with('success', 'Sách đã được thêm vào giỏ hàng!');
    }

    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = session()->get('cart', []); // Lấy giỏ hàng từ session

        return view('cart.index', compact('cart'));
    }

    // Xóa sách khỏi giỏ hàng
    public function remove($id)
    {
        $cart = session()->get('cart', []); // Lấy giỏ hàng từ session

        // Xóa sản phẩm khỏi giỏ hàng
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        // Cập nhật lại giỏ hàng trong session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Sách đã được xóa khỏi giỏ hàng!');
    }

    // Cập nhật số lượng sách trong giỏ hàng
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []); // Lấy giỏ hàng từ session

        // Kiểm tra nếu sách tồn tại trong giỏ hàng
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
        }

        // Cập nhật lại giỏ hàng trong session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được cập nhật!');
    }
}
