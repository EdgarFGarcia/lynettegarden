<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('mobile_number');
            $table->string('email');
            $table->foreignId('themes_id');
            $table->foreign('themes_id')->references('id')->on('themes');
            $table->double('price', 10, 4);
            $table->double('partial_price', 10, 4);
            $table->tinyInteger('is_paid_full')->default(0);
            $table->tinyInteger('is_partial_paid')->default(0);
            $table->tinyInteger('is_done')->default(0);
            $table->tinyInteger('is_cancelled')->default(0);
            $table->date('date_of_reservation');
            $table->time('time_of_reservation');
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
        Schema::dropIfExists('reservations');
    }
}
