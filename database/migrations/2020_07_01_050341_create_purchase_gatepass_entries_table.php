<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseGatepassEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_gatepass_entries', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->string('purchase_gatepass_no')->nullable();
            $table->date('purchase_gatepass_date')->nullable();
            $table->string('po_no')->nullable();
            $table->date('po_date')->nullable();
            $table->string('estimation_no')->nullable();
            $table->date('estimation_date')->nullable();
            $table->biginteger('supplier_id')->unsigned()->nullable();
            $table->decimal('load_bill', 8,2)->nullable();
            $table->decimal('unload_bill', 8,2)->nullable();
            $table->decimal('load_live', 8,2)->nullable();
            $table->decimal('unload_live', 8,2)->nullable();
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
        Schema::dropIfExists('purchase_gatepass_entries');
    }
}
