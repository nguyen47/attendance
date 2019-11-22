<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('student_id');
            $table
                ->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');
            $table->dateTime('check_in')->nullable();
            $table->dateTime('check_out')->nullable();
            $table->timestamps(); // Check in and check out
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
