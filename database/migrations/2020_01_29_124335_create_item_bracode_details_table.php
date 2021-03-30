<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemBracodeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_bracode_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id')->nullable();
            $table->string('barcode', 500)->nullable();
            $table->string('remark', 100)->nullable();
            $table->boolean('active_status')->default(true)->comment = '1=>Active,0=>DeActive ';
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('item_bracode_details');
    }
}
