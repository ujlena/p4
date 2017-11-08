<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkincaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skincares', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('type')->comment("Product types");
            $table->string('brand');
            $table->string('name');
            $table->float('price');
            $table->string('skintype');
            $table->string('url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skincares');
    }
}
