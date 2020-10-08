<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitNoteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_note_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dn_no')->nullable();
            $table->date('dn_date')->nullable();
            $table->string('p_no')->nullable();
            $table->date('p_date')->nullable();
            $table->string('r_out_no')->nullable();
            $table->date('r_out_date')->nullable();
            $table->string('item_sno');
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
        Schema::dropIfExists('debit_note_items');
    }
}
