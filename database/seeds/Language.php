<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;
class Language extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('core_settings')->insert([
            [
                'name' => 'site_locale',
                'val' => 'en',
                'group' => "general",
            ],
            [
                'name' => 'site_enable_multi_lang',
                'val' => 1,
                'group' => "general",
            ],
            [
                'name' => 'enable_rtl_egy',
                'val' => 1,
                'group' => "general",
            ]
        ]);
        DB::table('core_languages')->insert([
            [
                'locale' => 'en',
                'name' => 'English',
                'flag' => "gb",
                'status' => "publish",
                'create_user' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'locale' => 'ja',
                'name' => 'Japanese',
                'flag' => "jp",
                'status' => "publish",
                'create_user' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'locale' => 'egy',
                'name' => 'Egyptian',
                'flag' => "eg",
                'status' => "publish",
                'create_user' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

    }
}
