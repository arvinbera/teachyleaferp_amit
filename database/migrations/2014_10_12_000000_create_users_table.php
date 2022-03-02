<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->string('user_type')->nullable()->comment('admins, employees, students');
            $table->string('role')->nullable()->comment('admin, operator, gen_user');
            $table->string('profile_photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name')->nullable();
            $table->tinyText('address_current')->nullable();
            $table->tinyText('address_permanent')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->date('dob')->nullable();
            $table->string('id_no')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('generated_password')->nullable();
            $table->integer('designation_id')->nullable();
            $table->double('salary')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0: inactive, 1: active');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
