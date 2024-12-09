<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Định nghĩa tên bảng (nếu khác với tên model)
    protected $table = 'carts';  // Nếu bảng trong cơ sở dữ liệu của bạn tên là 'carts'

    // Định nghĩa các trường có thể được gán giá trị (mass assignable)
    protected $fillable = [
        'book_id',
        'title',
        'category',
        'price',
        'author',
        'publisher',
        'publish_year',
        'pages',
        'summary',
        'quantity',
    ];

    // Thiết lập mối quan hệ với model Book nếu cần
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
