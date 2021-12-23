<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('slug');
            $table->text('product_description');
            $table->unsignedBigInteger('association_id');
            $table->float('price')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->integer('quantity')->default(0);
            $table->enum('type',['showcase','purchasable']);
            $table->boolean('is_active')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->string('creator');
            $table->longText('creator_brief_description')->nullable();
            $table->float('rating')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
