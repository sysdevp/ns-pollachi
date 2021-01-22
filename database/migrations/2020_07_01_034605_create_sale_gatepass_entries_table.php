<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleGatepassEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_gatepass_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sales_gatepass_no')->nullable();
            $table->date('sales_gatepass_date')->nullable();
            $table->string('so_no')->nullable();
            $table->date('so_date')->nullable();
            $table->string('estimation_no')->nullable();
            $table->date('estimation_date')->nullable();
            $table->biginteger('customer_id')->unsigned()->nullable();
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
        Schema::dropIfExists('sale_gatepass_entries');
    }
}
