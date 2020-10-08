<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProofDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proof_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('proof_table',10)->nullable()->comment('Emp=>Employee,Agent=>Agent,Cus=>Customer,Sup=>Supplier');
            $table->bigInteger('proof_ref_id')->unsigned()->nullable();
            $table->string('name', 500)->nullable();
            $table->string('number', 500)->nullable();
            $table->string('file', 500)->nullable();
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
        Schema::dropIfExists('proof_details');
    }
}
