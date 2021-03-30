<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellingPriceSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selling_price_setups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('setup')->nullable()->comment = '1 => Based on Price Defined In Item Master, 2 => Based On Last Purchase Cost';
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
        Schema::dropIfExists('selling_price_setups');
    }
}
