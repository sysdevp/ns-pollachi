<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleEntryExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_entry_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_no');
            $table->date('s_date');
            $table->string('so_no')->nullable();
            $table->date('so_date')->nullable();
            $table->string('sale_estimation_no')->nullable();
            $table->date('sale_estimation_date')->nullable();
            $table->string('d_no')->nullable();
            $table->date('d_date')->nullable();
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
        Schema::dropIfExists('sale_entry_expenses');
    }
}
