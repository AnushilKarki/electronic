<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade')->nullable();
          
            $table->string('particular')->nullable();
            $table->float('total')->nullable();
            $table->float('paid')->nullable();
            $table->float('remaining')->nullable();
            $table->float('tax')->nullable();
            $table->float('vat')->nullable();
            $table->float('discount_amount')->nullable();
            $table->enum('payment_method',['cash_on_delivery','esewa','mobile_banking'])->default('cash_on_delivery');
            $table->enum('status',['completed','remaining','pending'])->default('pending');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_payments');
    }
}
