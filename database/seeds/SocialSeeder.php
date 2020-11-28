<?php

use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forums = [
            ['name'=>'Solo Travel','icon'=>'fa fa-cloud'],
            ['name'=>'Road Trips','icon'=>'fa fa-bear'],
            ['name'=>'Travel Gadgets and Gear','icon'=>'fa fa-gear'],
            ['name'=>'Family Travel','icon'=>'fa fa-map-o'],
            ['name'=>'Honeymoons and Romance','icon'=>'fa fa-heartbeat'],
            ['name'=>'Outdoors','icon'=>'fa fa-paper-plane-o'],
            ['name'=>'Traveling with Pets','icon'=>'fa fa-paw'],
        ];
        foreach ($forums as $forum){
            $a = new \Modules\Social\Models\Forum($forum);
            $a->status = 'publish';
            $a->save();
        }
    }
}
