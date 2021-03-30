<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_1',255)->nullable();
            $table->string('category_2',255)->nullable();
            $table->string('category_3',255)->nullable();
            $table->string('remark',255)->nullable();
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
        Schema::dropIfExists('category_names');
    }
}
