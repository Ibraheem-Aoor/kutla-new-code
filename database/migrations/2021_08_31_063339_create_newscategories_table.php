<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewscategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newscategories', function (Blueprint $table) {
        $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->string('type',100)->nullable();
            $table->string('image',255)->nullable();
            $table->integer('post_counter')->default(0);
            $table->integer('menu_publish')->default(1);
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
        Schema::dropIfExists('newscategories');
    }
}
