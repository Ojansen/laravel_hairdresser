<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairdressers', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('photo')->nullable();
            $table->text('bio')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('hairstyles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64);
            $table->float('price', 8, 2);
            $table->tinyInteger('sex');
            $table->unsignedInteger('hairdresser_id');
            $table->timestamps();
        });

        Schema::create('hairlinks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hairstyle_id');
            $table->foreign('hairstyle_id')->references('id')->on('hairstyles')->onDelete('cascade');
            $table->unsignedInteger('hairdresser_id');
            $table->foreign('hairdresser_id')->references('id')->on('hairdressers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hairdresser');
        Schema::dropIfExists('hairstyle');
        Schema::dropIfExists('hairlink');
    }
}
