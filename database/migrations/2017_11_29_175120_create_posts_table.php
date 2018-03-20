<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('target')->nullable(); // || institute || department ||  class

            $table->string('department')->nullable();
            $table->string('course')->nullable();
            $table->string('year')->nullable();

            $table->string('heading')->nullable();
            $table->string('message')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('sender_title')->nullable();


            $table->string('attachment')->nullable(); // true || false
            $table->string('pdf_link')->nullable();
            $table->string('picture_link')->nullable();
            $table->string('img_url')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
