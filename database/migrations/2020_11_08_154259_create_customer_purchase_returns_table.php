<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPurchaseReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_purchase_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->references('id')->on('customer_purchases')->onDelete('cascade')->nullable();
            $table->text('review')->nullable();
            $table->float('total_charge');
            $table->enum('type',['EXCHANGE','REFUND'])->default('EXCHANGE');
            $table->enum('status',['PENDING','COMPLETED'])->default('PENDING');
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
        Schema::dropIfExists('customer_purchase_returns');
    }
}
