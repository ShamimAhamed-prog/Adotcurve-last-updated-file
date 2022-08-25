<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentBookedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_bookeds', function (Blueprint $table) {
            $table->id();
            $table->string('inv_id')->nullable();
            $table->string('s_id')->nullable();
            $table->string('note');
            $table->string('slotdate');
            $table->string('timeslot');
            $table->string('status')->default('Pending');
            $table->string('book_id');
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
        Schema::dropIfExists('appointment_bookeds');
    }
}
