<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_inventory', function (Blueprint $table) {
            $table->id();
            $table->Integer('productid')->nullable();
            $table->Integer('masterid')->nullable();
            $table->Integer('subid')->nullable();
            $table->Integer('stype')->nullable();
            $table->Integer('qty')->nullable();
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
        Schema::dropIfExists('tbl_inventory');
    }
}
