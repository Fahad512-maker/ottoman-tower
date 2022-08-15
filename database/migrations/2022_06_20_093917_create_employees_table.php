<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('fname')->nullable();
            $table->string('designation')->nullable();
            $table->string('cnic')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('salary')->nullable();
            $table->bigInteger('advance')->nullable();
            $table->bigInteger('remaining')->nullable();
            $table->string('account_type')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
