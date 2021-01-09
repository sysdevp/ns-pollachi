<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
          //  $table->string('code', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();	
            $table->bigInteger('district_id')->unsigned()->nullable();	
            $table->string('remark', 500)->nullable();
            $table->boolean('active_status')->default(true)->comment = '1=>Active,0=>DeActive ';
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

           /* $table->foreign('country_id')
            ->references('id')
            ->on('countries')
            ->onDelete('cascade');

            $table->foreign('state_id')
            ->references('id')
            ->on('states')
            ->onDelete('cascade');

            $table->foreign('district_id')
            ->references('id')
            ->on('districts')
            ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
