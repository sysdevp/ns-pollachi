<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceUpdationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_updations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->bigInteger('item_id')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('uom_id')->nullable();
            $table->decimal('mark_up_rs', 10,2)->nullable();
            $table->decimal('mark_up_percent', 10,2)->nullable();
            $table->decimal('mark_down_rs', 10,2)->nullable();
            $table->decimal('mark_down_percent', 10,2)->nullable();
            $table->decimal('unit_price', 10,2)->nullable();
            $table->float('tax_rate', 10,2)->nullable();
            $table->decimal('selling_price', 10,2)->nullable();
            $table->boolean('status')->nullable()->comment = '1=>Active,0=>Not Active ';
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
        Schema::dropIfExists('price_updations');
    }
}
