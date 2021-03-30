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
            $table->bigIncrements('id')->primary();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('district_id');	

            $table->string('code', 50)->unique();
            $table->string('name', 255)->unique();
            $table->string('remark', 255);
			$table->boolean('active_status')->default(true);
            $table->timestamps();

            $table->foreign('country_id')
                    ->references('id')
                    ->on('countries')
                    ->onDelete('cascade');

            $table->foreign('state_id')
                    ->references('id')
                    ->on('state')
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
        Schema::dropIfExists('cities');
    }
}
