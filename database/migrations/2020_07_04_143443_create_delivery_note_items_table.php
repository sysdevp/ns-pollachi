<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryNoteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_note_items', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->string('d_no')->nullable();
            $table->date('d_date')->nullable();
            $table->string('sale_estimation_no')->nullable();
            $table->date('sale_estimation_date')->nullable();
            $table->string('so_no')->nullable();
            $table->date('so_date')->nullable();
            $table->string('item_sno')->nullable();
            $table->bigInteger('item_id')->unsigned();
            $table->float('mrp')->nullable();
            $table->float('gst')->nullable();
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
        Schema::dropIfExists('delivery_note_items');
    }
}
