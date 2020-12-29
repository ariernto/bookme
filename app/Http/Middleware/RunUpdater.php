<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Booking\Models\Booking;
use Modules\Car\Models\Car;
use Modules\Car\Models\CarTranslation;
use Modules\Core\Models\Settings;
use Modules\Hotel\Models\Hotel;
use Modules\Hotel\Models\HotelRoom;
use Modules\Review\Models\Review;
use Modules\Space\Models\Space;
use Modules\Space\Models\SpaceTranslation;
use Modules\Tour\Models\Tour;
use Modules\User\Emails\CreditPaymentEmail;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Bavix\Wallet\Models\Transaction;
use Bavix\Wallet\Models\Transfer;
use Bavix\Wallet\Models\Wallet;




class RunUpdater
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (strpos($request->path(), 'install') === false && file_exists(storage_path() . '/installed') and !app()->runningInConsole()) {

			$this->updateTo110();
			$this->updateTo120();
			$this->updateTo130();
			$this->updateTo140();
			$this->updateTo150();
			$this->updateTo151();
			$this->updateTo160();
			$this->updateTo170();
			$this->updateTo180();

        }
        return $next($request);
    }

    public function updateTo110(){
        if(setting_item('update_to_110')){
            return false;
        }
        Artisan::call('migrate', [
            '--force' => true,
        ]);
        Permission::findOrCreate('dashboard_vendor_access');
        $vendor = Role::findOrCreate('vendor');
        $vendor->givePermissionTo('media_upload');
        // $vendor->givePermissionTo('tour_view');
        // $vendor->givePermissionTo('tour_create');
        // $vendor->givePermissionTo('tour_update');
        // $vendor->givePermissionTo('tour_delete');
        $vendor->givePermissionTo('dashboard_vendor_access');
        $role = Role::findOrCreate('administrator');
        $role->givePermissionTo('dashboard_vendor_access');
        Settings::store('update_to_110',true);
        Artisan::call('cache:clear');
    }
    public function updateTo120(){
        if(setting_item('update_to_120')){
            return false;
        }
        Artisan::call('migrate', [
            '--force' => true,
        ]);
        Permission::findOrCreate('space_view');
        Permission::findOrCreate('space_create');
        Permission::findOrCreate('space_update');
        Permission::findOrCreate('space_delete');
        Permission::findOrCreate('space_manage_others');
        Permission::findOrCreate('space_manage_attributes');
        // Vendor
        $vendor = Role::findOrCreate('vendor');
        // $vendor->givePermissionTo('space_create');
        // $vendor->givePermissionTo('space_view');
        // $vendor->givePermissionTo('space_update');
        // $vendor->givePermissionTo('space_delete');
        // Admin
        $role = Role::findOrCreate('administrator');
        $role->givePermissionTo('space_view');
        $role->givePermissionTo('space_create');
        $role->givePermissionTo('space_update');
        $role->givePermissionTo('space_delete');
        $role->givePermissionTo('space_manage_others');
        $role->givePermissionTo('space_manage_attributes');

        if(empty(setting_item('topbar_left_text'))){
            DB::table('core_settings')->insert(
                [
                    'name'  => 'topbar_left_text',
                    'val'   => '<div class="socials">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-google-plus"></i></a>
</div>
<span class="line"></span>
<a href="mailto:contact@bookingcore.com">contact@bookingcore.com</a>',
                    'group' => "general",
                ]
            );
        }
        Settings::store('update_to_120',true);
        Artisan::call('cache:clear');
    }
    public function updateTo130(){
        if(setting_item('update_to_130')){
            return false;
        }
        Artisan::call('migrate', [
            '--force' => true,
        ]);
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'vendor_commission_amount')) {
                $table->integer('vendor_commission_amount')->nullable();
                $table->decimal('total_before_fees',10,2)->nullable();
            }
            if (!Schema::hasColumn('users', 'vendor_commission_type')) {
                $table->string('vendor_commission_type',30)->nullable();
            }
        });
        $this->__updateReviewVendorId();
        // Fix null status user
        User::query()->whereRaw('status is NULL')->update([
            'status'=>'publish'
        ]);
        Settings::store('update_to_130',true);
        Artisan::call('cache:clear');
    }
    public function updateTo140(){

        if(setting_item('update_to_140')){
            return false;
        }
        Artisan::call('migrate', [
            '--force' => true,
        ]);
        Permission::findOrCreate('vendor_payout_view');
        Permission::findOrCreate('vendor_payout_manage');

        Permission::findOrCreate('hotel_view');
        Permission::findOrCreate('hotel_create');
        Permission::findOrCreate('hotel_update');
        Permission::findOrCreate('hotel_delete');
        Permission::findOrCreate('hotel_manage_others');
        Permission::findOrCreate('hotel_manage_attributes');

        // Admin
        $role = Role::findOrCreate('administrator');
        $role->givePermissionTo('vendor_payout_view');
        $role->givePermissionTo('vendor_payout_manage');
        $role->givePermissionTo('hotel_view');
        $role->givePermissionTo('hotel_create');
        $role->givePermissionTo('hotel_update');
        $role->givePermissionTo('hotel_delete');
        $role->givePermissionTo('hotel_manage_others');
        $role->givePermissionTo('hotel_manage_attributes');

        $vendor = Role::findOrCreate('vendor');
        // $vendor->givePermissionTo('hotel_view');
        // $vendor->givePermissionTo('hotel_create');
        // $vendor->givePermissionTo('hotel_update');
        // $vendor->givePermissionTo('hotel_delete');

        Settings::store('update_to_140',true);
        Artisan::call('cache:clear');
    }
    public function updateTo150(){
        if(setting_item('update_to_150')){
            return false;
        }
        Artisan::call('migrate', [
            '--force' => true,
        ]);
        Permission::findOrCreate('plugin_manage');
        $role = Role::findOrCreate('administrator');
        $role->givePermissionTo('plugin_manage');

        // Car
        Permission::findOrCreate('car_view');
        Permission::findOrCreate('car_create');
        Permission::findOrCreate('car_update');
        Permission::findOrCreate('car_delete');
        Permission::findOrCreate('car_manage_others');
        Permission::findOrCreate('car_manage_attributes');
        // Vendor
        $vendor = Role::findOrCreate('vendor');
        // $vendor->givePermissionTo('car_create');
        // $vendor->givePermissionTo('car_view');
        // $vendor->givePermissionTo('car_update');
        // $vendor->givePermissionTo('car_delete');
        // Admin
        $role = Role::findOrCreate('administrator');
        $role->givePermissionTo('car_view');
        $role->givePermissionTo('car_create');
        $role->givePermissionTo('car_update');
        $role->givePermissionTo('car_delete');
        $role->givePermissionTo('car_manage_others');
        $role->givePermissionTo('car_manage_attributes');

        Settings::store('update_to_150',true);
        Artisan::call('cache:clear');
    }
    public function updateTo151(){
        if(setting_item('update_to_151')){
            return false;
        }
        Artisan::call('migrate', [
            '--force' => true,
        ]);
        $allServices = get_bookable_services();
        foreach ($allServices as $service){
            $alls = $service::query()->whereNull('review_score')->get();
            if(!empty($alls)){
                foreach ($alls as $item){
                    $item->update_service_rate();
                }
            }
        }

        Schema::table(Tour::getTableName(), function (Blueprint $table) {
            if (!Schema::hasColumn(Tour::getTableName(), 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
        });
        Schema::table(Space::getTableName(), function (Blueprint $table) {
            if (!Schema::hasColumn(Space::getTableName(), 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
        });
        Schema::table(Hotel::getTableName(), function (Blueprint $table) {
            if (!Schema::hasColumn(Hotel::getTableName(), 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
        });
        Schema::table(Car::getTableName(), function (Blueprint $table) {
            if (!Schema::hasColumn(Car::getTableName(), 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
        });

        Schema::table(CarTranslation::getTableName(), function (Blueprint $table) {
            if (Schema::hasColumn(CarTranslation::getTableName(), 'extra_price')) {
                $table->dropColumn('extra_price');
            }
        });
        Schema::table(SpaceTranslation::getTableName(), function (Blueprint $table) {
            if (Schema::hasColumn(SpaceTranslation::getTableName(), 'extra_price')) {
                $table->dropColumn('extra_price');
            }
        });


        DB::statement('ALTER TABLE bravo_spaces MODIFY bed integer');
        DB::statement('ALTER TABLE bravo_spaces MODIFY bathroom integer');
        DB::statement('ALTER TABLE bravo_spaces MODIFY square integer');
        DB::statement('ALTER TABLE bravo_hotel_rooms MODIFY size integer');

        Settings::store('update_to_151',true);
        Artisan::call('cache:clear');
    }
    public function updateTo160()
    {
        if (setting_item('update_to_160')) {
            return false;
        }
        Artisan::call('migrate', [
            '--force' => true,
        ]);
        $bookings = Booking::query()->whereIn('status',[
            'paid',
            'completed',
            'completed',
        ])->whereRaw('IFNULL(deposit,0) <= 0 ')->get();
        foreach ($bookings as $booking)
        {
            if(!$booking->deposit){
                $booking->paid = $booking->total;
                $booking->save();
            }
        }
        Schema::table(HotelRoom::getTableName(), function (Blueprint $table) {
            if (!Schema::hasColumn(HotelRoom::getTableName(), 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
        });

        Settings::store('update_to_160',true);
        Artisan::call('cache:clear');
    }
    public function updateTo170()
    {
        if (setting_item('update_to_170')) {
            return false;
        }
        Artisan::call('migrate', [
            '--force' => true,
        ]);
        if(empty(setting_item('tour_map_search_fields'))){
            DB::table('core_settings')->insert(
                [
                    'name'=>'tour_map_search_fields',
                    'val'=>'[{"field":"location","attr":null,"position":"1"},{"field":"category","attr":null,"position":"2"},{"field":"date","attr":null,"position":"3"},{"field":"price","attr":null,"position":"4"},{"field":"advance","attr":null,"position":"5"}]',
                    'group'=>'tour'
                ]
            );
        }
        if(empty(setting_item('tour_search_fields'))){
            DB::table('core_settings')->insert(
                [
                    'name'=>'tour_search_fields',
                    'val'=>'[{"title":"Location","field":"location","size":"6","position":"1"},{"title":"From - To","field":"date","size":"6","position":"2"}]',
                    'group'=>'tour'
                ]
            );
        }
        if(empty(setting_item('space_search_fields'))){
            DB::table('core_settings')->insert(
                [
                    'name'=>'space_search_fields',
                    'val'=>'[{"title":"Location","field":"location","size":"4","position":"1"},{"title":"From - To","field":"date","size":"4","position":"2"},{"title":"Guests","field":"guests","size":"4","position":"3"}]',
                    'group'=>'tour'
                ]
            );
        }
        if(empty(setting_item('hotel_search_fields'))){
            DB::table('core_settings')->insert(
                [
                    'name'=>'hotel_search_fields',
                    'val'=>'[{"title":"Location","field":"location","size":"4","position":"1"},{"title":"Check In - Out","field":"date","size":"4","position":"2"},{"title":"Guests","field":"guests","size":"4","position":"3"}]',
                    'group'=>'hotel'
                ]
            );
        }
        if(empty(setting_item('car_search_fields'))){
            DB::table('core_settings')->insert(
                [
                    'name'=>'car_search_fields',
                    'val'=>'[{"title":"Location","field":"location","size":"6","position":"1"},{"title":"From - To","field":"date","size":"6","position":"2"}]',
                    'group'=>'car'
                ]
            );
        }

        if(empty(setting_item('enable_mail_vendor_registered'))){
            DB::table('core_settings')->insert(
                [
                    'name'=>'enable_mail_vendor_registered',
                    'val'=>'1',
                    'group'=>'vendor'
                ]
            );
            DB::table('core_settings')->insert(
                [
                    'name'=>'vendor_content_email_registered',
                    'val'=>'<h1 style="text-align: center;">Welcome!</h1>
                            <h3>Hello [first_name] [last_name]</h3>
                            <p>Thank you for signing up with Booking Core! We hope you enjoy your time with us.</p>
                            <p>Regards,</p>
                            <p>Booking Core</p>',
                    'group'=>'vendor'
                ]
            );
        }
        if(empty(setting_item('admin_enable_mail_vendor_registered'))){
            DB::table('core_settings')->insert(
                [
                    'name'=>'admin_enable_mail_vendor_registered',
                    'val'=>'1',
                    'group'=>'vendor'
                ]
            );
            DB::table('core_settings')->insert(
                [
                    'name'=>'admin_content_email_vendor_registered',
                    'val'=>'<h3>Hello Administrator</h3>
                            <p>An user has been registered as Vendor. Please check the information bellow:</p>
                            <p>Full name: [first_name] [last_name]</p>
                            <p>Email: [email]</p>
                            <p>Registration date: [created_at]</p>
                            <p>You can approved the request here: [link_approved]</p>
                            <p>Regards,</p>
                            <p>Booking Core</p>',
                    'group'=>'vendor'
                ]
            );
        }
        if(empty(setting_item('booking_enquiry_enable_mail_to_vendor_content'))){
            DB::table('core_settings')->insert([
                [
                    'name'  => "booking_enquiry_enable_mail_to_vendor_content",
                    'val'   => "<h3>Hello [vendor_name]</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Regards,</p>
                            <p>Booking Core</p>
                            </div>",
                    'group' => "enquiry",
                ]
            ]);
        }
        if(empty(setting_item('booking_enquiry_enable_mail_to_admin_content'))){
            DB::table('core_settings')->insert([
                [
                    'name'  => "booking_enquiry_enable_mail_to_admin_content",
                    'val'   => "<h3>Hello Administrator</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Vendor:[vendor_link]</p>
                            <p>Regards,</p>
                            <p>Booking Core</p>",
                    'group' => "enquiry",
                ],
            ]);
        }

        Schema::table('bravo_spaces',function(Blueprint $table){
            if(Schema::hasColumn('bravo_spaces','square')){
                DB::statement('ALTER TABLE bravo_spaces MODIFY square integer');
            }
            if(Schema::hasColumn('bravo_spaces','max_guests')){
                DB::statement('ALTER TABLE bravo_spaces MODIFY max_guests integer');
            }
        });

        Permission::findOrCreate('event_view');
        Permission::findOrCreate('event_create');
        Permission::findOrCreate('event_update');
        Permission::findOrCreate('event_delete');
        Permission::findOrCreate('event_manage_others');
        Permission::findOrCreate('event_manage_attributes');
        Permission::findOrCreate('enquiry_view');
        Permission::findOrCreate('enquiry_update');
        Permission::findOrCreate('enquiry_manage_others');

        // Admin
        $role = Role::findOrCreate('administrator');
        $role->givePermissionTo('enquiry_view');
        $role->givePermissionTo('enquiry_update');
        $role->givePermissionTo('enquiry_manage_others');
        $role->givePermissionTo('event_view');
        $role->givePermissionTo('event_create');
        $role->givePermissionTo('event_update');
        $role->givePermissionTo('event_delete');
        $role->givePermissionTo('event_manage_others');
        $role->givePermissionTo('event_manage_attributes');

        // Vendor
        $role = Role::findOrCreate('vendor');
        $role->givePermissionTo('enquiry_view');
        $role->givePermissionTo('enquiry_update');
        // $role->givePermissionTo('event_view');
        // $role->givePermissionTo('event_create');
        // $role->givePermissionTo('event_update');
        // $role->givePermissionTo('event_delete');

        Settings::store('update_to_170',true);
        Artisan::call('cache:clear');
    }
    public function checkDbEngine(){
        if(!setting_item('check_db_engine')){
            $tables = [
                (new Transaction())->getTable().'_1',
                (new Transfer())->getTable().'_1',
                (new Wallet())->getTable().'_1',
            ];
            foreach ($tables as $table){
                $engine = DB::select(DB::raw("select ENGINE,TABLE_NAME from information_schema.TABLES where TABLE_SCHEMA	= '".env('DB_DATABASE')."' and TABLE_NAME = '".$table."'"));
                if(!empty($engine)){
                    foreach ($engine as $value){
                        if(!empty($value->ENGINE) and $value->ENGINE!='InnoDB'){
                            DB::statement('ALTER TABLE '.$value->TABLE_NAME.' ENGINE = InnoDB');
                        }
                    }
                }
            }
            Settings::store('check_db_engine',true);
        }
    }
    public function updateTo180()
    {
        $this->checkDbEngine();
        if (setting_item('update_to_182')) {
            return "Updated Up 1.8.2";
        }

        Artisan::call('migrate', [
            '--force' => true,
        ]);
        Schema::table('social_posts',function(Blueprint $table){
            if(!Schema::hasColumn('social_posts','privacy')){
                $table->string('privacy',30)->nullable();
            }
        });
        setting_update_item('wallet_credit_exchange_rate',1);
        setting_update_item('wallet_deposit_rate',1);
        setting_update_item('wallet_deposit_type','list');
        setting_update_item('wallet_deposit_lists',[
           ['name'=>__("100$"),'amount'=>100,'credit'=>100],
           ['name'=>__("Bonus 10%"),'amount'=>500,'credit'=>550],
           ['name'=>__("Bonus 15%"),'amount'=>1000,'credit'=>1150],
        ]);

        setting_update_item('wallet_new_deposit_admin_subject','New credit purchase');
        setting_update_item('wallet_new_deposit_admin_content',CreditPaymentEmail::defaultNewBody());
        setting_update_item('wallet_new_deposit_customer_subject','Thank you for your purchasing');
        setting_update_item('wallet_new_deposit_customer_content',CreditPaymentEmail::defaultNewBody());

        setting_update_item('wallet_update_deposit_admin_subject','Credit purchase updated');
        setting_update_item('wallet_update_deposit_admin_content',CreditPaymentEmail::defaultUpdateBody());
        setting_update_item('wallet_update_deposit_customer_subject','Your credit purchase updated');
        setting_update_item('wallet_update_deposit_customer_content',CreditPaymentEmail::defaultUpdateBody());

        Schema::table('bravo_bookings',function(Blueprint $table){
            if(!Schema::hasColumn('bravo_bookings','wallet_credit_used')){
                $table->double('wallet_credit_used')->nullable();// Credit used
                $table->double('wallet_total_used')->nullable();// Credit in total (after exchange credit to money)
            }
            if(!Schema::hasColumn('bravo_bookings','wallet_transaction_id')){
                $table->bigInteger('wallet_transaction_id')->nullable();// Credit used
            }
            if(!Schema::hasColumn('bravo_bookings','is_refund_wallet')){
                $table->tinyInteger('is_refund_wallet')->nullable();// Credit used
            }
        });

        Schema::table('bravo_booking_payments',function(Blueprint $table){
            if(!Schema::hasColumn('bravo_booking_payments','code')){
                $table->string('code',64)->nullable();
                $table->bigInteger('object_id')->nullable();
                $table->string('object_model',40)->nullable();
                $table->text('meta')->nullable();
            }
            if(!Schema::hasColumn('bravo_booking_payments','deleted_at')){
                $table->softDeletes();
            }
            if(!Schema::hasColumn('bravo_booking_payments','wallet_transaction_id')){
                $table->bigInteger('wallet_transaction_id')->nullable();
            }
        });
        Schema::table('user_transactions',function(Blueprint $table){
            if(!Schema::hasColumn('user_transactions','payment_id')){
                $table->bigInteger('payment_id')->nullable();
            }
            if(!Schema::hasColumn('user_transactions','booking_id')){
                $table->bigInteger('booking_id')->nullable();
            }

        });

        Schema::table('bravo_spaces',function(Blueprint $table){
            if(!Schema::hasColumn('bravo_spaces','min_day_before_booking')){
                $table->integer('min_day_before_booking')->nullable();
            }
            if(!Schema::hasColumn('bravo_spaces','min_day_stays')){
                $table->integer('min_day_stays')->nullable();
            }
        });

        Schema::table('bravo_hotels',function(Blueprint $table){
            if(!Schema::hasColumn('bravo_hotels','min_day_before_booking')){
                $table->integer('min_day_before_booking')->nullable();
            }
            if(!Schema::hasColumn('bravo_hotels','min_day_stays')){
                $table->integer('min_day_stays')->nullable();
            }
        });


        Settings::store('update_to_181',true);

        Schema::table( (new Transaction())->getTable(),function(Blueprint $table){
            $table->engine = 'InnoDB';
            if(!Schema::hasColumn((new Transaction())->getTable(),'create_user')){
                $table->integer('create_user')->nullable();
            }
            if(!Schema::hasColumn((new Transaction())->getTable(),'update_user')){
                $table->integer('update_user')->nullable();
            }

        });

        Schema::table( (new Transfer())->getTable(),function(Blueprint $table){
            $table->engine = 'InnoDB';
            if(!Schema::hasColumn((new Transfer())->getTable(),'create_user')){
                $table->integer('create_user')->nullable();
            }
            if(!Schema::hasColumn((new Transfer())->getTable(),'update_user')){
                $table->integer('update_user')->nullable();
            }
        });

        Schema::table( (new Wallet())->getTable(),function(Blueprint $table){
            $table->engine = 'InnoDB';
            if(!Schema::hasColumn((new Wallet())->getTable(),'create_user')){
                $table->integer('create_user')->nullable();
            }
            if(!Schema::hasColumn((new Wallet())->getTable(),'update_user')){
                $table->integer('update_user')->nullable();
            }
        });


        Settings::store('update_to_182',true);

    }

    protected function __updateReviewVendorId(){
        $all = Review::query()->whereNull('vendor_id')->get();
        if(!empty($all))
        {
            foreach ($all as $item){
                switch ($item->object_model)
                {
                    case "tour":
                        $tour = Tour::find($item->object_id);
                        if($tour){
                            $item->vendor_id = $tour->create_user;
                            $item->save();
                        }
                        break;
                    case "space":
                        $tour = Space::find($item->object_id);
                        if($tour){
                            $item->vendor_id = $tour->create_user;
                            $item->save();
                        }
                        break;
                }
            }
        }
    }
}
