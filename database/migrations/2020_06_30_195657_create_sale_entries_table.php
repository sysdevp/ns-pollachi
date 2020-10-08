<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_no')->nullable();
            $table->date('s_date')->nullable();
            $table->string('sale_estimation_no')->nullable();
            $table->date('sale_estimation_date')->nullable();
            $table->string('so_no')->nullable();
            $table->date('so_date')->nullable();
            $table->string('d_no')->nullable();
            $table->date('d_date')->nullable();
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
        Schema::dropIfExists('sale_entries');
    }
}
