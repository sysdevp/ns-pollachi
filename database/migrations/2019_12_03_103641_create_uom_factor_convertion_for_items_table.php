<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUomFactorConvertionForItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uom_factor_convertion_for_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_1')->nullable();
            $table->integer('category_2')->nullable();
            $table->integer('category_3')->nullable();
            $table->integer('item_id')->nullable();
            $table->integer('default_uom_id')->nullable();
            $table->integer('uom_id')->nullable();
            $table->integer('convertion_factor')->nullable();
            $table->boolean('active_status')->default(true)->comment = '1=>Active,0=>DeActive ';
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uom_factor_convertion_for_items');
    }
}
