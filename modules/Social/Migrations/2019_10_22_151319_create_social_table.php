<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('content')->nullable();
            $table->string('status',50)->nullable();
            $table->string('type',50)->nullable();
            $table->bigInteger('forum_id')->nullable();
            $table->bigInteger('group_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('file_id')->nullable();
            $table->text('file_ids')->nullable();

            $table->dateTime('publish_date')->nullable();
            $table->bigInteger('comment_disabled_by')->nullable();
            $table->string('privary',30)->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('social_post_comments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('post_id')->nullable();
            $table->text('content')->nullable();
            $table->string('status',50)->nullable();
            $table->string('type',50)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('file_id')->nullable();
            $table->text('file_ids')->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();

            $table->timestamps();
        });
        Schema::create('social_groups', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name',255)->nullable();
            $table->text('content')->nullable();
            $table->string('slug',255)->nullable();
            $table->string('status',50)->nullable();
            $table->string('icon',50)->nullable();
            $table->bigInteger('icon_image')->nullable();
            $table->bigInteger('banner_image')->nullable();

            $table->string('type',50)->nullable();

            $table->bigInteger('owner_id')->nullable();
            $table->bigInteger('category_id')->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });

        Schema::create('social_group_user', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('group_id')->nullable();
            $table->string('role',50)->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();

            $table->timestamps();
        });
        Schema::create('social_user_follow', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('from_user')->nullable();
            $table->bigInteger('to_user')->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();

            $table->timestamps();
        });

        Schema::create('social_forums', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name',255)->nullable();
            $table->text('content')->nullable();
            $table->string('slug',255)->nullable();
            $table->string('status',50)->nullable();
            $table->string('icon',50)->nullable();
            $table->bigInteger('icon_image')->nullable();

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
        Schema::dropIfExists('social_posts');
        Schema::dropIfExists('social_user_follow');
        Schema::dropIfExists('social_forums');
        Schema::dropIfExists('social_group_user');
        Schema::dropIfExists('social_groups');
        Schema::dropIfExists('social_post_comments');
        Schema::dropIfExists('social_post_comments');
    }
}
