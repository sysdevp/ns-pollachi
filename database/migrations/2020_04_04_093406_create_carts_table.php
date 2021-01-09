<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
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
            $table->string('status')->nullable()->comment = '1=>Added to Gate Pass Entry, 0=>Not Added To Gate Pass Entry';
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
        Schema::dropIfExists('carts');
    }
}
