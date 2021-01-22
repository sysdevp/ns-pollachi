<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatePassEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate_pass_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gate_pass_no')->unique();
            $table->date('date')->nullable();
            $table->string('supplier_name')->nullable();
            $table->integer('type')->comment = '1=>Invoice,0=>Delivary Note ';
            $table->string('supplier_invoice_number')->nullable();
            $table->string('supplier_delivery_number')->nullable();
            $table->string('taxable_value')->nullable();
            $table->string('tax_value')->nullable();
            $table->string('total_invoice_value')->nullable();
            $table->string('load_bill')->nullable();
            $table->string('load_live')->nullable();
            $table->string('unload_bill')->nullable();
            $table->string('unload_live')->nullable();
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
        Schema::dropIfExists('gate_pass_entries');
    }
}
