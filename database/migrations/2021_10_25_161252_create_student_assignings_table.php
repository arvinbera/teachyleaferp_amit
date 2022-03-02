<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAssigningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assignings', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->comment('same as user_id');
            $table->integer('session_id');
            $table->integer('shift_id')->nullable();
            $table->integer('class_id');
            $table->integer('section_id')->nullable();
            $table->integer('roll_no')->nullable();
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
        Schema::dropIfExists('student_assignings');
    }
}
