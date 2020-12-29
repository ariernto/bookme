<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Cache::flush();
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(Language::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MediaFileSeeder::class);
        $this->call(General::class);
        $this->call(LocationSeeder::class);
        $this->call(News::class);
        $this->call(Tour::class);
        $this->call(SpaceSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(SocialSeeder::class);

        // custom
        $this->call(ExtraRolesAndPermissionsSeeder::class);        
    }
}
