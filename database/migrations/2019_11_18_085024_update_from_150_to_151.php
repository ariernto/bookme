<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateFrom150To151 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_tours', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_tours', 'review_score')) {
                $table->decimal('review_score',2,1)->nullable();
            }
            if (!Schema::hasColumn("bravo_tours", 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
        });
        Schema::table('bravo_spaces', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_spaces', 'review_score')) {
                $table->decimal('review_score',2,1)->nullable();
            }
            if (!Schema::hasColumn("bravo_spaces", 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
            DB::statement('ALTER TABLE bravo_spaces MODIFY bed integer');
            DB::statement('ALTER TABLE bravo_spaces MODIFY bathroom integer');
            DB::statement('ALTER TABLE bravo_spaces MODIFY square integer');
        });
        Schema::table('bravo_hotels', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_hotels', 'review_score')) {
                $table->decimal('review_score',2,1)->nullable();
            }
            if (!Schema::hasColumn("bravo_hotels", 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
        });
        Schema::table('bravo_hotel_rooms', function (Blueprint $table) {
            DB::statement('ALTER TABLE bravo_hotel_rooms MODIFY size integer');
        });
        Schema::table('bravo_cars', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_cars', 'review_score')) {
                $table->decimal('review_score',2,1)->nullable();
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
