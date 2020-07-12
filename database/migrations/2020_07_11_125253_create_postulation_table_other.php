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
            $table->integer('allowed_student_id')->unsigned();
            $table->integer('announcement_id')->unsigned();
            $table->foreign('allowed_student_id')->references('id')->on('allowed_student');
            $table->foreign('announcement_id')->references('id')->on('announcements');
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
