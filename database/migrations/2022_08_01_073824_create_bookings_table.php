<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('payment')->nullable();
            $table->string('number')->nullable();
            $table->date('date')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('flat_number')->nullable();
            $table->string('size')->nullable();
            $table->string('flat_pref')->nullable();
            $table->string('payment_schedule')->nullable();
            $table->string('applicant')->nullable();
            $table->string('cnic')->nullable();
            $table->string('sowo')->nullable();
            $table->string('office_no')->nullable();
            $table->string('res')->nullable();
            $table->string('mobile')->nullable();
            $table->longText('address')->nullable();
            $table->string('nominee')->nullable();
            $table->string('nominee_sowo')->nullable();
            $table->string('nominee_relation')->nullable();
            $table->string('nominee_cnic')->nullable();
            $table->string('witness_name')->nullable();
            $table->string('wintess_cnic')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
