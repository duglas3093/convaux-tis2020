<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulationTableOther extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('postulation_status');
            $table->string('rejected_description');
            $table->integer('allowed_student_id')->unsigned()->unique();
            $table->integer('request_id')->unsigned();
            $table->foreign('allowed_student_id')->references('id')->on('allowed_student');
            $table->foreign('request_id')->references('id')->on('requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
