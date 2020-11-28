<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFrom140To150 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_attrs', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_attrs', 'display_type')) {
                $table->string('display_type',255)->nullable();
            }
            if (!Schema::hasColumn('bravo_attrs', 'hide_in_single')) {
                $table->tinyInteger('hide_in_single')->nullable();
            }
        });
        Schema::table('bravo_bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_bookings', 'number')) {
                $table->smallInteger('number')->nullable();
            }
        });
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'verify_submit_status')) {
                $table->string('verify_submit_status',30)->nullable();
            }
            if (!Schema::hasColumn('users', 'is_verified')) {
                $table->smallInteger('is_verified')->nullable();
            }
        });

        Schema::create('bravo_cars', function (Blueprint $table) {
            $table->bigIncrements('id');

            //Info
            $table->string('title', 255)->nullable();
            $table->string('slug',255)->charset('utf8')->index();
            $table->text('content')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('banner_image_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('map_lat',20)->nullable();
            $table->string('map_lng',20)->nullable();
            $table->integer('map_zoom')->nullable();
            $table->tinyInteger('is_featured')->nullable();
            $table->string('gallery', 255)->nullable();
            $table->string('video', 255)->nullable();
            $table->text('faqs')->nullable();

            //Price
            $table->tinyInteger('number')->nullable();
            $table->decimal('price', 12,2)->nullable();
            $table->decimal('sale_price', 12,2)->nullable();
            $table->tinyInteger('is_instant')->default(0)->nullable();

            $table->tinyInteger('enable_extra_price')->nullable();
            $table->text('extra_price')->nullable();
            $table->text('discount_by_days')->nullable();

            //Extra Info
            $table->tinyInteger('passenger')->default(0)->nullable();
            $table->string('gear')->default(0)->nullable();
            $table->tinyInteger('baggage')->default(0)->nullable();
            $table->tinyInteger('door')->default(0)->nullable();

            $table->string('status',50)->nullable();
            $table->tinyInteger('default_state')->default(1)->nullable();

            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });

        Schema::create('bravo_car_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            $table->string('locale')->index();

            //Info
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
            $table->text('faqs')->nullable();
            $table->string('address', 255)->nullable();

            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });

        Schema::create('bravo_car_term', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('term_id')->nullable();
            $table->integer('target_id')->nullable();

            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->timestamps();

        });

        Schema::create('bravo_car_dates', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('target_id')->nullable();

            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->decimal('price',12,2)->nullable();
            $table->tinyInteger('number')->nullable();
            $table->tinyInteger('active')->default(0)->nullable();
            $table->text('note_to_customer')->nullable();
            $table->text('note_to_admin')->nullable();
            $table->tinyInteger('is_instant')->default(0)->nullable();

            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
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

        Schema::dropIfExists('bravo_cars');
        Schema::dropIfExists('bravo_car_translations');
        Schema::dropIfExists('bravo_car_term');
        Schema::dropIfExists('bravo_car_dates');
    }
}
