<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoreVendorPlanMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_vendor_plan_meta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vendor_plan_id');
            $table->string('post_type',255)->nullable();
            $table->tinyInteger('enable')->nullable();
            $table->integer('maximum_create')->nullable();
            $table->tinyInteger('auto_publish')->nullable();
            $table->integer('commission')->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
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
        Schema::drop('core_vendor_plan_meta');
    }
}
