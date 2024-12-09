<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();  // Mã sách
        $table->string('title');  // Tên sách
        $table->string('category');  // Thể loại
        $table->integer('pages');  // Số trang
        $table->text('summary');  // Nội dung tóm tắt
        $table->integer('quantity');  // Số lượng hiện có
        $table->decimal('price', 8, 2);  // Giá bán
        $table->string('author');  // Tác giả
        $table->string('publisher');  // Nhà xuất bản
        $table->year('publish_year');  // Năm xuất bản
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('books');
}

};
