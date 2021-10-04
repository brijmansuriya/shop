<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('hsn_code')->nullable();
            $table->decimal('gst_price',10,3)->nullable();
            $table->decimal('purchase_price',10,3)->nullable();
            $table->decimal('selling_price',10,3)->nullable();
            $table->decimal('dead_stock',10,2)->nullable();
            $table->decimal('opening_stock',10,2)->nullable();            
            $table->Integer('units')->nullable();
            $table->tinyInteger('is_delete')->default('0');
            $table->Integer('created_by')->nullable();
            $table->Integer('updated_by')->nullable();
            $table->timestamp('created_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
}
