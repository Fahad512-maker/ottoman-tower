<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_pays', function (Blueprint $table) {
            $table->id();
            $table->string('contractor_id')->nullable();
            $table->string('project_id')->nullable();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('expense')->nullable();
            $table->unsignedBigInteger('paid')->nullable();
            $table->unsignedBigInteger('remaining')->nullable();
            $table->string('account_type')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('contractor_pays');
    }
}
