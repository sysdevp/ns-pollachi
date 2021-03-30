<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('so_no')->nullable();
            $table->date('so_date')->nullable();
            $table->string('estimation_no')->nullable();
            $table->date('estimation_date')->nullable();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->bigInteger('salesman_id')->unsigned()->nullable();
            $table->boolean('sale_type')->comment = '1=>Cash Sale,0=>Credit Sale';
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
        Schema::dropIfExists('sale_orders');
    }
}
