<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('salutation', ['Mr', 'Mrs'])->nullable();	
            $table->string('name', 500)->nullable();
            $table->string('code', 100)->nullable();
            $table->string('phone_no', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->date('dob')->nullable();	
            $table->string('father_name', 500)->nullable();
            $table->string('blood_group', 100)->nullable();
            $table->enum('material_status', ['Married', 'Single','Divorced'])->nullable();
             $table->string('profile', 500)->nullable();
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
        Schema::dropIfExists('agents');
    }
}
