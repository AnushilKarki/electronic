<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_parcels', function (Blueprint $table) {
            $table->id();
            $table->string('pickup_address');
            $table->string('delivery_address');
            $table->string('pickup_contact_no');
            $table->string('delivery_contact_no');
            $table->string('particular')->nullable();
            $table->enum('available_time',['morning','day','evening','night'])->default('day');
            $table->float('total_amount_collection',8,2);
            $table->float('weight')->nullable();
            $table->float('km')->nullable();
            $table->float('delivery_charge',8,2)->nullable();
            $table->string('coupon')->nullable();
            $table->enum('status',['pending','packaging_completed','ready_to_deliver','delivery_completed'])->default('pending');
             $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade')->nullable();
           $table->enum('delivery_type',['purchase','return']);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->boolean('is_paid')->default(false);
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
        Schema::dropIfExists('delivery_parcels');
    }
}
