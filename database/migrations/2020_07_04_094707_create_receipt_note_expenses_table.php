<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptNoteExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_note_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rn_no');
            $table->date('rn_date');
            $table->string('po_no')->nullable();
            $table->date('po_date')->nullable();
            $table->string('estimation_no')->nullable();
            $table->date('estimation_date')->nullable();
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
        Schema::dropIfExists('receipt_note_expenses');
    }
}
