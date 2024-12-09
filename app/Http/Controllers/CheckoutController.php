<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        // Giả sử bạn đang lưu thông tin giỏ hàng trong session
        $cart = Session::get('cart', []);
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('checkout.index', compact('cart', 'totalPrice'));
    }

    public function process(Request $request)
    {
        // Kiểm tra nếu giỏ hàng rỗng
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->route('checkout.index')->with('error', 'Giỏ hàng không có sản phẩm!');
        }

        // Tạo đơn hàng mới
        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total_price' => $this->calculateTotalPrice($cart),
            'status' => 'pending',
        ]);

        // Lưu các sản phẩm trong giỏ hàng vào bảng order_items
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $id, // Giả sử bạn đã có thông tin book_id trong giỏ hàng
                'quantity' => $item['quantity'],
                'title' => $item['title'],
                'category' => $item['category'],
                'price' => $item['price'],
                'author' => $item['author'],
                'publisher' => $item['publisher'],
                'publish_year' => $item['publish_year'],
                'pages' => $item['pages'],
                'summary' => $item['summary'],
                'total_price' => $item['price'] * $item['quantity'],
            ]);
        }

        // Xóa giỏ hàng sau khi thanh toán
        Session::forget('cart');

        // Chuyển hướng đến trang đơn hàng hoặc trang thông báo thành công
        return redirect()->route('orders.show', $order->id)->with('success', 'Đơn hàng của bạn đã được thanh toán thành công!');
    }

    private function calculateTotalPrice($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}
