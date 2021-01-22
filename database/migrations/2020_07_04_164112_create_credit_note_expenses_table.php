<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditNoteExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_note_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cn_no');
            $table->date('cn_date');
            $table->string('s_no')->nullable();
            $table->date('s_date')->nullable();
            $table->string('r_in_no')->nullable();
            $table->date('r_in_date')->nullable();
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
        Schema::dropIfExists('credit_note_expenses');
    }
}
