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
            $table->unsignedBigInteger('project_id')->nullable();  // Adding project_id column
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade'); // If you have a projects table and want foreign key relationship
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['project_id']); // Drop foreign key if exists
            $table->dropColumn('project_id'); // Drop the project_id column
        });
    }

};
