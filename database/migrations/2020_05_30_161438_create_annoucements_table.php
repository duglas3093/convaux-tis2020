<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoucementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
        });

        Schema::create('announcement_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
        });

        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('status');
            $table->integer('management_id')->unsigned();
            $table->integer('announcement_type_id')->unsigned();
            $table->foreign('management_id')->references('id')->on('managements');
            $table->foreign('announcement_type_id')->references('id')->on('announcement_type');
            $table->timestamps();
        });

        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('announcement_id')->nullable()->unsigned();
            $table->foreign('announcement_id')->references('id')->on('announcements');
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
        Schema::drop('managements');
        Schema::drop('announcements');
        Schema::drop('requirements');
    }
}
