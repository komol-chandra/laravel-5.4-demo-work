<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *Email,Address,Phone.father name,mother name,class name,gender,Birthday,
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->string('student_name');
            $table->string('student_roll');
            $table->unsignedBigInteger('blood_name');
            $table->foreign('blood_name')->references('blood_id')->on('bloods')->onDelete('cascade');
            $table->unsignedBigInteger('department_name');
            $table->foreign('department_name')->references('department_id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('class_name');
            $table->foreign('class_name')->references('class_id')->on('class_names')->onDelete('cascade');
            $table->unsignedBigInteger('gender_name');
            $table->foreign('gender_name')->references('gender_id')->on('genders')->onDelete('cascade');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('student_email')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('student_address')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('students');
    }
}
