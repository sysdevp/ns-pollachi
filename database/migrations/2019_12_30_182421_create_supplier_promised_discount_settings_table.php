<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierPromisedDiscountSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_promised_discount_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('supplier_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->integer('discount_type_id')->nullable();
            $table->float('discount')->nullable();
            $table->float('discount_value')->nullable();
            $table->float('discount_in_rs')->nullable();
            $table->float('discount_in_percentage')->nullable();
            $table->date('valid_till')->nullable();

            /*$table->integer('discount_in_rs')->nullable();
            $table->integer('category_3')->nullable();
            $table->string('print_name_in_english', 500)->nullable();
            $table->string('print_name_in_language_1', 500)->nullable();
            $table->string('print_name_in_language_2', 500)->nullable();
            $table->string('print_name_in_language_3', 500)->nullable();
            $table->string('ptc', 500)->nullable();
            $table->string('ean', 500)->nullable();
            $table->string('hsn', 500)->nullable();
            $table->float('mrp')->nullable();
            $table->float('default_selling_price')->nullable();
            $table->integer('uom_id')->nullable();
            $table->integer('opening_stock')->nullable();
            $table->boolean('is_expiry_date')->default(false)->comment = '0=>Not Applicable,1=>Applicable';
            $table->boolean('is_machine_weight_applicable')->default(false)->comment = '0=>Not Applicable,1=>Applicable';
            $table->date('expiry_date')->nullable();
            $table->string('image', 500)->nullable();
            $table->string('remark', 500)->nullable();
            $table->boolean('active_status')->default(true)->comment = '1=>Active,0=>DeActive ';
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable(); */
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
        Schema::dropIfExists('supplier_promised_discount_settings');
    }
}
