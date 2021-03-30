<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderBetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_betas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('po_no')->nullable();
            $table->date('po_date')->nullable();
            $table->string('estimation_no')->nullable();
            $table->date('estimation_date')->nullable();
            $table->bigInteger('supplier_id')->unsigned()->nullable();
            $table->boolean('purchase_type')->comment = '1=>Cash Purchase,0=>Credit Purchase';
            $table->decimal('overall_discount', 6,2)->nullable();
            $table->string('round_off')->nullable();
            $table->decimal('total_net_value', 10,2)->nullable();
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
        Schema::dropIfExists('purchase_order_betas');
    }
}
