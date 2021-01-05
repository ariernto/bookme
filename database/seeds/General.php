<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;

class General extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Setting header,footer
        $menu_items_en = array(
            array(
                'name'       => 'Home',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Home Page',
                        'url'        => '/',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Hotel',
                        'url'        => '/page/hotel',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Tour',
                        'url'        => '/page/tour',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Space',
                        'url'        => '/page/space',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Car',
                        'url'        => '/page/car',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Hotel',
                'url'        => '/hotel',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Hotel List',
                        'url'        => '/hotel',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Hotel Map',
                        'url'        => '/hotel?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Hotel Detail',
                        'url'        => '/hotel/parian-holiday-villas',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Tours',
                'url'        => '/tour',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Tour List',
                        'url'        => '/tour',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Tour Map',
                        'url'        => '/tour?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Tour Detail',
                        'url'        => '/tour/paris-vacation-travel',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Space',
                'url'        => '/space',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Space List',
                        'url'        => '/space',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Space Map',
                        'url'        => '/space?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Space Detail',
                        'url'        => '/space/stay-greenwich-village',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Car',
                'url'        => '/car',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Car List',
                        'url'        => '/car',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Car Map',
                        'url'        => '/car?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Car Detail',
                        'url'        => '/car/vinfast-lux-a20-plus',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Event',
                'url'        => '/event',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Event List',
                        'url'        => '/event',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Event Map',
                        'url'        => '/event?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Event Detail',
                        'url'        => '/event/aspen-glade-weddings-events',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Pages',
                'url'        => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'News List',
                        'url'        => '/news',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'News Detail',
                        'url'        => '/news/morning-in-the-northern-sea',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Location Detail',
                        'url'        => '/location/paris',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Become a vendor',
                        'url'        => '/page/become-a-vendor',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Contact',
                'url'        => '/contact',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(),
            ),
        );
        DB::table('core_menus')->insert([
            'name'        => 'Main Menu',
            'items'       => json_encode($menu_items_en),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        $menu_items_ja = array(
            array(
                'name'       => 'ホーム',
                'url'        => '/ja',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'ホームページ',
                        'url'        => '/ja',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ホームホテル',
                        'url'        => '/ja/page/hotel',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ホーム ツアー',
                        'url'        => '/ja/page/tour',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ホームスペース',
                        'url'        => '/ja/page/space',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'ホテル',
                'url'        => '/ja/hotel',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'ホテル一覧',
                        'url'        => '/ja/hotel',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ホテルの詳細',
                        'url'        => '/ja/hotel/parian-holiday-villas',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'ツアー',
                'url'        => '/ja/tour',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'ツアーリスト',
                        'url'        => '/ja/tour',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ツアーマップ',
                        'url'        => '/ja/tour?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ツアー詳細',
                        'url'        => '/ja/tour/paris-vacation-travel',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'スペース',
                'url'        => '/ja/space',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'スペースリスト',
                        'url'        => '/ja/space',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'スペースの詳細',
                        'url'        => '/ja/space/stay-greenwich-village',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'ページ',
                'url'        => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'ニュース一覧',
                        'url'        => '/ja/news',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ニュース詳細',
                        'url'        => '/ja/news/morning-in-the-northern-sea',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => '場所の詳細',
                        'url'        => '/ja/location/paris',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ベンダーになる',
                        'url'        => '/ja/page/become-a-vendor',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => '接触',
                'url'        => '/ja/contact',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(),
            ),
        );
        DB::table('core_menu_translations')->insert([
            'origin_id'   => '1',
            'locale'      => 'ja',
            'items'       =>json_encode($menu_items_ja),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        $menu_items_egy = array(
            array(
                'name'       => 'Home',
                'url'        => '/egy',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Home Page',
                        'url'        => '/egy',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Hotel',
                        'url'        => '/egy/page/hotel',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Tour',
                        'url'        => '/egy/page/tour',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Space',
                        'url'        => '/egy/page/space',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Car',
                        'url'        => '/egy/page/car',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Hotel',
                'url'        => '/egy/hotel',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Hotel List',
                        'url'        => '/egy/hotel',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Hotel Map',
                        'url'        => '/egy/hotel?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Hotel Detail',
                        'url'        => '/egy/hotel/parian-holiday-villas',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Tours',
                'url'        => '/egy/tour',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Tour List',
                        'url'        => '/egy/tour',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Tour Map',
                        'url'        => '/egy/tour?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Tour Detail',
                        'url'        => '/egy/tour/paris-vacation-travel',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Space',
                'url'        => '/egy/space',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Space List',
                        'url'        => '/egy/space',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Space Map',
                        'url'        => '/egy/space?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Space Detail',
                        'url'        => '/egy/space/stay-greenwich-village',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Car',
                'url'        => '/egy/car',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Car List',
                        'url'        => '/egy/car',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Car Map',
                        'url'        => '/egy/car?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Car Detail',
                        'url'        => '/egy/car/vinfast-lux-a20-plus',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Pages',
                'url'        => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'News List',
                        'url'        => '/egy/news',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'News Detail',
                        'url'        => '/egy/news/morning-in-the-northern-sea',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Location Detail',
                        'url'        => '/egy/location/paris',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Become a vendor',
                        'url'        => '/egy/page/become-a-vendor',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                ),
            ),
            array(
                'name'       => 'Contact',
                'url'        => '/egy/contact',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(),
            ),
        );
        DB::table('core_menu_translations')->insert([
            'origin_id'   => '1',
            'locale'      => 'egy',
            'items'       =>json_encode($menu_items_egy),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_settings')->insert(
            [
                [
                    'name'  => 'menu_locations',
                    'val'   => '{"primary":1}',
                    'group' => "general",
                ],
                [
                    'name'  => 'admin_email',
                    'val'   => 'contact@bookingcore.com',
                    'group' => "general",
                ], [
                    'name'  => 'email_from_name',
                    'val'   => 'Booking Core',
                    'group' => "general",
                ], [
                    'name'  => 'email_from_address',
                    'val'   => 'contact@bookingcore.com',
                    'group' => "general",
                ],
                [
                    'name'  => 'logo_id',
                    'val'   => MediaFile::findMediaByName("logo")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'site_favicon',
                    'val'   => MediaFile::findMediaByName("favicon")->id,
                    'group' => "general",
                ],
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
                ],
                [
                    'name'  => 'footer_text_left',
                    'val'   => 'Copyright © 2019 by Booking Core',
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_text_right',
                    'val'   => 'Booking Core',
                    'group' => "general",
                ],
                [
                    'name'  => 'list_widget_footer',
                    'val'   => '[{"title":"NEED HELP?","size":"3","content":"<div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            Call Us\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            + 00 222 44 5678\r\n        <\/div>\r\n    <\/div>\r\n    <div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            Email for Us\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            hello@yoursite.com\r\n        <\/div>\r\n    <\/div>\r\n    <div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            Follow Us\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            <a href=\"#\">\r\n                <i class=\"icofont-facebook\"><\/i>\r\n            <\/a>\r\n            <a href=\"#\">\r\n               <i class=\"icofont-twitter\"><\/i>\r\n            <\/a>\r\n            <a href=\"#\">\r\n                <i class=\"icofont-youtube-play\"><\/i>\r\n            <\/a>\r\n        <\/div>\r\n    <\/div>"},{"title":"COMPANY","size":"3","content":"<ul>\r\n    <li><a href=\"#\">About Us<\/a><\/li>\r\n    <li><a href=\"#\">Community Blog<\/a><\/li>\r\n    <li><a href=\"#\">Rewards<\/a><\/li>\r\n    <li><a href=\"#\">Work with Us<\/a><\/li>\r\n    <li><a href=\"#\">Meet the Team<\/a><\/li>\r\n<\/ul>"},{"title":"SUPPORT","size":"3","content":"<ul>\r\n    <li><a href=\"#\">Account<\/a><\/li>\r\n    <li><a href=\"#\">Legal<\/a><\/li>\r\n    <li><a href=\"#\">Contact<\/a><\/li>\r\n    <li><a href=\"#\">Affiliate Program<\/a><\/li>\r\n    <li><a href=\"#\">Privacy Policy<\/a><\/li>\r\n<\/ul>"},{"title":"SETTINGS","size":"3","content":"<ul>\r\n<li><a href=\"#\">Setting 1<\/a><\/li>\r\n<li><a href=\"#\">Setting 2<\/a><\/li>\r\n<\/ul>"}]',
                    'group' => "general",
                ],
                [
                    'name'  => 'list_widget_footer_ja',
                    'val'   => '[{"title":"\u52a9\u3051\u304c\u5fc5\u8981\uff1f","size":"3","content":"<div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u304a\u96fb\u8a71\u304f\u3060\u3055\u3044\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            + 00 222 44 5678\r\n        <\/div>\r\n    <\/div>\r\n    <div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u90f5\u4fbf\u7269\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            hello@yoursite.com\r\n        <\/div>\r\n    <\/div>\r\n    <div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u30d5\u30a9\u30ed\u30fc\u3059\u308b\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            <a href=\"#\">\r\n                <i class=\"icofont-facebook\"><\/i>\r\n            <\/a>\r\n            <a href=\"#\">\r\n                <i class=\"icofont-twitter\"><\/i>\r\n            <\/a>\r\n            <a href=\"#\">\r\n                <i class=\"icofont-youtube-play\"><\/i>\r\n            <\/a>\r\n        <\/div>\r\n    <\/div>"},{"title":"\u4f1a\u793e","size":"3","content":"<ul>\r\n    <li><a href=\"#\">\u7d04, \u7565<\/a><\/li>\r\n    <li><a href=\"#\">\u30b3\u30df\u30e5\u30cb\u30c6\u30a3\u30d6\u30ed\u30b0<\/a><\/li>\r\n    <li><a href=\"#\">\u5831\u916c<\/a><\/li>\r\n    <li><a href=\"#\">\u3068\u9023\u643a<\/a><\/li>\r\n    <li><a href=\"#\">\u30c1\u30fc\u30e0\u306b\u4f1a\u3046<\/a><\/li>\r\n<\/ul>"},{"title":"\u30b5\u30dd\u30fc\u30c8","size":"3","content":"<ul>\r\n    <li><a href=\"#\">\u30a2\u30ab\u30a6\u30f3\u30c8<\/a><\/li>\r\n    <li><a href=\"#\">\u6cd5\u7684<\/a><\/li>\r\n    <li><a href=\"#\">\u63a5\u89e6<\/a><\/li>\r\n    <li><a href=\"#\">\u30a2\u30d5\u30a3\u30ea\u30a8\u30a4\u30c8\u30d7\u30ed\u30b0\u30e9\u30e0<\/a><\/li>\r\n    <li><a href=\"#\">\u500b\u4eba\u60c5\u5831\u4fdd\u8b77\u65b9\u91dd<\/a><\/li>\r\n<\/ul>"},{"title":"\u8a2d\u5b9a","size":"3","content":"<ul>\r\n<li><a href=\"#\">\u8a2d\u5b9a1<\/a><\/li>\r\n<li><a href=\"#\">\u8a2d\u5b9a2<\/a><\/li>\r\n<\/ul>"}]',
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_title',
                    'val' => "We'd love to hear from you",
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_sub_title',
                    'val' => "Send us a message and we'll respond as soon as possible",
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_desc',
                    'val' => "<!DOCTYPE html><html><head></head><body><h3>Booking Core</h3><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Tell. + 00 222 444 33</p><p>Email. hello@yoursite.com</p><p>1355 Market St, Suite 900San, Francisco, CA 94103 United States</p></body></html>",
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_image',
                    'val' => MediaFile::findMediaByName("bg_contact")->id,
                    'group' => "general",
                ]
            ]
        );

        $banner_image = MediaFile::findMediaByName("banner-search")->id;
        $banner_home_mix = MediaFile::findMediaByName("home-mix")->id;
        $banner_home_mix_2 = MediaFile::findMediaByName("banner-tour-4")->id;
        $image_home_mix_1 = MediaFile::findMediaByName("image_home_mix_1")->id;
        $image_home_mix_2 = MediaFile::findMediaByName("image_home_mix_2")->id;
        $image_home_mix_3 = MediaFile::findMediaByName("image_home_mix_3")->id;
        $icon_about_1 = MediaFile::findMediaByName("ico_localguide")->id;
        $icon_about_2 = MediaFile::findMediaByName("ico_adventurous")->id;
        $icon_about_3 = MediaFile::findMediaByName("ico_maps")->id;
        $avatar = MediaFile::findMediaByName("avatar")->id;
        $avatar_2 = MediaFile::findMediaByName("avatar-2")->id;
        $avatar_3 = MediaFile::findMediaByName("avatar-3")->id;
        // Setting Home Page
        DB::table('core_templates')->insert([
            'title'       => 'Home Page',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car","event"],"title":"Hi There!","sub_title":"Where would you like to go?","bg_image":'.$banner_home_mix.',"style":"carousel","list_slider":[{"_active":true,"bg_image":'.$banner_home_mix_2.'},{"_active":true,"bg_image":'.$banner_home_mix.'}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"offer_block","name":"Offer Block","model":{"list_item":[{"_active":false,"title":"Special Offers","desc":"Find Your Perfect Hotels Get the best<br>\nprices on 20,000+ properties<br>\nthe best prices on","background_image":'.$image_home_mix_1.',"link_title":"See Deals","link_more":"#","featured_text":"HOLIDAY SALE"},{"_active":true,"title":"Newsletters","desc":"Join for free and get our <br>\ntailored newsletters full of <br>\nhot travel deals.","background_image":'.$image_home_mix_2.',"link_title":"Sign Up","link_more":"/register","featured_icon":"icofont-email"},{"_active":true,"title":"Travel Tips","desc":"Tips from our travel experts to <br>\nmake your next trip even<br>\nbetter.","background_image":'.$image_home_mix_3.',"link_title":"Sign Up","link_more":"/register","featured_text":null,"featured_icon":"icofont-island-alt"}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_hotel","name":"Hotel: List Items","model":{"title":"Bestseller Listing","desc":"Hotel highly rated for thoughtful design","number":4,"style":"normal","location_id":"","order":"id","order_by":"asc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":["space","hotel","tour"],"title":"Top Destinations","desc":"It is a long established fact that a reader","number":6,"layout":"style_4","order":"id","order_by":"asc","to_location_detail":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_tours","name":"Tour: List Items","model":{"title":"Our best promotion tours","number":6,"style":"box_shadow","category_id":"","location_id":"","order":"id","order_by":"asc","is_featured":"","desc":"Most popular destinations"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_space","name":"Space: List Items","model":{"title":"Rental Listing","desc":"Homes highly rated for thoughtful design","number":4,"style":"normal","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_car","name":"Car: List Items","model":{"title":"Car Trending","desc":"Book incredible things to do around the world.","number":8,"style":"normal","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true},{"type":"list_event","name":"Event: List Items","model":{"title":"Classical Music Event ","desc":"Lorem Ipsum is simply dummy text of the printing and typesetting industry","number":4,"style":"normal","location_id":"","order":"","order_by":"","is_featured":""},"component":"RegularBlock","open":true},{"type": "list_news", "name": "News: List Items", "model": {"title": "Read the latest from blog", "desc": "Contrary to popular belief", "number": 6, "category_id": null, "order": "id", "order_by": "asc"}, "component": "RegularBlock", "open": true, "is_container": false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Know your city?","sub_title":"Join 2000+ locals & 1200+ contributors from 3000 cities","link_title":"Become Local Expert","link_more":"#"},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Our happy clients","list_item":[{"_active":false,"name":"Eva Hicks","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":' . $avatar . '},{"_active":false,"name":"Donald Wolf","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":6,"avatar":' . $avatar_2 . '},{"_active":false,"name":"Charlie Harrington","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.","number_star":5,"avatar":' . $avatar_3 . '}]},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_template_translations')->insert([
            'origin_id'   => '1',
            'locale'      => 'ja',
            'title'       => 'Home Page',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car"],"title":"こんにちは！","sub_title":"どこに行きたい？","bg_image":'.$banner_home_mix.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"offer_block","name":"Offer Block","model":{"list_item":[{"_active":true,"title":"特別オファー","desc":"最適なホテルを探す<br>\n20,000以上の物件の価格<br>\n上の最高の価格","background_image":'.$image_home_mix_1.',"link_title":"取引","link_more":"#","featured_text":"ホリデーセール"},{"_active":true,"title":"ニュースレター","desc":"無料で参加して取得 <br>\nに合わせたニュースレター<br>\nホット旅行情報。","background_image":'.$image_home_mix_2.',"link_title":"サインアップ","link_more":"/register","featured_icon":"icofont-email"},{"_active":true,"title":"旅行のヒント","desc":"旅行の専門家からのヒント <br>\nあなたの次の<br>\nより良い。","background_image":'.$image_home_mix_3.',"link_title":"サインアップ","link_more":"/register","featured_text":null,"featured_icon":"icofont-island-alt"}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_hotel","name":"Hotel: List Items","model":{"title":"ベストセラーリスト","desc":"思慮深いデザインで高い評価を得ているホテル","number":4,"style":"normal","location_id":"","order":"id","order_by":"asc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":["space","hotel","tour"],"title":"人気の目的地","desc":"読者が","number":6,"layout":"style_4","order":"id","order_by":"asc","to_location_detail":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_tours","name":"Tour: List Items","model":{"title":"最高のプロモーションツアー","number":6,"style":"box_shadow","category_id":"","location_id":"","order":"id","order_by":"asc","is_featured":"","desc":"最も人気のある目的地"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_space","name":"Space: List Items","model":{"title":"賃貸物件","desc":"思慮深いデザインで高い評価を受けている家","number":4,"style":"normal","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_car","name":"Car: List Items","model":{"title":"Car Trending","desc":"Book incredible things to do around the world.","number":8,"style":"normal","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true},{"type": "list_news", "name": "News: List Items", "model": {"title": "Read the latest from blog", "desc": "Contrary to popular belief", "number": 6, "category_id": null, "order": "id", "order_by": "asc"}, "component": "RegularBlock", "open": true, "is_container": false},{"type":"call_to_action","name":"Call To Action","model":{"title":"あなたの街を知？","sub_title":"3000以上の都市から2000人以上の地元民と","link_title":"ローカルエ","link_more":"#"},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"私たちの幸せなクライアント","list_item":[{"_active":false,"name":"Eva Hicks","desc":"右ずへやん間申ゃ投法けゃイ仙一もと政情ルた食的て代下ずせに丈律ルラモト聞探チト棋90績ム的社ず置攻景リフノケ内兼唱堅ゃフぼ。場ルアハ美","number_star":5,"avatar":' . $avatar . '},{"_active":false,"name":"Donald Wolf","desc":"右ずへやん間申ゃ投法けゃイ仙一もと政情ルた食的て代下ずせに丈律ルラモト聞探チト棋90績ム的社ず置攻景リフノケ内兼唱堅ゃフぼ。場ルアハ美","number_star":6,"avatar":' . $avatar_2 . '},{"_active":true,"name":"Charlie Harrington","desc":"右ずへやん間申ゃ投法けゃイ仙一もと政情ルた食的て代下ずせに丈律ルラモト聞探チト棋90績ム的社ず置攻景リフノケ内兼唱堅ゃフぼ。場ルアハ美","number_star":5,"avatar":' . $avatar_3 . '}]},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        // Setting Home Tour
        DB::table('core_templates')->insert([
            'title'       => 'Home Tour',
            'content'     => '[{"type":"form_search_tour","name":"Tour: Form Search","model":{"title":"Love where you\'re going","sub_title":"Book incredible things to do around the world.","bg_image":' . $banner_image . '},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":false,"title":"1,000+ local guides","sub_title":"Morbi semper fames lobortis ac hac penatibus","icon_image":' . $icon_about_1 . '},{"_active":false,"title":"Handcrafted experiences","sub_title":"Morbi semper fames lobortis ac hac penatibus","icon_image":' . $icon_about_2 . '},{"_active":false,"title":"96% happy travelers","sub_title":"Morbi semper fames lobortis ac hac penatibus","icon_image":' . $icon_about_3 . '}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_tours","name":"Tour: List Items","model":{"title":"Trending Tours","number":5,"style":"carousel","category_id":"","location_id":"","order":"id","order_by":"desc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"title":"Top Destinations","number":5,"order":"id","order_by":"desc","service_type":"tour"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_tours","name":"Tour: List Items","model":{"title":"Local Experiences You’ll Love","number":8,"style":"normal","category_id":"","location_id":"","order":"id","order_by":"asc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Know your city?","sub_title":"Join 2000+ locals & 1200+ contributors from 3000 cities","link_title":"Become Local Expert","link_more":"#"},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Our happy clients","list_item":[{"_active":false,"name":"Eva Hicks","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":' . $avatar . '},{"_active":false,"name":"Donald Wolf","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":6,"avatar":' . $avatar_2 . '},{"_active":false,"name":"Charlie Harrington","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.","number_star":5,"avatar":' . $avatar_3 . '}]},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_template_translations')->insert([
            'origin_id'   => '2',
            'locale'      => 'ja',
            'title'       => 'Home Tour',
            'content'     => '[{"type":"form_search_tour","name":"Tour: Form Search","model":{"title":"どこへ行くのが大好き","sub_title":"世界中で信じられないようなことを予約しましょう。","bg_image":'.$banner_image.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":true,"title":"1,000+ ローカルガイド","sub_title":"プロのツアーガイドとーガイドとーガイドと 験。 光の","icon_image":'.$icon_about_1.'},{"_active":true,"title":"手作りの体験","sub_title":"プロのツアーガイドとーガイドとーガイドと 験。 光の","icon_image":'.$icon_about_2.'},{"_active":true,"title":"96% 幸せな旅行者","sub_title":"プロのツアーガイドとーガイドとーガイドと 験。 光の","icon_image":'.$icon_about_3.'}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_tours","name":"Tour: List Items","model":{"title":"トレンドツアー","number":5,"style":"carousel","category_id":"","location_id":"","order":"id","order_by":"desc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"title":"人気の目的地","number":5,"order":"id","order_by":"desc","service_type":"tour","desc":"","layout":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_tours","name":"Tour: List Items","model":{"title":"あなたが好きになるローカル体験","number":8,"style":"normal","category_id":"","location_id":"","order":"id","order_by":"asc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"っていますか？","sub_title":"3000以上の都市から2000人以上の地元民と1200人以上の貢献者に参加する","link_title":"ローカルエ","link_more":"#"},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"私たちの幸せなクライアント","list_item":[{"_active":false,"name":"Eva Hicks","desc":"融づ苦佐とき百配ほづあ禁安テクミ真覧チヱフ行乗ぱたば外味ナ演庭コヲ旅見ヨコ優成コネ治確はろね訪来終島抄がん。","number_star":5,"avatar":'.$avatar.'},{"_active":false,"name":"Donald Wolf","desc":"融づ苦佐とき百配ほづあ禁安テクミ真覧チヱフ行乗ぱたば外味ナ演庭コヲ旅見ヨコ優成コネ治確はろね訪来終島抄がん。","number_star":6,"avatar":'.$avatar_2.'},{"_active":true,"name":"Charlie Harrington","desc":"右ずへやん間申ゃ投法けゃイ仙一もと政情ルた食的て代下ずせに丈律ルラモト聞探チト棋90績ム的社ず置攻景リフノケ内兼唱堅ゃフぼ。場ルアハ美","number_star":5,"avatar":'.$avatar_3.'}]},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        // Page Space
        $banner_image_space = MediaFile::findMediaByName("banner-search-space")->id;
        DB::table('core_templates')->insert([
            'title'       => 'Home Space',
            'content'     => '[{"type":"form_search_space","name":"Space: Form Search","model":{"title":"Find your next rental","sub_title":"Book incredible things to do around the world.","bg_image":'.$banner_image_space.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_space","name":"Space: List Items","model":{"title":"Recommended Homes","number":5,"style":"carousel","location_id":"","order":"id","order_by":"asc","desc":"Homes highly rated for thoughtful design"},"component":"RegularBlock","open":true,"is_container":false},{"type":"space_term_featured_box","name":"Space: Term Featured Box","model":{"title":"Find a Home Type","desc":"It is a long established fact that a reader","term_space":["26","27","28","29","30","31"]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":"space","title":"Top Destinations","number":6,"order":"id","order_by":"desc","layout":"style_2","desc":"It is a long established fact that a reader"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_space","name":"Space: List Items","model":{"title":" Rental Listing","desc":"Homes highly rated for thoughtful design","number":4,"style":"normal","location_id":"","order":"id","order_by":"desc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Know your city?","sub_title":"Join 2000+ locals & 1200+ contributors from 3000 cities","link_title":"Become Local Expert","link_more":"#"},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_template_translations')->insert([
            'origin_id'   => '3',
            'locale'      => 'ja',
            'title'       => 'Home Space',
            'content'     => '[{"type":"form_search_space","name":"Space: Form Search","model":{"title":"次のレンタルを探す","sub_title":"世界中で信じられないようなことを予約しましょう。","bg_image":'.$banner_image_space.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_space","name":"Space: List Items","model":{"title":"おすすめの家","number":5,"style":"carousel","location_id":"","order":"id","order_by":"asc","desc":"思慮深いデザインで高い評価を受けている家"},"component":"RegularBlock","open":true,"is_container":false},{"type":"space_term_featured_box","name":"Space: Term Featured Box","model":{"title":"ホームタイプを見つける","desc":"これは、読者はその長い既成の事実であります","term_space":["26","27","28","29","30","31"]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":"space","title":"人気の目的地","number":6,"order":"id","order_by":"desc","layout":"style_2","desc":"これは、読者はその長い既成の事実であります"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_space","name":"Space: List Items","model":{"title":"賃貸物件","desc":"思慮深いデザインで高い評価を受けている家","number":4,"style":"normal","location_id":"","order":"id","order_by":"desc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"っていますか？","sub_title":"3000以上の都市から2000人以上の地元民と1200人以上の貢献者に参加する","link_title":"ローカルエ","link_more":"#"},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        // Page Hotel
        $banner_image_hotel = MediaFile::findMediaByName("banner-search-hotel")->id;
        $hotel_icon_1 = MediaFile::findMediaByName("hotel-icon-1")->id;
        $hotel_icon_2 = MediaFile::findMediaByName("hotel-icon-2")->id;
        $hotel_icon_3 = MediaFile::findMediaByName("hotel-icon-3")->id;
        $ico_chat_1 = MediaFile::findMediaByName("ico_chat_1")->id;
        $ico_friendship_1 = MediaFile::findMediaByName("ico_friendship_1")->id;
        $ico_piggy_bank_1 = MediaFile::findMediaByName("ico_piggy-bank_1")->id;
        DB::table('core_templates')->insert([
            'title'       => 'Home Hotel',
            'content'     => '[{"type":"form_search_hotel","name":"Hotel: Form Search","model":{"title":"Find Your Perfect Hotels","sub_title":"Get the best prices on 20,000+ properties","bg_image":'.$banner_image_hotel.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":false,"title":"20,000+ properties","sub_title":"Morbi semper fames lobortis ac hac penatibus","icon_image":'.$hotel_icon_1.',"order":null},{"_active":false,"title":"Trust & Safety","sub_title":"Morbi semper fames lobortis ac hac penatibus","icon_image":'.$hotel_icon_2.',"order":null},{"_active":true,"title":"Best Price Guarantee","sub_title":"Morbi semper fames lobortis ac hac penatibus","icon_image":'.$hotel_icon_3.',"order":null}],"style":"normal"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_hotel","name":"Hotel: List Items","model":{"title":"Last Minute Deals","desc":"Hotel highly rated for thoughtful design","number":5,"style":"carousel","location_id":"","order":"","order_by":"","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":"hotel","title":"Top Destinations","desc":"It is a long established fact that a reader","number":6,"layout":"style_3","order":"","order_by":"","to_location_detail":false},"component":"RegularBlock","open":true,"is_container":false},{"type":"text","name":"Text","model":{"content":"<h2><span style=\"color: #1a2b48; font-family: Poppins, sans-serif; font-size: 28px; font-weight: 500; background-color: #ffffff;\">Why be a Local Expert</span></h2>\n<div><span style=\"color: #5e6d77; font-family: Poppins, sans-serif; font-size: 10pt; background-color: #ffffff;\">Varius massa maecenas et id dictumst mattis</span></div>","class":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":false,"title":"Earn an additional income","sub_title":"Ut elit tellus, luctus nec ullamcorper mattis","icon_image":'.$ico_piggy_bank_1.',"order":null},{"_active":false,"title":"Open your network","sub_title":"Ut elit tellus, luctus nec ullamcorper mattis","icon_image":'.$ico_friendship_1.',"order":null},{"_active":false,"title":"Practice your language","sub_title":"Ut elit tellus, luctus nec ullamcorper mattis","icon_image":'.$ico_chat_1.',"order":null}],"style":"style3"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_hotel","name":"Hotel: List Items","model":{"title":"Bestseller Listing","desc":"Hotel highly rated for thoughtful design","number":8,"style":"normal","location_id":"","order":"id","order_by":"asc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_template_translations')->insert([
            'origin_id'   => '4',
            'locale'      => 'ja',
            'title'       => 'Home Hotel',
            'content'     => '[{"type":"form_search_hotel","name":"Hotel: Form Search","model":{"title":"最適なホテルを探す","sub_title":"20,000以上のプロパティで最高の価格を取得","bg_image":'.$banner_image_hotel.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":false,"title":"20,000以上のプロパティ","sub_title":"これは飢饉は常にlobortis交流pede Suspendisseたです","icon_image":'.$hotel_icon_1.',"order":null},{"_active":false,"title":"信頼と安全性","sub_title":"これは飢饉は常にlobortis交流pede Suspendisseたです","icon_image":'.$hotel_icon_2.',"order":null},{"_active":false,"title":"ベストプライス保証","sub_title":"これは飢饉は常にlobortis交流pede Suspendisseたです","icon_image":'.$hotel_icon_3.',"order":null}],"style":"normal"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_hotel","name":"Hotel: List Items","model":{"title":"直前予約","desc":"思慮深いデザインで高い評価を得ているホテル","number":5,"style":"carousel","location_id":"","order":"","order_by":"","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":"hotel","title":"人気の目的地","desc":"それは長い間確立された事実であり、","number":6,"layout":"style_3","order":"","order_by":"","to_location_detail":false},"component":"RegularBlock","open":true,"is_container":false},{"type":"text","name":"Text","model":{"content":"<h2><span style=\"color: #1a2b48; font-family: Poppins, sans-serif; font-size: 28px; font-weight: 500; background-color: #ffffff;\">ローカルエキスパートになる理由</span></h2>\n<div><span style=\"color: #5e6d77; font-family: Poppins, sans-serif; font-size: 10pt; background-color: #ffffff;\">様々な質量マエケナスとその格言不動産</span></div>\n<div id=\"gtx-trans\" style=\"position: absolute; left: -118px; top: 55.8125px;\">\n<div class=\"gtx-trans-icon\">&nbsp;</div>\n</div>","class":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":false,"title":"追加の収入を得る","sub_title":"Ut elit tellus, luctus nec ullamcorper mattis","icon_image":'.$ico_piggy_bank_1.',"order":null},{"_active":false,"title":"ネットワークを開く","sub_title":"Ut elit tellus, luctus nec ullamcorper mattis","icon_image":'.$ico_friendship_1.',"order":null},{"_active":false,"title":"あなたの言語を練習する","sub_title":"Ut elit tellus, luctus nec ullamcorper mattis","icon_image":'.$ico_chat_1.',"order":null}],"style":"style3"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_hotel","name":"Hotel: List Items","model":{"title":"ベストセラーリスト","desc":"思慮深いデザインで高い評価を得ているホテル","number":8,"style":"normal","location_id":"","order":"id","order_by":"asc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        //Page Vendor
        $banner_image_vendor_register = MediaFile::findMediaByName("thumb-vendor-register")->id;
        $video_bg = MediaFile::findMediaByName("bg-video-vendor-register1")->id;
        $ico_chat_1 = MediaFile::findMediaByName("ico_chat_1")->id;
        $ico_friendship_1 = MediaFile::findMediaByName("ico_friendship_1")->id;
        $ico_piggy_bank_1 = MediaFile::findMediaByName("ico_piggy-bank_1")->id;
        DB::table('core_templates')->insert([
            'title'       => 'Become a vendor',
            'content'     => '[{"type":"vendor_register_form","name":"Vendor Register Form","model":{"title":"Become a vendor","desc":"Join our community to unlock your greatest asset and welcome paying guests into your home.","youtube":"https://www.youtube.com/watch?v=AmZ0WrEaf34","bg_image":'.$banner_image_vendor_register.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"text","name":"Text","model":{"content":"<h3><strong>How does it work?</strong></h3>","class":"text-center"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":false,"title":"Sign up","sub_title":"Click edit button to change this text  to change this text","icon_image":null,"order":null},{"_active":false,"title":" Add your services","sub_title":" Click edit button to change this text  to change this text","icon_image":null,"order":null},{"_active":true,"title":"Get bookings","sub_title":" Click edit button to change this text  to change this text","icon_image":null,"order":null}],"style":"style2"},"component":"RegularBlock","open":true,"is_container":false},{"type":"video_player","name":"Video Player","model":{"title":"Share the beauty of your city","youtube":"https://www.youtube.com/watch?v=hHUbLv4ThOo","bg_image":'.$video_bg.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"text","name":"Text","model":{"content":"<h3><strong>Why be a Local Expert</strong></h3>","class":"text-center ptb60"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":false,"title":"Earn an additional income","sub_title":" Ut elit tellus, luctus nec ullamcorper mattis","icon_image":'.$ico_piggy_bank_1.',"order":null},{"_active":true,"title":"Open your network","sub_title":" Ut elit tellus, luctus nec ullamcorper mattis","icon_image":'.$ico_friendship_1.',"order":null},{"_active":true,"title":"Practice your language","sub_title":" Ut elit tellus, luctus nec ullamcorper mattis","icon_image":'.$ico_chat_1.',"order":null}],"style":"style3"},"component":"RegularBlock","open":true,"is_container":false},{"type":"faqs","name":"FAQ List","model":{"title":"FAQs","list_item":[{"_active":false,"title":"How will I receive my payment?","sub_title":" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."},{"_active":true,"title":"How do I upload products?","sub_title":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."},{"_active":true,"title":"How do I update or extend my availabilities?","sub_title":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.\n"},{"_active":true,"title":"How do I increase conversion rate?","sub_title":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."}]},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        //Page Car
        $banner_image_space = MediaFile::findMediaByName("banner-search-car")->id;
        DB::table('core_templates')->insert([
            'title'       => 'Home Car',
            'content'     => '[{"type":"form_search_car","name":"Car: Form Search","model":{"title":"Search Rental Car Deals","sub_title":"Book better cars from local hosts across the US and around the world.","bg_image":122},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"list_item":[{"_active":true,"title":"Free Cancellation","sub_title":"Morbi semper fames lobortis ac","icon_image":103,"order":null},{"_active":true,"title":"No Hidden Costs","sub_title":"Morbi semper fames lobortis","icon_image":104,"order":null},{"_active":true,"title":"24/7 Customer Care","sub_title":"Morbi semper fames lobortis","icon_image":105,"order":null}],"style":"normal"},"component":"RegularBlock","open":true,"is_container":false},{"type":"car_term_featured_box","name":"Car: Term Featured Box","model":{"title":"Browse by categories","desc":"Book incredible things to do around the world.","term_car":["68","67","66","65","64","63","62","61"]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_car","name":"Car: List Items","model":{"title":"Trending used cars","desc":"Book incredible things to do around the world.","number":8,"style":"normal","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"how_it_works","name":"How It Works","model":{"title":"How does it work?","list_item":[{"_active":false,"title":"Find The Car","sub_title":"Lorem Ipsum is simply dummy text of the printing","icon_image":132,"order":null},{"_active":false,"title":"Book It","sub_title":"Lorem Ipsum is simply dummy text of the printing","icon_image":133,"order":null},{"_active":false,"title":"Grab And Go","sub_title":"Lorem Ipsum is simply dummy text of the printing","icon_image":134,"order":null}],"background_image":131},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"service_type":["car"],"title":"Top destinations","desc":"Lorem Ipsum is simply dummy text of the printing","number":6,"layout":"style_2","order":"id","order_by":"asc","to_location_detail":""},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_pages')->insert([
            'title'       => 'Home Page',
            'slug'        => 'home-page',
            'template_id' => '1',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Tour',
            'slug'        => 'tour',
            'template_id' => '2',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_pages')->insert([
            'title'       => 'Home Space',
            'slug'        => 'space',
            'template_id' => '3',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_pages')->insert([
            'title'       => 'Home Hotel',
            'slug'        => 'hotel',
            'template_id' => '4',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_pages')->insert([
            'title'       => 'Become a vendor',
            'slug'        => 'become-a-vendor',
            'template_id' => '5',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_pages')->insert([
            'title'       => 'Home Car',
            'slug'        => 'car',
            'template_id' => '6',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        $a = new Modules\Page\Models\Page();
        $a->title = "Privacy policy";
        $a->create_user = 1;
        $a->status = 'publish';
        $a->created_at = date("Y-m-d H:i:s");
        $a->content = '<h1>Privacy policy</h1>
<p> This privacy policy (&quot;Policy&quot;) describes how the personally identifiable information (&quot;Personal Information&quot;) you may provide on the <a target="_blank" rel="nofollow" href="http://dev.bookingcore.org">dev.bookingcore.org</a> website (&quot;Website&quot; or &quot;Service&quot;) and any of its related products and services (collectively, &quot;Services&quot;) is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Website operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage.</p>
<h2>Automatic collection of information</h2>
<p>When you open the Website, our servers automatically record information that your browser sends. This data may include information such as your device\'s IP address, browser type and version, operating system type and version, language preferences or the webpage you were visiting before you came to the Website and Services, pages of the Website and Services that you visit, the time spent on those pages, information you search for on the Website, access times and dates, and other statistics.</p>
<p>Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage and traffic of the Website and Services. This statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p>
<h2>Collection of personal information</h2>
<p>You can access and use the Website and Services without telling us who you are or revealing any information by which someone could identify you as a specific, identifiable individual. If, however, you wish to use some of the features on the Website, you may be asked to provide certain Personal Information (for example, your name and e-mail address). We receive and store any information you knowingly provide to us when you create an account, publish content,  or fill any online forms on the Website. When required, this information may include the following:</p>
<ul>
<li>Personal details such as name, country of residence, etc.</li>
<li>Contact information such as email address, address, etc.</li>
<li>Account details such as user name, unique user ID, password, etc.</li>
<li>Information about other individuals such as your family members, friends, etc.</li>
</ul>
<p>Some of the information we collect is directly from you via the Website and Services. However, we may also collect Personal Information about you from other sources such as public databases and our joint marketing partners. You can choose not to provide us with your Personal Information, but then you may not be able to take advantage of some of the features on the Website. Users who are uncertain about what information is mandatory are welcome to contact us.</p>
<h2>Use and processing of collected information</h2>
<p>In order to make the Website and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used for the following purposes:</p>
<ul>
<li>Create and manage user accounts</li>
<li>Send administrative information</li>
<li>Request user feedback</li>
<li>Improve user experience</li>
<li>Enforce terms and conditions and policies</li>
<li>Run and operate the Website and Services</li>
</ul>
<p>Processing your Personal Information depends on how you interact with the Website and Services, where you are located in the world and if one of the following applies: (i) you have given your consent for one or more specific purposes; this, however, does not apply, whenever the processing of Personal Information is subject to European data protection law; (ii) provision of information is necessary for the performance of an agreement with you and/or for any pre-contractual obligations thereof; (iii) processing is necessary for compliance with a legal obligation to which you are subject; (iv) processing is related to a task that is carried out in the public interest or in the exercise of official authority vested in us; (v) processing is necessary for the purposes of the legitimate interests pursued by us or by a third party.</p>
<p> Note that under some legislations we may be allowed to process information until you object to such processing (by opting out), without having to rely on consent or any other of the following legal bases below. In any case, we will be happy to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Information is a statutory or contractual requirement, or a requirement necessary to enter into a contract.</p>
<h2>Managing information</h2>
<p>You are able to delete certain Personal Information we have about you. The Personal Information you can delete may change as the Website and Services change. When you delete Personal Information, however, we may maintain a copy of the unrevised Personal Information in our records for the duration necessary to comply with our obligations to our affiliates and partners, and for the purposes described below. If you would like to delete your Personal Information or permanently delete your account, you can do so by contacting us.</p>
<h2>Disclosure of information</h2>
<p> Depending on the requested Services or as necessary to complete any transaction or provide any service you have requested, we may share your information with your consent with our trusted third parties that work with us, any other affiliates and subsidiaries we rely upon to assist in the operation of the Website and Services available to you. We do not share Personal Information with unaffiliated third parties. These service providers are not authorized to use or disclose your information except as necessary to perform services on our behalf or comply with legal requirements. We may share your Personal Information for these purposes only with third parties whose privacy policies are consistent with ours or who agree to abide by our policies with respect to Personal Information. These third parties are given Personal Information they need only in order to perform their designated functions, and we do not authorize them to use or disclose Personal Information for their own marketing or other purposes.</p>
<p>We will disclose any Personal Information we collect, use or receive if required or permitted by law, such as to comply with a subpoena, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.</p>
<h2>Retention of information</h2>
<p>We will retain and use your Personal Information for the period necessary to comply with our legal obligations, resolve disputes, and enforce our agreements unless a longer retention period is required or permitted by law. We may use any aggregated data derived from or incorporating your Personal Information after you update or delete it, but not in a manner that would identify you personally. Once the retention period expires, Personal Information shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after the expiration of the retention period.</p>
<h2>The rights of users</h2>
<p>You may exercise certain rights regarding your information processed by us. In particular, you have the right to do the following: (i) you have the right to withdraw consent where you have previously given your consent to the processing of your information; (ii) you have the right to object to the processing of your information if the processing is carried out on a legal basis other than consent; (iii) you have the right to learn if information is being processed by us, obtain disclosure regarding certain aspects of the processing and obtain a copy of the information undergoing processing; (iv) you have the right to verify the accuracy of your information and ask for it to be updated or corrected; (v) you have the right, under certain circumstances, to restrict the processing of your information, in which case, we will not process your information for any purpose other than storing it; (vi) you have the right, under certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you have the right to receive your information in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that your information is processed by automated means and that the processing is based on your consent, on a contract which you are part of or on pre-contractual obligations thereof.</p>
<h2>Privacy of children</h2>
<p>We do not knowingly collect any Personal Information from children under the age of 18. If you are under the age of 18, please do not submit any Personal Information through the Website and Services. We encourage parents and legal guardians to monitor their children\'s Internet usage and to help enforce this Policy by instructing their children never to provide Personal Information through the Website and Services without their permission. If you have reason to believe that a child under the age of 18 has provided Personal Information to us through the Website and Services, please contact us. You must also be old enough to consent to the processing of your Personal Information in your country (in some countries we may allow your parent or guardian to do so on your behalf).</p>
<h2>Cookies</h2>
<p>The Website and Services use &quot;cookies&quot; to help personalize your online experience. A cookie is a text file that is placed on your hard disk by a web page server. Cookies cannot be used to run programs or deliver viruses to your computer. Cookies are uniquely assigned to you, and can only be read by a web server in the domain that issued the cookie to you.</p>
<p>We may use cookies to collect, store, and track information for statistical purposes to operate the Website and Services. You have the ability to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. To learn more about cookies and how to manage them, visit <a target="_blank" href="https://www.internetcookies.org">internetcookies.org</a></p>
<h2>Do Not Track signals</h2>
<p>Some browsers incorporate a Do Not Track feature that signals to websites you visit that you do not want to have your online activity tracked. Tracking is not the same as using or collecting information in connection with a website. For these purposes, tracking refers to collecting personally identifiable information from consumers who use or visit a website or online service as they move across different websites over time. How browsers communicate the Do Not Track signal is not yet uniform. As a result, the Website and Services are not yet set up to interpret or respond to Do Not Track signals communicated by your browser. Even so, as described in more detail throughout this Policy, we limit our use and collection of your personal information.</p>
<h2>Email marketing</h2>
<p>We offer electronic newsletters to which you may voluntarily subscribe at any time. We are committed to keeping your e-mail address confidential and will not disclose your email address to any third parties except as allowed in the information use and processing section or for the purposes of utilizing a third party provider to send such emails. We will maintain the information sent via e-mail in accordance with applicable laws and regulations.</p>
<p>In compliance with the CAN-SPAM Act, all e-mails sent from us will clearly state who the e-mail is from and provide clear information on how to contact the sender. You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or by contacting us. However, you will continue to receive essential transactional emails.</p>
<h2>Links to other resources</h2>
<p>The Website and Services contain links to other resources that are not owned or controlled by us. Please be aware that we are not responsible for the privacy practices of such other resources or third parties. We encourage you to be aware when you leave the Website and Services and to read the privacy statements of each and every resource that may collect Personal Information.</p>
<h2>Information security</h2>
<p>We secure information you provide on computer servers in a controlled, secure environment, protected from unauthorized access, use, or disclosure. We maintain reasonable administrative, technical, and physical safeguards in an effort to protect against unauthorized access, use, modification, and disclosure of Personal Information in its control and custody. However, no data transmission over the Internet or wireless network can be guaranteed. Therefore, while we strive to protect your Personal Information, you acknowledge that (i) there are security and privacy limitations of the Internet which are beyond our control; (ii) the security, integrity, and privacy of any and all information and data exchanged between you and the Website and Services cannot be guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by a third party, despite best efforts.</p>
<h2>Data breach</h2>
<p>In the event we become aware that the security of the Website and Services has been compromised or users Personal Information has been disclosed to unrelated third parties as a result of external activity, including, but not limited to, security attacks or fraud, we reserve the right to take reasonably appropriate measures, including, but not limited to, investigation and reporting, as well as notification to and cooperation with law enforcement authorities. In the event of a data breach, we will make reasonable efforts to notify affected individuals if we believe that there is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise required by law. When we do, we will post a notice on the Website, send you an email.</p>
<h2>Changes and amendments</h2>
<p>We reserve the right to modify this Policy or its terms relating to the Website and Services from time to time in our discretion and will notify you of any material changes to the way in which we treat Personal Information. When we do, we will post a notification on the main page of the Website. We may also provide notice to you in other ways in our discretion, such as through contact information you have provided. Any updated version of this Policy will be effective immediately upon the posting of the revised Policy unless otherwise specified. Your continued use of the Website and Services after the effective date of the revised Policy (or such other act specified at that time) will constitute your consent to those changes. However, we will not, without your consent, use your Personal Information in a manner materially different than what was stated at the time your Personal Information was collected. Policy was created with <a style="color:inherit" target="_blank" href="https://www.websitepolicies.com/privacy-policy-generator">WebsitePolicies</a>.</p>
<h2>Acceptance of this policy</h2>
<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services.</p>
<h2>Contacting us</h2>
<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to individual rights and your Personal Information, you may do so via the <a target="_blank" rel="nofollow" href="http://dev.bookingcore.org/contact">contact form</a></p>
<p>This document was last updated on October 6, 2020</p>';
        $a->save();
        DB::table('core_settings')->insert([
                [
                    'name'  => 'home_page_id',
                    'val'   => '1',
                    'group' => "general",
                ],
                [
                    'name'  => 'page_contact_title',
                    'val'   => "We'd love to hear from you",
                    'group' => "general",
                ],
                [
                    'name'  => 'page_contact_title_ja',
                    'val'   => "あなたからの御一報をお待ち",
                    'group' => "general",
                ],
                [
                    'name'  => 'page_contact_sub_title',
                    'val'   => "Send us a message and we'll respond as soon as possible",
                    'group' => "general",
                ],
                [
                    'name'  => 'page_contact_sub_title_ja',
                    'val'   => "私たちにメッセージを送ってください、私たちはできるだ",
                    'group' => "general",
                ],
                [
                    'name'  => 'page_contact_desc',
                    'val'   => "<!DOCTYPE html><html><head></head><body><h3>Booking Core</h3><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Tell. + 00 222 444 33</p><p>Email. hello@yoursite.com</p><p>1355 Market St, Suite 900San, Francisco, CA 94103 United States</p></body></html>",
                    'group' => "general",
                ],
                [
                    'name'  => 'page_contact_image',
                    'val'   => MediaFile::findMediaByName("bg_contact")->id,
                    'group' => "general",
                ]
            ]);
        // Setting Currency
        DB::table('core_settings')->insert([
                [
                    'name'  => "currency_main",
                    'val'   => "usd",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_format",
                    'val'   => "left",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_decimal",
                    'val'   => ",",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_thousand",
                    'val'   => ".",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_no_decimal",
                    'val'   => "0",
                    'group' => "payment",
                ],
                [
                    'name'  => "extra_currency",
                    'val'   => '[{"currency_main":"eur","currency_format":"left","currency_thousand":".","currency_decimal":",","currency_no_decimal":"2","rate":"0.902807"},{"currency_main":"jpy","currency_format":"right_space","currency_thousand":".","currency_decimal":",","currency_no_decimal":"0","rate":"0.00917113"}]',
                    'group' => "payment",
                ]
            ]);
        //MAP
        DB::table('core_settings')->insert([
                [
                    'name'  => 'map_provider',
                    'val'   => 'gmap',
                    'group' => "advance",
                ],
                [
                    'name'  => 'map_gmap_key',
                    'val'   => '',
                    'group' => "advance",
                ]
            ]);
        // Payment Gateways
        DB::table('core_settings')->insert([
                [
                    'name'  => "g_offline_payment_enable",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_offline_payment_name",
                    'val'   => "Offline Payment",
                    'group' => "payment",
                ]
            ]);
        // Settings general
        DB::table('core_settings')->insert([
                [
                    'name'  => "date_format",
                    'val'   => "m/d/Y",
                    'group' => "general",
                ],
                [
                    'name'  => "site_title",
                    'val'   => "Booking Core",
                    'group' => "general",
                ],
            ]);
        // Email general
        DB::table('core_settings')->insert([
                [
                    'name'  => "site_timezone",
                    'val'   => "UTC",
                    'group' => "general",
                ],
                [
                    'name'  => "site_title",
                    'val'   => "Booking Core",
                    'group' => "general",
                ],
                [
                    'name'  => "email_header",
                    'val'   => '<h1 class="site-title" style="text-align: center">Booking Core</h1>',
                    'group' => "general",
                ],
                [
                    'name'  => "email_footer",
                    'val'   => '<p class="" style="text-align: center">&copy; 2019 Booking Core. All rights reserved</p>',
                    'group' => "general",
                ],
                [
                    'name'  => "enable_mail_user_registered",
                    'val'   => 1,
                    'group' => "user",
                ],
                [
                    'name'  => "user_content_email_registered",
                    'val'   => '<h1 style="text-align: center">Welcome!</h1>
                    <h3>Hello [first_name] [last_name]</h3>
                    <p>Thank you for signing up with Booking Core! We hope you enjoy your time with us.</p>
                    <p>Regards,</p>
                    <p>Booking Core</p>',
                    'group' => "user",
                ],
                [
                    'name'  => "admin_enable_mail_user_registered",
                    'val'   => 1,
                    'group' => "user",
                ],
                [
                    'name'  => "admin_content_email_user_registered",
                    'val'   => '<h3>Hello Administrator</h3>
                    <p>We have new registration</p>
                    <p>Full name: [first_name] [last_name]</p>
                    <p>Email: [email]</p>
                    <p>Regards,</p>
                    <p>Booking Core</p>',
                    'group' => "user",
                ],
                [
                    'name'  => "user_content_email_forget_password",
                    'val'   => '<h1>Hello!</h1>
                    <p>You are receiving this email because we received a password reset request for your account.</p>
                    <p style="text-align: center">[button_reset_password]</p>
                    <p>This password reset link expire in 60 minutes.</p>
                    <p>If you did not request a password reset, no further action is required.
                    </p>
                    <p>Regards,</p>
                    <p>Booking Core</p>',
                    'group' => "user",
                ]
            ]);
        // Email Setting
        DB::table('core_settings')->insert([
                [
                    'name'  => "email_driver",
                    'val'   => "log",
                    'group' => "email",
                ],
                [
                    'name'  => "email_host",
                    'val'   => "smtp.mailgun.org",
                    'group' => "email",
                ],
                [
                    'name'  => "email_port",
                    'val'   => "587",
                    'group' => "email",
                ],
                [
                    'name'  => "email_encryption",
                    'val'   => "tls",
                    'group' => "email",
                ],
                [
                    'name'  => "email_username",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_password",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_domain",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_secret",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_endpoint",
                    'val'   => "api.mailgun.net",
                    'group' => "email",
                ],
                [
                    'name'  => "email_postmark_token",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_key",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_secret",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_region",
                    'val'   => "us-east-1",
                    'group' => "email",
                ],
                [
                    'name'  => "email_sparkpost_secret",
                    'val'   => "",
                    'group' => "email",
                ],
            ]);
        // Email Setting
        DB::table('core_settings')->insert([
            [
                'name'  => "booking_enquiry_for_hotel",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_tour",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_space",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_car",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_event",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_type",
                'val'   => "booking_and_enquiry",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_enable_mail_to_vendor",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_mail_to_vendor_content",
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
            ],
            [
                'name'  => "booking_enquiry_enable_mail_to_admin",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_mail_to_admin_content",
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
        // Vendor setting
        DB::table('core_settings')->insert([
                [
                    'name'  => "vendor_enable",
                    'val'   => "1",
                    'group' => "vendor",
                ],
                [
                    'name'  => "vendor_commission_type",
                    'val'   => "percent",
                    'group' => "vendor",
                ],
                [
                    'name'  => "vendor_commission_amount",
                    'val'   => "10",
                    'group' => "vendor",
                ],
                [
                    'name'  => "vendor_role",
                    'val'   => "1",
                    'group' => "vendor",
                ],
                [
                    'name'  => "role_verify_fields",
                    'val'   => '{"phone":{"name":"Phone","type":"text","roles":["1","2","3"],"required":null,"order":null,"icon":"fa fa-phone"},"id_card":{"name":"ID Card","type":"file","roles":["1","2","3"],"required":"1","order":"0","icon":"fa fa-id-card"},"trade_license":{"name":"Trade License","type":"multi_files","roles":["1","3"],"required":"1","order":"0","icon":"fa fa-copyright"}}',
                    'group' => "vendor",
                ],
            ]);
        DB::table('core_settings')->insert([
                'name'  => 'enable_mail_vendor_registered',
                'val'   => '1',
                'group' => 'vendor'
            ]);
        DB::table('core_settings')->insert([
                'name'  => 'vendor_content_email_registered',
                'val'   => '<h1 style="text-align: center;">Welcome!</h1>
                            <h3>Hello [first_name] [last_name]</h3>
                            <p>Thank you for signing up with Booking Core! We hope you enjoy your time with us.</p>
                            <p>Regards,</p>
                            <p>Booking Core</p>',
                'group' => 'vendor'
            ]);
        DB::table('core_settings')->insert([
                'name'  => 'admin_enable_mail_vendor_registered',
                'val'   => '1',
                'group' => 'vendor'
            ]);
        DB::table('core_settings')->insert([
                'name'  => 'admin_content_email_vendor_registered',
                'val'   => '<h3>Hello Administrator</h3>
                            <p>An user has been registered as Vendor. Please check the information bellow:</p>
                            <p>Full name: [first_name] [last_name]</p>
                            <p>Email: [email]</p>
                            <p>Registration date: [created_at]</p>
                            <p>You can approved the request here: [link_approved]</p>
                            <p>Regards,</p>
                            <p>Booking Core</p>',
                'group' => 'vendor'
            ]);
        //            Cookie agreement
        DB::table('core_settings')->insert([
                [
                    'name'  => "cookie_agreement_enable",
                    'val'   => "1",
                    'group' => "advance",
                ],
                [
                    'name'  => "cookie_agreement_button_text",
                    'val'   => "Got it",
                    'group' => "advance",
                ],
                [
                    'name'  => "cookie_agreement_content",
                    'val'   => "<p>This website requires cookies to provide all of its features. By using our website, you agree to our use of cookies. <a href='#'>More info</a></p>",
                    'group' => "advance",
                ],
            ]);
        // Invoice setting
        DB::table('core_settings')->insert([
                [
                    'name'  => 'logo_invoice_id',
                    'val'   => MediaFile::findMediaByName("logo")->id,
                    'group' => "booking",
                ],
                [
                    'name'  => "invoice_company_info",
                    'val'   => "<p><span style=\"font-size: 14pt;\"><strong>Booking Core Company</strong></span></p>
                                <p>Ha Noi, Viet Nam</p>
                                <p>www.bookingcore.org</p>",
                    'group' => "booking",
                ],
            ]);
    }
}
