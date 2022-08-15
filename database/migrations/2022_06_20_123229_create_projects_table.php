<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            
            $table->id();
            $table->string('projectname')->nullable();
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
            $table->longText('productcode')->nullable();
            $table->longText('productname')->nullable();
            $table->longText('qty')->nullable();
            $table->bigInteger('cost')->nullable();
            $table->bigInteger('remaining_cost')->nullable();
            $table->longText('address')->nullable();
            $table->longText('progress')->nullable();
            $table->longText('picture')->nullable();
            
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
        Schema::dropIfExists('projects');
    }
}
