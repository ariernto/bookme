<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Info
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->charset('utf8')->index();
            $table->text('content')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('banner_image_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('map_lat', 20)->nullable();
            $table->string('map_lng', 20)->nullable();
            $table->integer('map_zoom')->nullable();
            $table->tinyInteger('is_featured')->nullable();
            $table->string('gallery', 255)->nullable();
            $table->string('video', 255)->nullable();
            $table->text('policy')->nullable();
            $table->smallInteger('star_rate')->nullable();
            //Price
            $table->decimal('price', 12, 2)->nullable();
            $table->string('check_in_time', 255)->nullable();
            $table->string('check_out_time', 255)->nullable();
            $table->smallInteger('allow_full_day')->nullable();
            $table->decimal('sale_price', 12,2)->nullable();
            //$table->tinyInteger('is_instant')->default(0)->nullable();
            //$table->tinyInteger('allow_children')->default(0)->nullable();
            //$table->tinyInteger('allow_infant')->default(0)->nullable();
            //$table->tinyInteger('max_guests')->default(0)->nullable();
            //$table->tinyInteger('bed')->default(0)->nullable();
            //$table->tinyInteger('bathroom')->default(0)->nullable();
            //$table->tinyInteger('square')->default(0)->nullable();
            //$table->tinyInteger('enable_extra_price')->nullable();
            //$table->text('extra_price')->nullable();
            //$table->text('discount_by_days')->nullable();
            //Extra Info
            $table->string('status', 50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('bravo_hotel_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            $table->string('locale')->index();
            //Info
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
            $table->string('address', 255)->nullable();
            $table->text('policy')->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('bravo_hotel_term', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('term_id')->nullable();
            $table->integer('target_id')->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->timestamps();
        });

        Schema::create('bravo_hotel_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Info
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
            $table->integer('image_id')->nullable();
            $table->string('gallery', 255)->nullable();
            $table->string('video', 255)->nullable();

            //Price
            $table->decimal('price', 12, 2)->nullable();
            $table->bigInteger('parent_id')->nullable();

            $table->smallInteger('number')->nullable();
            $table->tinyInteger('beds')->nullable();
            $table->tinyInteger('size')->nullable();
            $table->tinyInteger('adults')->nullable();
            $table->tinyInteger('children')->nullable();

            //Extra Info
            $table->string('status', 50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_hotel_room_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            $table->string('locale')->index();

            //Info
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();

            //Extra Info
            $table->string('status', 50)->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bravo_hotel_room_term', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('term_id')->nullable();
            $table->integer('target_id')->nullable();
            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->timestamps();
        });

        Schema::create('bravo_hotel_room_dates', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('target_id')->nullable();

            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->decimal('price',12,2)->nullable();
            $table->tinyInteger('max_guests')->nullable();
            $table->tinyInteger('active')->default(0)->nullable();
            $table->text('note_to_customer')->nullable();
            $table->text('note_to_admin')->nullable();
            $table->tinyInteger('is_instant')->default(0)->nullable();
            $table->smallInteger('number')->nullable();

            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->timestamps();

        });
        Schema::create('bravo_hotel_room_bookings', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('room_id')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('booking_id')->nullable();

            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->smallInteger('number')->nullable();
            $table->decimal('price',12,2)->nullable();

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
        Schema::dropIfExists('bravo_hotels');
        Schema::dropIfExists('bravo_hotel_translations');
        Schema::dropIfExists('bravo_hotel_term');

        Schema::dropIfExists('bravo_hotel_rooms');
        Schema::dropIfExists('bravo_hotel_room_translations');
        Schema::dropIfExists('bravo_hotel_room_term');
        Schema::dropIfExists('bravo_hotel_room_dates');
        Schema::dropIfExists('bravo_hotel_room_bookings');

    }
}
