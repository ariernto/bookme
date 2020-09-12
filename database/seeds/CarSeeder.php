<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;

use Modules\Review\Models\Review;
use Modules\Review\Models\ReviewMeta;


class CarSeeder extends Seeder
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
            $list_gallery[] = MediaFile::findMediaByName("car-gallery-".$i)->id;
        }

        $IDs_vendor[] = $create_user =   '1';
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => 'BMW-X6-facelift',
                'slug' => Str::slug('BMW-X6-facelift', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-1")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 1,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "500",
                'sale_price' => rand(100, 300),
                'map_lat' => "21.054831",
                'map_lng' => "105.796077",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   '1';
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => '2019 Honda Clarity',
                'slug' => Str::slug('2019 Honda Clarityt', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-2")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 1,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "300",
                'sale_price' => "",
                'map_lat' => "21.039771",
                'map_lng' => "105.777203",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   '1';
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => '2019 Honda Clarity',
                'slug' => Str::slug('2019 Honda Clarityt', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-2")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 3,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "300",
                'sale_price' => "",
                'map_lat' => "21.031217",
                'map_lng' => "105.773698",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   '1';
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => '2019 BMW M6 Gran Coupe',
                'slug' => Str::slug('2019 BMW M6 Gran Coupe', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-3")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 1,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "300",
                'sale_price' => "",
                'map_lat' => "21.020161",
                'map_lng' => "105.789655",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   '1';
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => '2019 Audi S3',
                'slug' => Str::slug('2019 Audi S3', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-4")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 5,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "300",
                'sale_price' => "",
                'map_lat' => "21.014873",
                'map_lng' => "105.794117",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   rand(4,6);
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => 'Vinfast Fadil Plus',
                'slug' => Str::slug('Vinfast Fadil Plus', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-5")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 1,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "400",
                'sale_price' => "",
                'map_lat' => "21.018398",
                'map_lng' => "105.812820",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   rand(4,6);
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => 'Mercedes Benz',
                'slug' => Str::slug('Mercedes Benz', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-6")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 1,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "200",
                'sale_price' => "",
                'map_lat' => "21.025769",
                'map_lng' => "105.829635",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   rand(4,6);
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => 'Vinfast Lux SA2.0 Plus',
                'slug' => Str::slug('Vinfast Lux SA2.0 Plus', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-7")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 1,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "600",
                'sale_price' => "",
                'map_lat' => "21.017437",
                'map_lng' => "105.831179",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   rand(4,6);
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => 'Honda Civic',
                'slug' => Str::slug('Honda Civic', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-8")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 6,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "450",
                'sale_price' => "",
                'map_lat' => "21.047879",
                'map_lng' => "105.809731",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   rand(4,6);
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => 'Toyota Prius Plus',
                'slug' => Str::slug('Toyota Prius Plus', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-9")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 7,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "199",
                'sale_price' => "",
                'map_lat' => "21.025449",
                'map_lng' => "105.804412",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   rand(4,6);
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => 'Vinfast Lux V8 (SUV)',
                'slug' => Str::slug('Vinfast Lux V8 (SUV)', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-10")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 8,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "250",
                'sale_price' => "",
                'map_lat' => "21.020001",
                'map_lng' => "105.836670",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   rand(4,6);
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => 'Vinfast Lux A2.0 Plus',
                'slug' => Str::slug('Vinfast Lux A2.0 Plus', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-11")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 3,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "350",
                'sale_price' => "",
                'map_lat' => "21.051244",
                'map_lng' => "105.777988",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);
        $IDs_vendor[] = $create_user =   rand(4,6);
        $IDs[] = DB::table('bravo_cars')->insertGetId(
            [
                'title' => 'Vinfast Fadil Standard',
                'slug' => Str::slug('Vinfast Fadil Standard', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("car-12")->id,
                'banner_image_id' => MediaFile::findMediaByName('banner-car-single')->id,
                'location_id' => 1,
                'address' => "Arrondissement de Paris",
                'is_featured' => rand(0,1),
                'gallery' => implode(",",$list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'number' => rand(1,5),
                'price' => "400",
                'sale_price' => "",
                'map_lat' => "21.053326",
                'map_lng' => "105.841475",
                'map_zoom' => "12",
                'faqs' => '[{"title":"When should I check the transmission fluid?","content":"You should check the transmission fluid regularly. Try to check it at least once a month or at the sign of any trouble, for instance if there is any hesitation when you shift gears in an automatic."},{"title":"How do I check the transmission fluid?","content":"It\u2019s not hard to check your transmission fluid if the vehicle is an automatic. This link to the Dummies guide to checking your transmission fluid has step-by-step instructions and illustrations that show you where to locate the dipstick. What you want is clear, pink transmission fluid. If it is low, top it up. If it is dark, smells burnt or has bits in it then you need to get it changed by at a reliable auto repair shop."},{"title":"Is it really that important to check the transmission fluid?","content":"Yes, it can be. Often times the symptoms you\u2019ll experience from low or dirty transmission fluid will be the same as transmission problems. If you check the fluid levels regularly and refill as necessary then you\u2019ll know if there are any symptoms of trouble that it\u2019s not because the fluid levels are low and you need to see a mechanic."},{"title":"Are there different types of transmission fluid?","content":"How do I know what to buy? Yes, there are many different types of transmission fluid, each designed for a certain transmission. Different vehicles require different transmission fluids and the age of the car can also be a factor because newer transmissions take different types of transmission fluids than older vehicles. Don\u2019t guess! Find out which type of transmission fluid is required for your vehicle by checking your owner\u2019s manual."},{"title":"What is a transmission flush and should I get one?","content":"A transmission flush is used by some auto repair shops with the goal of flushing out debris.  Auto Tech does not do any sort of transmission flush.  Flushing an older transmission can cause harmful sediment to get stuck in the solenoids of the transmission. We heavily favor regular maintenance to lengthen the life of your transmission.  We service the transmission by changing fluid and the filter and do not recommend having your transmission flushed."},{"title":"How do I know I have a fluid leak from the transmission?","content":"Transmission fluid is slightly pink in color \u2013 it will appear pink or red, or possibly more brownish if the transmission fluid is dirty and needs to be replaced. When you feel transmission fluid it will be slick and oily on your fingers. It smells much like oil unless it is dirty, in which case it will smell burnt. Usually transmission fluid leaks around the front or middle of your vehicle, so if you find puddles of reddish liquid there it is probably transmission fluid. Another clue is if in addition to the leak your transmission is not working well and you notice changes in the way it sounds when you shift gears, or if shifting gears is not working as well. In this case you likely have a leak of transmission fluid that is impacting how your transmission operates."}]',
                'status' => "publish",
                'create_user' => $create_user,
                'created_at' =>  date("Y-m-d H:i:s"),
                'passenger' =>  rand(3,10),
                'gear' =>  "Auto",
                'baggage' =>  rand(3,10),
                'door' =>  4,
                'is_instant' =>  rand(0,1),
                'enable_extra_price' => '1',
                'extra_price' => '[{"name":"Child Toddler Seat","price":"100","type":"one_time"},{"name":"Infant Child Seat","price":"100","type":"one_time"},{"name":"GPS Satellite","price":"200","type":"one_time"}]',
            ]);

        // Add meta
        foreach ($IDs as $numer_key => $car){
            $vendor_id = $IDs_vendor[$numer_key];
            for ($i = 1 ; $i <= 5 ; $i++){
                if( rand(1,5) == $i) continue;
                if( rand(1,5) == $i) continue;
                $metaReview = [];
                $list_meta = [
                    "Equipment",
                    "Comfortable",
                    "Climate Control",
                    "Facility",
                    "Aftercare",
                ];
                $total_point = 0;
                foreach ($list_meta as $key => $value) {
                    $point = rand(4,5);
                    $total_point += $point;
                    $metaReview[] = [
                        "object_id"    => $car,
                        "object_model" => "car",
                        "name"         => $value,
                        "val"          => $point,
                        "create_user"  => "1",
                    ];
                }
                $rate = round($total_point / count($list_meta), 1);
                if ($rate > 5) $rate = 5;
                $titles = ["Great Car","Good Car","Car was great","Easy way to discover the city"];
                $review = new Review([
                    "object_id"    => $car,
                    "object_model" => "car",
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
                    'name' => 'car_page_search_title',
                    'val' => 'Search for car',
                    'group' => "car",
                ],
                [
                    'name' => 'car_page_limit_item',
                    'val' => 9,
                    'group' => "car",
                ],
                [
                    'name' => 'car_page_search_banner',
                    'val' => MediaFile::findMediaByName("banner-search-space-2")->id,
                    'group' => "car",
                ],
                [
                    'name' => 'car_layout_search',
                    'val' => 'normal',
                    'group' => "car",
                ],
                [
                    'name' => 'car_enable_review',
                    'val' => '1',
                    'group' => "car",
                ],
                [
                    'name' => 'car_review_approved',
                    'val' => '0',
                    'group' => "car",
                ],
                [
                    'name' => 'car_review_stats',
                    'val' => '[{"title":"Equipment"},{"title":"Comfortable"},{"title":"Climate Control"},{"title":"Facility"},{"title":"Aftercare"}]',
                    'group' => "car",
                ],
                [
                    'name' => 'car_booking_buyer_fees',
                    'val' => '[{"name":"Equipment fee","desc":"One-time fee charged by host to cover the cost of cleaning their space.","name_ja":"\u30af\u30ea\u30fc\u30cb\u30f3\u30b0\u4ee3","desc_ja":"\u30b9\u30da\u30fc\u30b9\u3092\u6383\u9664\u3059\u308b\u8cbb\u7528\u3092\u30db\u30b9\u30c8\u304c\u8acb\u6c42\u3059\u308b1\u56de\u9650\u308a\u306e\u6599\u91d1\u3002","price":"100","type":"one_time"},{"name":"Facility fee","desc":"This helps us run our platform and offer services like 24\/7 support on your trip.","name_ja":"\u30b5\u30fc\u30d3\u30b9\u6599","desc_ja":"\u3053\u308c\u306b\u3088\u308a\u3001\u5f53\u793e\u306e\u30d7\u30e9\u30c3\u30c8\u30d5\u30a9\u30fc\u30e0\u3092\u5b9f\u884c\u3057\u3001\u65c5\u884c\u4e2d\u306b","price":"200","type":"one_time"}]',
                    'group' => "car",
                ],
                [
                    'name'=>'car_map_search_fields',
                    'val'=>'[{"field":"location","attr":null,"position":"1"},{"field":"attr","attr":"9","position":"2"},{"field":"date","attr":null,"position":"3"},{"field":"price","attr":null,"position":"4"},{"field":"advance","attr":null,"position":"5"}]',
                    'group'=>'car'
                ],
                [
                    'name'=>'car_search_fields',
                    'val'=>'[{"title":"Location","field":"location","size":"6","position":"1"},{"title":"From - To","field":"date","size":"6","position":"2"}]',
                    'group'=>'car'
                ]
            ]
        );

        $car_type = new \Modules\Core\Models\Attributes([
            'name'=>'Car Type',
            'service'=>'car',
            'hide_in_single'=>'1',
        ]);
        $car_type->save();

        $term_ids = [];
        foreach (['Convertibles','Coupes','Hatchbacks','Minivans','Sedan','SUVs','Trucks','Wagons'] as $k=>$term){
            $image_id = MediaFile::findMediaByName($term)->id;
            $t = new \Modules\Core\Models\Terms([
                'name'=>$term,
                'attr_id'=>$car_type->id,
                'image_id'=>$image_id,
            ]);
            $t->save();
            $term_ids[] = $t->id;
        }

        foreach ($IDs as $car_id){
            foreach ($term_ids as $k=>$term_id) {
                if( rand(0 , count($term_ids) ) == $k) continue;
                if( rand(0 , count($term_ids) ) == $k) continue;
                if( rand(0 , count($term_ids) ) == $k) continue;
                \Modules\Car\Models\CarTerm::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $car_id
                ]);
            }
        }

        $car_type = new \Modules\Core\Models\Attributes([
            'name'=>'Car Features',
            'service'=>'car'
        ]);
        $car_type->save();

        $term_ids = [];
        foreach (['Airbag','FM Radio','Power Windows','Sensor','Speed Km','Steering Wheel'] as $k=>$term){
            $image_id = MediaFile::findMediaByName($term)->id;
            $t = new \Modules\Core\Models\Terms([
                'name'=>$term,
                'attr_id'=>$car_type->id,
                'image_id'=>$image_id,
            ]);
            $t->save();
            $term_ids[] = $t->id;
        }
        foreach ($IDs as $car_id){
            foreach ($term_ids as $k=>$term_id) {
                \Modules\Car\Models\CarTerm::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $car_id
                ]);
            }
        }

        //Update Review Score
        foreach ($IDs as $service_id){
            \Modules\Car\Models\Car::find($service_id)->update_service_rate();
        }
    }
}
