<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_types', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name', 100)->nullable();
              $table->enum('type', ['Direct', 'Indirect'])->nullable();
              $table->string('remark', 500)->nullable();
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
        Schema::dropIfExists('income_types');
    }
}
