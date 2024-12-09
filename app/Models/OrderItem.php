<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Định nghĩa các trường có thể mass-assign
    protected $fillable = [
        'order_id', 'book_id', 'quantity', 'title', 'category', 'price', 'author', 'publisher', 'publish_year', 'pages', 'summary', 'total_price'
    ];

    // Mối quan hệ với bảng Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Mối quan hệ với bảng Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
