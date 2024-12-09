<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'category', 'pages', 'summary', 'quantity', 'price', 'author', 'publisher', 'publish_year',
    ];
}
