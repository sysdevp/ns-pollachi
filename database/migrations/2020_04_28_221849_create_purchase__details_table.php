<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase__details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('voucher_no')->unique();
            $table->string('voucher_date');
            $table->string('gate_pass_no');
            $table->string('receipt_note_no')->nullable();
            $table->string('supplier_invoice_no')->nullable();
            $table->string('supplier_invoice_date')->nullable();
            $table->string('supplier_details')->nullable();
            $table->string('order_details')->nullable();
            $table->string('transport_details')->nullable();
            $table->string('remarks')->nullable();
            $table->string('supplier_invoice_value')->nullable();
            $table->string('total_amount');
            $table->string('total_price');
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
        Schema::dropIfExists('purchase__details');
    }
}
