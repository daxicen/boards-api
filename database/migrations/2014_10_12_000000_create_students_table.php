<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{

    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->string('full_name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();

            $table->string('department')->nullable(); // none || specify
            $table->string('course')->nullable(); // none || specify
            $table->string('year')->nullable(); // none || specify

            $table->string('title')->nullable(); // none || specify

            $table->string('photo_link')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('verification_status')->nullable();
            $table->string('meta')->nullable();


            $table->softDeletes();
            $table->timestamp('join_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
