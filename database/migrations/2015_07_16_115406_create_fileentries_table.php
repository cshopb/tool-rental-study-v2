<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileentries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tool_id')->unsigned();
            $table->string('filename');
            $table->string('mime');
            $table->timestamps();

            $table->foreign('tool_id')->references('id')->on('tools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fileentries');
    }
}
