<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->comment('same as user_id');
            $table->string('id_no')->nullable();
            $table->integer('session_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('exam_type_id')->nullable();
            $table->integer('subject_assigning_id')->nullable();
            $table->double('marks')->nullable();
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
        Schema::dropIfExists('marks');
    }
}
