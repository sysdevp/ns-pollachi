<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estimation_no')->nullable();
            $table->date('estimation_date')->nullable();
            $table->bigInteger('supplier_id')->unsigned()->nullable();
            $table->bigInteger('agent_id')->unsigned()->nullable();
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
        Schema::dropIfExists('estimations');
    }
}
