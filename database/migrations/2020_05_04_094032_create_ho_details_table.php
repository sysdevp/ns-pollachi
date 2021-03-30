<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ho_details', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->string('name', 500);
              $table->bigInteger('gst_number')->unsigned()->nullable();
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


              $table->foreign('state_id')
            ->references('id')
            ->on('states')
            ->onDelete('cascade');

              $table->foreign('district_id')
            ->references('id')
            ->on('districts')
            ->onDelete('cascade');

             

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ho_details');
    }
}
