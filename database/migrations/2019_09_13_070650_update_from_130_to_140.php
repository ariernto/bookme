<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFrom130To140 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bravo_payouts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('vendor_id')->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->string('status',50)->nullable();
            $table->string("payout_method",50)->nullable();
            $table->text("account_info")->nullable();

            $table->text("note_to_admin")->nullable();
            $table->text("note_to_vendor")->nullable();
            $table->integer('last_process_by')->nullable();
            $table->timestamp("pay_date")->nullable();// admin pay date

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->timestamps();
        });

//        Schema::table('bravo_bookings', function (Blueprint $table) {
//            if (!Schema::hasColumn('bravo_bookings', 'payout_id')) {
//                $table->bigInteger('payout_id')->nullable();
//            }
//        });

        Schema::table('bravo_tours', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_tours', 'include')) {
                $table->text('include')->nullable();
            }
            if (!Schema::hasColumn('bravo_tours', 'exclude')) {
                $table->text('exclude')->nullable();
            }
            if (!Schema::hasColumn('bravo_tours', 'itinerary')) {
                $table->text('itinerary')->nullable();
            }
        });
        Schema::table('bravo_tour_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_tour_translations', 'include')) {
                $table->text('include')->nullable();
            }
            if (!Schema::hasColumn('bravo_tour_translations', 'exclude')) {
                $table->text('exclude')->nullable();
            }
            if (!Schema::hasColumn('bravo_tour_translations', 'itinerary')) {
                $table->text('itinerary')->nullable();
            }
        });

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'business_name')) {
                $table->string('business_name',255)->nullable();
            }
        });
        Schema::table('bravo_space_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_space_translations', 'extra_price')) {
                $table->text('extra_price')->nullable();
            }
        });
        Schema::table('bravo_terms', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_terms', 'icon')) {
                $table->string('icon',50)->nullable();
            }
        });
        Schema::table('bravo_bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_bookings', 'object_child_id')) {
                $table->bigInteger('object_child_id')->nullable();
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
        Schema::dropIfExists('bravo_payouts');
    }
}
