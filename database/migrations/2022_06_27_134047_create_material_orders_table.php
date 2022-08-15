<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_orders', function (Blueprint $table) {
            $table->id();
            $table->string('material_id')->nullable();
            $table->integer('qty')->nullable();
            $table->string('project_id')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->unsignedBigInteger('total')->nullable();
            $table->unsignedBigInteger('supplier_total')->nullable();
            $table->string('supplier_id')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('material_orders');
    }
}
