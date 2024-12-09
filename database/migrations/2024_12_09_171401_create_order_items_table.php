<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Tham chiếu đến bảng orders
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade'); // Tham chiếu đến bảng books
            $table->integer('quantity')->default(1); // Số lượng sản phẩm
            $table->string('title'); // Tên sách
            $table->string('category'); // Thể loại sách
            $table->decimal('price', 10, 2); // Giá sách
            $table->string('author'); // Tác giả
            $table->string('publisher'); // Nhà xuất bản
            $table->year('publish_year'); // Năm xuất bản
            $table->integer('pages'); // Số trang
            $table->text('summary')->nullable(); // Tóm tắt sách
            $table->decimal('total_price', 10, 2); // Thành tiền cho sản phẩm (Giá * Số lượng)
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
