<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryNoteExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_note_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('d_no');
            $table->date('d_date');
            $table->string('sale_estimation_no')->nullable();
            $table->date('sale_estimation_date')->nullable();
            $table->string('so_no')->nullable();
            $table->date('so_date')->nullable();
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
        Schema::dropIfExists('delivery_note_expenses');
    }
}
