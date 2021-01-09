<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->enum('salutation', ['Mr', 'Mrs'])->nullable();
            $table->string('company_name', 500)->nullable();
            $table->integer('customer_id')->nullable();
            $table->boolean('customer_type')->default(false)->comment = '0=>New,1=>Exist ';
            $table->string('name', 500)->nullable();
            $table->string('code', 100)->nullable();
            $table->string('phone_no', 15)->nullable();
            $table->string('whatsapp_no', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('pan_card', 100)->nullable();
            $table->string('gst_no', 100)->nullable();
            $table->integer('max_credit_limit')->nullable();
            $table->integer('max_credit_days')->nullable();
            $table->integer('opening_balance')->nullable();
            $table->string('remark', 100)->nullable();
            $table->integer('price_level')->nullable();
            $table->boolean('status')->default(false)->comment = '0=>Active,1=>DeActive ';
            $table->boolean('block')->default(false)->comment = '0=>Active,1=>blocked ';
            $table->string('blocked_reason', 500)->nullable();
            $table->integer('blocked_by')->nullable();
            $table->timestamp('blocked_on')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
