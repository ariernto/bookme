<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFrom151To160 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('paid', 'bravo_bookings')) {
                $table->decimal('paid',10,2)->nullable();
            }
        });

        Schema::table('bravo_hotels', function (Blueprint $table) {
            if (!Schema::hasColumn('enable_extra_price', 'bravo_hotels')) {
                $table->tinyInteger('enable_extra_price')->nullable();
            }
        });
        Schema::table('bravo_hotels', function (Blueprint $table) {
            if (!Schema::hasColumn('extra_price', 'bravo_hotels')) {
                $table->text('extra_price')->nullable();
            }
        });

        Schema::table('bravo_bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('pay_now', 'bravo_bookings')) {
                $table->decimal('pay_now',10,2)->nullable();
            }
        });
	    Schema::table('bravo_hotel_rooms', function (Blueprint $table) {
		    if (!Schema::hasColumn("bravo_hotel_rooms", 'ical_import_url')) {
			    $table->string('ical_import_url')->nullable();
		    }
	    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
