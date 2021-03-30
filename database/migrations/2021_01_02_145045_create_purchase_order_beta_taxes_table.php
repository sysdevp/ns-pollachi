<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderBetaTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_beta_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('po_no')->nullable();
            $table->date('po_date')->nullable();
            $table->integer('taxmaster_id')->nullable();
            $table->decimal('value', 10,2)->nullable();
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
        Schema::dropIfExists('purchase_order_beta_taxes');
    }
}
