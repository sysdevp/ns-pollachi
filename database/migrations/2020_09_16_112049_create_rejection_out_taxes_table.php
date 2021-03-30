<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectionOutTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejection_out_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('r_out_no')->nullable();
            $table->date('r_out_date')->nullable();
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
        Schema::dropIfExists('rejection_out_taxes');
    }
}
