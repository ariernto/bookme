<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;

use Modules\Review\Models\Review;
use Modules\Review\Models\ReviewMeta;

class SpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_gallery = [];
        for($i=1 ; $i <=7 ; $i++){
            $list_gallery[] = MediaFile::findMediaByName("space-gallery-".$i)->id;
        }

        $IDs_vendor[] = $create_user =   '1';
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'LUXURY STUDIO',
                'slug' => Str::slug('LUXURY STUDIO', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-1")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-'.rand(1,3))->id,
                'location_id' => 2,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "300",
                'sale_price' => rand(100, 800),
                'map_lat' => "51.528564",
                'map_lng' => "-0.203010",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        $IDs_vendor[] = $create_user =  '1';
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'LUXURY APARTMENT',
                'slug' => Str::slug('LUXURY APARTMENT', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-2")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-'.rand(1,3))->id,
                'location_id' => 3,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "900",
                'sale_price' => '',
                'map_lat' => "51.519592",
                'map_lng' => "-0.226346",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'BEAUTIFUL LOFT',
                'slug' => Str::slug('BEAUTIFUL LOFT', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-3")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-'.rand(1,3))->id,
                'location_id' => 3,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "650",
                'sale_price' => '',
                'map_lat' => "51.461875",
                'map_lng' => "-0.211246",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'BEST OF WEST VILLAGE',
                'slug' => Str::slug('BEST OF WEST VILLAGE', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-4")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-'.rand(1,3))->id,
                'location_id' => 4,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "800",
                'sale_price' => '',
                'map_lat' => "51.427638",
                'map_lng' => "-0.170752",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'DUPLEX GREENWICH',
                'slug' => Str::slug('DUPLEX GREENWICH', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-5")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-'.rand(1,3))->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "220",
                'sale_price' => '',
                'map_lat' => "51.442192",
                'map_lng' => "-0.043778",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'THE MEATPACKING SUITES',
                'slug' => Str::slug('THE MEATPACKING SUITES', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-6")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-'.rand(1,3))->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "320",
                'sale_price' => '',
                'map_lat' => "51.475135",
                'map_lng' => "0.003592",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'EAST VILLAGE',
                'slug' => Str::slug('EAST VILLAGE', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-7")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-'.rand(1,3))->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "300",
                'sale_price' => '260',
                'map_lat' => "51.524292",
                'map_lng' => "-0.022489",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'PARIS GREENWICH VILLA',
                'slug' => Str::slug('PARIS GREENWICH VILLA', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-8")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-'.rand(1,3))->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "500",
                'sale_price' => '',
                'map_lat' => "51.556749",
                'map_lng' => "-0.091124",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'LUXURY SINGLE',
                'slug' => Str::slug('LUXURY SINGLE', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-9")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-'.rand(1,3))->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "400",
                'sale_price' => '350',
                'map_lat' => "51.569555",
                'map_lng' => "0.012563",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        $IDs_vendor[] = $create_user =  "1";
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'LILY DALE VILLAGE',
                'slug' => Str::slug('LILY DALE VILLAGE', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-10")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-'.rand(1,3))->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "250",
                'sale_price' => '',
                'map_lat' => "51.517883",
                'map_lng' => "-0.134314",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        $IDs_vendor[] = $create_user =  rand(4,6);
        $IDs[] = DB::table('bravo_spaces')->insertGetId(
            [
                'title' => 'STAY GREENWICH VILLAGE',
                'slug' => Str::slug('STAY GREENWICH VILLAGE', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("space-11")->id,
                'banner_image_id' => MediaFile::findMediaByName('space-single-2')->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "300",
                'sale_price' => '150',
                'map_lat' => "51.514892",
                'map_lng' => "-0.176181",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'bed' =>  rand(3,10),
                'bathroom' =>  rand(1,10),
                'square' =>  rand(100,200),
                'max_guests' =>  rand(5,10),
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
            ]);

        // Add meta
        foreach ($IDs as $numer_key => $space){
            $vendor_id = $IDs_vendor[$numer_key];
            for ($i = 1 ; $i <= 5 ; $i++){
                if( rand(1,5) == $i) continue;
                if( rand(1,5) == $i) continue;
                $metaReview = [];
                $list_meta = [
                    "Sleep",
                    "Location",
                    "Service",
                    "Clearness",
                    "Rooms",
                ];
                $total_point = 0;
                foreach ($list_meta as $key => $value) {
                    $point = rand(4,5);
                    $total_point += $point;
                    $metaReview[] = [
                        "object_id"    => $space,
                        "object_model" => "space",
                        "name"         => $value,
                        "val"          => $point,
                        "create_user"  => "1",
                    ];
                }
                $rate = round($total_point / count($list_meta), 1);
                if ($rate > 5) $rate = 5;
                $titles = ["Great Trip","Good Trip","Trip was great","Easy way to discover the city"];
                $review = new Review([
                    "object_id"    => $space,
                    "object_model" => "space",
                    "title"        => $titles[rand(0, 3)],
                    "content"      => "Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te",
                    "rate_number"  => $rate,
                    "author_ip"    => "127.0.0.1",
                    "status"       => "approved",
                    "publish_date" => date("Y-m-d H:i:s"),
                    'create_user' => rand(7,16),
                    'vendor_id' => $vendor_id,
                ]);
                if ($review->save()) {
                    if (!empty($metaReview)) {
                        foreach ($metaReview as $meta) {
                            $meta['review_id'] = $review->id;
                            $reviewMeta = new ReviewMeta($meta);
                            $reviewMeta->save();
                        }
                    }
                }
            }
        }

        // Settings
        DB::table('core_settings')->insert(
            [
                [
                    'name' => 'space_page_search_title',
                    'val' => 'Search for space',
                    'group' => "space",
                ],
                [
                    'name' => 'space_page_limit_item',
                    'val' => 9,
                    'group' => "space",
                ],
                [
                    'name' => 'space_page_search_banner',
                    'val' => MediaFile::findMediaByName("banner-search-space-2")->id,
                    'group' => "space",
                ],
                [
                    'name' => 'space_layout_search',
                    'val' => 'normal',
                    'group' => "space",
                ],
                [
                    'name' => 'space_enable_review',
                    'val' => '1',
                    'group' => "space",
                ],
                [
                    'name' => 'space_review_approved',
                    'val' => '0',
                    'group' => "space",
                ],
                [
                    'name' => 'space_review_stats',
                    'val' => '[{"title":"Sleep"},{"title":"Location"},{"title":"Service"},{"title":"Clearness"},{"title":"Rooms"}]',
                    'group' => "space",
                ],
                [
                    'name' => 'space_booking_buyer_fees',
                    'val' => '[{"name":"Cleaning fee","desc":"One-time fee charged by host to cover the cost of cleaning their space.","name_ja":"\u30af\u30ea\u30fc\u30cb\u30f3\u30b0\u4ee3","desc_ja":"\u30b9\u30da\u30fc\u30b9\u3092\u6383\u9664\u3059\u308b\u8cbb\u7528\u3092\u30db\u30b9\u30c8\u304c\u8acb\u6c42\u3059\u308b1\u56de\u9650\u308a\u306e\u6599\u91d1\u3002","price":"100","type":"one_time"},{"name":"Service fee","desc":"This helps us run our platform and offer services like 24\/7 support on your trip.","name_ja":"\u30b5\u30fc\u30d3\u30b9\u6599","desc_ja":"\u3053\u308c\u306b\u3088\u308a\u3001\u5f53\u793e\u306e\u30d7\u30e9\u30c3\u30c8\u30d5\u30a9\u30fc\u30e0\u3092\u5b9f\u884c\u3057\u3001\u65c5\u884c\u4e2d\u306b","price":"200","type":"one_time"}]',
                    'group' => "space",
                ],
                [
                    'name'=>'space_map_search_fields',
                    'val'=>'[{"field":"location","attr":null,"position":"1"},{"field":"attr","attr":"3","position":"2"},{"field":"date","attr":null,"position":"3"},{"field":"price","attr":null,"position":"4"},{"field":"advance","attr":null,"position":"5"}]',
                    'group'=>'space'
                ],
                [
                    'name'=>'space_search_fields',
                    'val'=>'[{"title":"Location","field":"location","size":"4","position":"1"},{"title":"From - To","field":"date","size":"4","position":"2"},{"title":"Guests","field":"guests","size":"4","position":"3"}]',
                    'group'=>'tour'
                ]
            ]
        );

        $space_type = new \Modules\Core\Models\Attributes([
            'name'=>'Space Type',
            'service'=>'space'
        ]);

        $space_type->save();

        foreach (['Auditorium','Bar','Cafe','Ballroom','Dance Studio','Office','Party Hall','Recording Studio','Yoga Studio','Villa','Warehouse'] as $k=>$term){
            $t = new \Modules\Core\Models\Terms([
                'name'=>$term,
                'attr_id'=>$space_type->id,
            ]);
            $t->save();
        }

        $a = new \Modules\Core\Models\Attributes([
            'name'=>'Amenities',
            'service'=>'space'
        ]);

        $a->save();

        $term_ids = [];

        foreach (['Air Conditioning','Breakfast','Kitchen','Parking','Pool','Wi-Fi Internet'] as $k=>$term){
            $t = new \Modules\Core\Models\Terms([
                'name'=>$term,
                'attr_id'=>$a->id,
                'image_id'=> MediaFile::findMediaByName("icon-space-box-". ($k+1) )->id
            ]);
            $t->save();
            $term_ids[] = $t->id;
        }

        foreach ($IDs as $space_id){
            foreach ($term_ids as $k=>$term_id) {

                if( rand(0 , count($term_ids) ) == $k) continue;
                if( rand(0 , count($term_ids) ) == $k) continue;
                if( rand(0 , count($term_ids) ) == $k) continue;

                \Modules\Space\Models\SpaceTerm::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $space_id
                ]);
            }
        }
        //Update Review Score
        foreach ($IDs as $service_id){
            \Modules\Space\Models\Space::find($service_id)->update_service_rate();
        }
    }
}
