<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
{
    // Lấy tất cả các đơn hàng với phân trang, mỗi trang 10 đơn hàng
    $orders = Order::with('orderItems')->paginate(10); // Eager loading orderItems và phân trang

    return view('orders.index', compact('orders'));
}


    public function store(Request $request)
    {
        // Tạo đơn hàng mới
        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total_price' => $request->total_price,
            'status' => 'pending',
        ]);

        // Thêm các sản phẩm vào đơn hàng
        foreach ($request->order_items as $item) {
            $order->orderItems()->create([
                'book_id' => $item['book_id'],
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

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được tạo thành công');
    }

    public function show($id)
{
    $order = Order::with('orderItems')->findOrFail($id);
    return view('orders.show', compact('order'));
}

}
