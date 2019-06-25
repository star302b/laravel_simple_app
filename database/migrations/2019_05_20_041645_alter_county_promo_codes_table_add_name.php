<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCountyPromoCodesTableAddName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //county_promo_codes

        Schema::table('county_promo_codes', function (Blueprint $table) {
            $table->text('client_name')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('county_promo_codes', function (Blueprint $table) {
            $table->dropColumn('client_name');
            $table->dropColumn('notes');
        });
    }
}
