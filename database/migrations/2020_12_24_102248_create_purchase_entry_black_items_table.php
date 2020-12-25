<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseEntryBlackItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_entry_black_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('p_no')->nullable();
            $table->date('p_date')->nullable();
            $table->string('po_no')->nullable();
            $table->date('po_date')->nullable();
            $table->string('estimation_no')->nullable();
            $table->date('estimation_date')->nullable();
            $table->string('rn_no')->nullable();
            $table->date('rn_date')->nullable();
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
        Schema::dropIfExists('purchase_entry_black_items');
    }
}
