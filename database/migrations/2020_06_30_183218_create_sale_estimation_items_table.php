<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleEstimationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_estimation_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sale_estimation_no');
            $table->date('sale_estimation_date')->nullable();
            $table->string('item_sno');
            $table->bigInteger('item_id')->unsigned();
            $table->float('mrp')->nullable();
            $table->float('gst');
            $table->decimal('rate_exclusive_tax');
            $table->decimal('rate_inclusive_tax');
            $table->integer('qty');
            $table->bigInteger('uom_id')->unsigned();
            $table->decimal('discount')->nullable();
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
        Schema::dropIfExists('sale_estimation_items');
    }
}
