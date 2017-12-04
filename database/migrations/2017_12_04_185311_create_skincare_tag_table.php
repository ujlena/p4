<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkincareTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skincare_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('skincare_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('skincare_id')->references('id')->on('skincares');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skincare_tag');
    }
}
