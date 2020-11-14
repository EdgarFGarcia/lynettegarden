<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('housenumber')->after('email');
            $table->string('barangay')->after('housenumber');
            $table->string('city')->after('barangay');
            $table->string('state')->after('city');
            $table->string('country')->after('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
