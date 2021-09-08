<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateexpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_expense', function (Blueprint $table) {
            $table->id();
            $table->Integer('cat_id')->nullable();
            $table->string('name')->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->tinyInteger('isdelete')->default('0');
            $table->Integer('created_by')->nullable();
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
        Schema::dropIfExists('expense');
    }
}
