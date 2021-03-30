<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleOrderExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_order_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('so_no');
            $table->date('so_date');
            $table->string('estimation_no');
            $table->date('estimation_date');
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
        Schema::dropIfExists('sale_order_expenses');
    }
}
