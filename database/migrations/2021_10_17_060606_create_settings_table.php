<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('favicon')->nullable();
            $table->string('icon')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_footer')->nullable();
            $table->string('title',100)->nullable()->collation('utf8_general_ci');
            $table->string('name')->nullable()->collation('utf8_general_ci');
            $table->string('short_name')->nullable()->collation('utf8_general_ci');
            $table->text('footer_content')->nullable()->collation('utf8_general_ci');
            $table->text('play_store_url')->nullable();
            $table->text('app_store_url')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
