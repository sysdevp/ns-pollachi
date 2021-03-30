<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentAreaMappingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_area_mapping_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('area_id')->nullable();
            $table->integer('agent_area_mapping_id')->nullable();
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
        Schema::dropIfExists('agent_area_mapping_details');
    }
}
