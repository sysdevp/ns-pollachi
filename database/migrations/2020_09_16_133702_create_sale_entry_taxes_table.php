<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleEntryTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_entry_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_no')->nullable();
            $table->date('s_date')->nullable();
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
        Schema::dropIfExists('sale_entry_taxes');
    }
}
