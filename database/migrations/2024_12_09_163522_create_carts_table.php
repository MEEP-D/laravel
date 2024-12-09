<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // Liên kết với bảng books
            $table->string('title');
            $table->string('category');
            $table->decimal('price', 8, 2);
            $table->string('author');
            $table->string('publisher');
            $table->year('publish_year');
            $table->integer('pages');
            $table->text('summary');
            $table->integer('quantity');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('carts');
    }
    
};
