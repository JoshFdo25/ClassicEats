<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image', 50);
            $table->string('name', 50);
            $table->text('description');
            $table->text('ingredients');
            $table->boolean('status')->default(true); // true for available, false for not available
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('category_id');
            $table->string('category_name', 255);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
