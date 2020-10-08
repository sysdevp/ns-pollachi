<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectionInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejection_ins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('r_in_no')->nullable();
            $table->date('r_in_date')->nullable();
            $table->string('s_no')->nullable();
            $table->date('s_date')->nullable();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->bigInteger('salesman_id')->unsigned()->nullable();
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
        Schema::dropIfExists('rejection_ins');
    }
}
