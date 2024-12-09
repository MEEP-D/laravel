<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Định nghĩa các trường có thể mass-assign
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'total_price', 'status'
    ];

    // Mối quan hệ với bảng OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
