<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Option::where('key', 'manage-pages')->exists()) {
            $options = array(
                array('key' => 'manage-pages','value' => '{"headings":{"top_category_title":"Top Categories","most_popular_title":"Most Popular","stay_connected_title":"Stay Connected","follower_text_one":"Facebook Follower","follower_text_two":"Instagram Follower","follower_text_three":"Twitter Follower","follower_text_four":"Youtube Follower","title_text":"Don\'t Miss","breaking_news_title":"Breaking News","trending_news_title":"TRENDING NEWS","weekly_reviews":"Weekly Review","editor_picks":"Editor\\u2019s Picks","show_all_btn_text":"Show All","feature_post_title":"FEATURED POSTS","feature_video_title":"FEATURED VIDEO","menu_title_one":"Home Menu One","menu_title_two":"Home Menu Two","home_title":"Home","popular_post_title":"Popular Post","gallery_title":"Gallery","recent_post_title":"Recent Post","tags_title":"Tags","get_in_touch":"Get in touch","contact_address":"Address","contact_phone":"Phone","contact_email":"Email","contact_btn_text":"Send Message","footer_post_title":"Most Viewed Post","footer_news_title":"News","footer_about_title":"About","footer_news_tag_title":"News Tag\'s","footer_subscribe_text":"Subscribe Now"},"slider_image":null,"card_icons":null}','status' => '1','created_at' => '2024-08-18 05:20:24','updated_at' => '2024-08-19 03:51:18'),
                array('key' => 'company-info','value' => '{"name":"Maan News","address_line1":"Cecilia Chapman, 711-2880","address_line2":"NullaSt. Mankato Mississippi 96522 (257) 563-7401","phone":"+8801712022529","email":"maantheme@gmail.com","location_map":"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3645.133068555471!2d91.08454181482016!3d23.99107768447128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754051b50ebac3f%3A0x735c1cc426d8ebb!2sNatai%20Bodtoli%20Bazar%2C%20Natai%2C%2C%20Brahmanbaria!5e0!3m2!1sen!2sbd!4v1594548160557!5m2!1sen!2sbd","message":"Visit our agency or simply send us an email anytime you want. If you have any questions, please feel free.","copyright":"2023 All rights reserved","version":"4.0"}','status' => '1','created_at' => '2024-10-09 17:02:05','updated_at' => '2024-10-09 17:02:05'),
                array('key' => 'login-page','value' => '{"login_page_icon":"uploads\\/24\\/10\\/1729941454-43.svg","login_page_image":"uploads\\/24\\/10\\/1729936298-966.svg"}','status' => '1','created_at' => '2024-10-26 15:41:50','updated_at' => '2024-10-26 17:17:34')
            );

            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');

            Option::insert($options);
        }
    }
}