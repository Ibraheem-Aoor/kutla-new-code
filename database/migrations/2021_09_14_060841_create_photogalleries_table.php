<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotogalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photogalleries', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->string('description');
            $table->string('image')->comment('Cover Image "main image" ');
            $table->integer('status')->default(0);
            $table->integer('viewers')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photogalleries');
    }
}
