<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_inbox', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('from_user')->nullable();
            $table->bigInteger('to_user')->nullable();
            $table->bigInteger('object_id')->nullable();
            $table->string('object_model',50)->nullable();

            $table->tinyInteger('type')->default(0)->nullable();


            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->timestamps();
        });

        Schema::create('core_inbox_messages', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->bigInteger('inbox_id')->nullable();
            $table->bigInteger('from_user')->nullable();
            $table->bigInteger('to_user')->nullable();
            $table->text('content')->nullable();
//            $table->string('file_path',300)->nullable();
//            $table->string('file_size',255)->nullable();
//            $table->string('file_type',255)->nullable();
//            $table->string('file_extension',255)->nullable();
//            $table->integer('file_width')->nullable();
//            $table->integer('file_height')->nullable();
            $table->tinyInteger('type')->default(0)->nullable();
            $table->tinyInteger('is_read')->default(0)->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->timestamps();

        });
        Schema::create('core_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('from_user')->nullable();
            $table->bigInteger('to_user')->nullable();
            $table->tinyInteger('is_read')->default(0)->nullable();
            $table->string('type',50)->nullable();
            $table->string('type_group',50)->nullable();
            $table->bigInteger('target_id')->nullable();
            $table->bigInteger('target_parent_id')->nullable();
            $table->text('params')->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
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
        Schema::dropIfExists('core_inbox');
        Schema::dropIfExists('core_inbox_messages');
        Schema::dropIfExists('core_notifications');
    }
}
