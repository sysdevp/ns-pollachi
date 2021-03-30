<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryNoteTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_note_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('d_no')->nullable();
            $table->date('d_date')->nullable();
            $table->integer('taxmaster_id')->nullable();
            $table->decimal('value', 10,2)->nullable();
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
        Schema::dropIfExists('delivery_note_taxes');
    }
}
