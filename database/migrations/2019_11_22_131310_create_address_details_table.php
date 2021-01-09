<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_table',10)->nullable()->comment('Emp=>Employee,Agent=>Agent,Cus=>Customer,Sup=>Supplier');
            $table->bigInteger('address_type_id')->unsigned()->nullable();
            $table->bigInteger('address_ref_id')->unsigned()->nullable();
            $table->string('sf_no', 500)->nullable();
            $table->string('building_name', 500)->nullable();
            $table->mediumText('address_line_1', 500)->nullable();
              $table->mediumText('address_line_2', 500)->nullable();
              $table->mediumText('land_mark', 500)->nullable();
              $table->bigInteger('country_id')->unsigned()->nullable();	
              $table->bigInteger('state_id')->unsigned()->nullable();	
              $table->bigInteger('district_id')->unsigned()->nullable();
              $table->bigInteger('city_id')->unsigned()->nullable();	
              $table->string('postal_code', 500)->nullable();
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
        Schema::dropIfExists('address_details');
    }
}
