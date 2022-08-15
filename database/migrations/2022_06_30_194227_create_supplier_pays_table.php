<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_pays', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_id');
            $table->string('project_id');
            $table->bigInteger('supplier_expanse');
            $table->bigInteger('supplier_paid');
            $table->bigInteger('supplier_remaining');
            $table->string('date');
            $table->string('account_type');
            $table->string('description');
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
        Schema::dropIfExists('supplier_pays');
    }
}
