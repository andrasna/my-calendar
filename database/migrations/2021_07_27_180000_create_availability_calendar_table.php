<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailabilityCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availability_calendar', function (Blueprint $table) {
            $table->id();
            $table->date('scheduled_from');
            $table->date('scheduled_till')->nullable();
            $table->string('day_name', 9);
            $table->string('active_week', 4); // all, odd, even, one
            $table->time('begins_at');
            $table->time('ends_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('availability_calendar');
    }
}
