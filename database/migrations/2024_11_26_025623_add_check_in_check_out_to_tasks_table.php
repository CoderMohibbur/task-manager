<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->timestamp('check_in_time')->nullable();  // Add check-in time
            $table->timestamp('check_out_time')->nullable(); // Add check-out time
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('check_in_time'); // Drop check-in time
            $table->dropColumn('check_out_time'); // Drop check-out time
        });
    }
};
