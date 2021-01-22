<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gatepass_no')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('item_code')->nullable();
            $table->string('item_name')->nullable();
            $table->string('mrp')->nullable();
            $table->string('hsn')->nullable();
            $table->string('quantity')->nullable();
            $table->string('tax_rate')->nullable();
            $table->string('inclusive')->nullable();
            $table->string('rate_exclusive')->nullable();
            $table->string('rate_inclusive')->nullable();
            $table->string('amount')->nullable();
            $table->string('discount')->nullable();
            $table->string('net_price')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
