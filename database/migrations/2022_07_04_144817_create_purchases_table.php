<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name')->nullable();
            $table->string('product_name')->nullable();
            $table->unsignedBigInteger('qty')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->integer('paid')->nullable();
            $table->integer('remaining')->nullable();
            $table->date('date')->nullable();
            $table->integer('account_type')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
