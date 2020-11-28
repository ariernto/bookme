<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserUpgradeRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_upgrade_request', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('role_request')->nullable();
            $table->dateTime('approved_time')->nullable();
            $table->string('status',50)->nullable();
            $table->integer('approved_by')->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('user_upgrade_request');

    }
}
