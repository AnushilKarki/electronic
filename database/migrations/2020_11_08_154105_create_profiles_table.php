<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('profile_photo')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->integer('total_orders')->nullable();
            $table->integer('total_gifts')->nullable();
            $table->integer('total_return')->nullable();
            $table->integer('total_order_point')->nullable();
            $table->integer('phone_no')->nullable();
            $table->string('habits')->nullable();
            $table->string('intrest')->nullable();
            $table->string('profession')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('education')->nullable();
            $table->string('income')->nullable();
            $table->string('lifestyle')->nullable();
            $table->integer('total_time_spent')->nullable();
            $table->integer('total_review')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('email')->nullable()->unique();
            $table->integer('total_viewed_product')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
