<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountyPromoRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('county_promo_relations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('county',255)->nullable();
            $table->mediumInteger('price')->default(0)->nullable();

            $table->unsignedInteger('county_promo_id');
            $table->foreign('county_promo_id')->references('id')->on('county_promo_codes')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('county_promo_relations');
    }
}
