<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 500)->nullable();
            $table->string('code', 100)->nullable();
            $table->enum('item_type', ['Direct', 'Bulk', 'Repack', 'Parent', 'Child'])->nullable();
            $table->float('weight_in_grams', 8, 2)->unsigned()->nullable();
            $table->float('weight_in_kg', 8, 2)->unsigned()->nullable();
            $table->integer('bulk_item_id')->nullable();
            $table->integer('child_unit')->nullable();
            $table->integer('child_item_id')->nullable();
            $table->integer('uom_for_repack_item')->nullable();
            $table->integer('category_id')->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->integer('category_1')->nullable();
            $table->integer('category_2')->nullable();
            $table->integer('category_3')->nullable();
            $table->string('print_name_in_english', 500)->nullable();
            $table->string('print_name_in_language_1', 500)->nullable();
            $table->string('print_name_in_language_2', 500)->nullable();
            $table->string('print_name_in_language_3', 500)->nullable();
            $table->string('ptc', 500)->nullable();
            $table->string('barcode', 500)->nullable();
            $table->string('hsn', 500)->nullable();
            $table->float('mrp')->nullable();
            $table->float('default_selling_price')->nullable();
            $table->integer('uom_id')->nullable();
            $table->integer('opening_stock')->nullable();
            $table->boolean('is_minimum_sales_qty_applicable')->default(false)->comment = '0=>Not Applicable,1=>Applicable';
            $table->float('minimum_sales_price')->nullable();
            $table->float('minimum_sales_qty')->nullable();
            $table->integer('uom_for_minimum_sales_item')->nullable();
            $table->boolean('is_expiry_date')->default(false)->comment = '0=>Not Applicable,1=>Applicable';
            $table->boolean('is_machine_weight_applicable')->default(false)->comment = '0=>Not Applicable,1=>Applicable';
            $table->date('expiry_date')->nullable();
            $table->string('image', 500)->nullable();
            $table->string('remark', 500)->nullable();
            $table->boolean('active_status')->default(true)->comment = '1=>Active,0=>DeActive ';
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();


            /*  $table->foreign('brand_id')
            ->references('id')
            ->on('brands')
            ->onDelete('cascade'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
