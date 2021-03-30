<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxdummiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxdummies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('item_id')->unsigned();
            $table->string('name')->nullable();
            $table->float('value')->nullable();
            $table->date('valid_from')->nullable();
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
        Schema::dropIfExists('taxdummies');
    }
}
