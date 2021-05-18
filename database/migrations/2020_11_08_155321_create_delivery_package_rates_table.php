<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryPackageRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_rates', function (Blueprint $table) {
            $table->id();
            $table->string('particular');
            $table->float('delivery_rate')->nullable();
            $table->integer('total_days')->nullable();
            $table->float('delivery_weight')->nullable();
            $table->float('delivery_distance')->nullable();
            $table->float('delivery_additional_rate')->nullable();
            $table->enum('delivery_vehicle',['motorbike','cycle','electric','van','truck','taxi','bus'])->default('motorbike');
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
        Schema::dropIfExists('delivery_rates');
    }
}
