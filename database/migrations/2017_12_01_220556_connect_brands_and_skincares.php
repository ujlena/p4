<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectBrandsAndSkincares extends Migration
{
    public function up()
    {
        Schema::table('skincares', function (Blueprint $table) {
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    public function down()
    {
        Schema::table('skincares', function (Blueprint $table) {
            $table->dropForeign('skincares_brand_id_foreign');
            $table->dropColumn('brand_id');
        });
    }
}