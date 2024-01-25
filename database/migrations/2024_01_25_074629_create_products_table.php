<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('price');
            $table->boolean('is_active')->default(1);
            $table->string('image')->nullable();
            $table->timestamps();
            $table->enum('status', ['in stock', 'sold out', 'coming soon'])->default('in stock');
            $table->text('description')->nullable();
            
            $table->foreign('category_id', 'products_category_id_foreign')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
