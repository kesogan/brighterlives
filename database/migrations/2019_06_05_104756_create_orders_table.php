<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_code')->nullable();
            $table->unsignedBigInteger('buyer_id');
            $table->boolean('is_paid')->default(false);
            $table->enum('payment_type', ['cash_payment', 'payment_on_delivery'])->default('cash_payment');
            $table->enum('order_level', ['initiated', 'processing', 'ontransit', 'delivered', 'cancelled'])->default('initiated');
            $table->float('total_price');
            $table->boolean('is_delivered')->default(false);
            $table->date('delivery_date')->nullable();
            $table->string('error');
            $table->timestamps();

            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}
