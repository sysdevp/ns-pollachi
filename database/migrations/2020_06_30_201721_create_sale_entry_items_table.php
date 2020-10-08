<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleEntryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_entry_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_no')->nullable();
            $table->date('s_date')->nullable();
            $table->string('so_no')->nullable();
            $table->date('so_date')->nullable();
            $table->string('sale_estimation_no')->nullable();
            $table->date('sale_estimation_date')->nullable();
            $table->string('d_no')->nullable();
            $table->date('d_date')->nullable();
            $table->string('item_sno');
            $table->bigInteger('item_id')->unsigned();
            $table->float('mrp')->nullable();
            $table->float('gst')->nullable();
            $table->decimal('rate_exclusive_tax');
            $table->decimal('rate_inclusive_tax');
            $table->integer('qty');
            $table->integer('rejected_qty')->nullable();
            $table->integer('remaining_qty')->nullable();
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
        Schema::dropIfExists('sale_entry_items');
    }
}
