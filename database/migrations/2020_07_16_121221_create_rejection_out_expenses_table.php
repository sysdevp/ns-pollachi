<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectionOutExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejection_out_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('r_out_no');
            $table->date('r_out_date');
            $table->string('p_no')->nullable();
            $table->date('p_date')->nullable();
            $table->bigInteger('expense_type')->unsigned()->nullable();
            $table->decimal('expense_amount')->nullable();
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
        Schema::dropIfExists('rejection_out_expenses');
    }
}
