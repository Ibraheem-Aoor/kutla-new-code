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
            $table->string('role');
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('email')->unique();
            $table->string('phone',50)->nullable();
            $table->string('user_name',100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type', ['0', '1', '2', '3', '4'])->comment('0=Reporter | 1=Accountant | 2= Editor | 3=  Admin | 4= Super Admin');
            $table->integer('is_active')->default(1);
            $table->integer('is_approve')->default(0);
            $table->string('national_id',50)->nullable();
            $table->string('father_name',100)->nullable();
            $table->string('mother_name',100)->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->date('appointed_date')->nullable();
            $table->string('image')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
