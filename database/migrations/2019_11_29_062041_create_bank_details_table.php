<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref_table',10)->nullable()->comment('Emp=>Employee,Agent=>Agent,Cus=>Customer,Sup=>Supplier');
            $table->bigInteger('bank_id')->unsigned()->nullable();
            $table->bigInteger('branch_id')->unsigned()->nullable();
            $table->bigInteger('account_type_id')->unsigned()->nullable();
             $table->bigInteger('bank_ref_id')->unsigned()->nullable();
            $table->string('ifsc', 500)->nullable();
            $table->string('account_holder_name', 500)->nullable();
            $table->string('account_no', 500)->nullable();
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
        Schema::dropIfExists('bank_details');
    }
}
