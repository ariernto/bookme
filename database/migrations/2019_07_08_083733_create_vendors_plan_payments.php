<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsPlanPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors_plan_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vendor_id');
            $table->integer('amount');
            $table->string('payment_gateway')->nullable();
            $table->integer('free_trial');
            $table->enum('price_per',['onetime','per_time'])->default('onetime');
            $table->enum('price_unit',['day','month','year'])->default('day');
            $table->string('status',20)->nullable();
            $table->dateTime('end_date')->nullable();
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
        Schema::dropIfExists('vendors_plan_payments');
    }
}
