<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dn_no')->nullable();
            $table->date('dn_date')->nullable();
            $table->string('p_no')->nullable();
            $table->date('p_date')->nullable();
            $table->string('r_out_no')->nullable();
            $table->date('r_out_date')->nullable();
            $table->bigInteger('supplier_id')->unsigned()->nullable();
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
        Schema::dropIfExists('debit_notes');
    }
}
