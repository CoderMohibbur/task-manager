<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('phone_number');
            $table->string('district');
            $table->string('thana');
            $table->string('company_name')->nullable();
            $table->dateTime('slot_time');
            $table->enum('slot_type', ['Medium', 'High', 'Emergency']);
            $table->string('google_event_id')->nullable(); // Google Calendar Event ID
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
