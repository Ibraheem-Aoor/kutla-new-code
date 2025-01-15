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
                array(
                    'key' => 'manage-pages',
                    'value' => '{
                        "headings": {
                            "top_category_title": "الفئات الأعلى",
                            "most_popular_title": "الأكثر مشاهدة",
                            "stay_connected_title": "ابق على تواصل",
                            "follower_text_one": "متابع فيسبوك",
                            "follower_text_two": "متابع انستغرام",
                            "follower_text_three": "متابع تويتر",
                            "follower_text_four": "متابع يوتيوب",
                            "title_text": "لا تفوت",
                            "breaking_news_title": "أخبار عاجلة",
                            "trending_news_title": "الأخبار الرائجة",
                            "weekly_reviews": "المراجعة الأسبوعية",
                            "editor_picks": "اختيارات المحرر",
                            "show_all_btn_text": "عرض الكل",
                            "feature_post_title": "المنشورات الشائعة",
                            "feature_video_title": "الفيديو الشائع",
                            "menu_title_one": "القائمة الرئيسية الأولى",
                            "menu_title_two": "القائمة الرئيسية الثانية",
                            "home_title": "الرئيسية",
                            "popular_post_title": "المنشورات الشائعة",
                            "gallery_title": "معرض الصور",
                            "recent_post_title": "المنشورات الحديثة",
                            "tags_title": "الوسوم",
                            "get_in_touch": "تواصل معنا",
                            "contact_address": "العنوان",
                            "contact_phone": "الهاتف",
                            "contact_email": "البريد الإلكتروني",
                            "contact_btn_text": "إرسال الرسالة",
                            "footer_post_title": "الأكثر مشاهدة",
                            "footer_news_title": "الأخبار",
                            "footer_about_title": "عن الموقع",
                            "footer_news_tag_title": "وسوم الأخبار",
                            "footer_subscribe_text": "اشترك الآن"
                        },
                        "slider_image": null,
                        "card_icons": null
                    }',
                    'status' => '1',
                    'created_at' => '2024-08-18 05:20:24',
                    'updated_at' => '2024-08-19 03:51:18'
                ),
                array('key' => 'company-info', 'value' => '{"name":"Maan News","address_line1":"Cecilia Chapman, 711-2880","address_line2":"NullaSt. Mankato Mississippi 96522 (257) 563-7401","phone":"+8801712022529","email":"info@kutla.ps","location_map":"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3645.133068555471!2d91.08454181482016!3d23.99107768447128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754051b50ebac3f%3A0x735c1cc426d8ebb!2sNatai%20Bodtoli%20Bazar%2C%20Natai%2C%2C%20Brahmanbaria!5e0!3m2!1sen!2sbd!4v1594548160557!5m2!1sen!2sbd","message":"Visit our agency or simply send us an email anytime you want. If you have any questions, please feel free.","copyright":"2023 All rights reserved","version":"4.0"}', 'status' => '1', 'created_at' => '2024-10-09 17:02:05', 'updated_at' => '2024-10-09 17:02:05'),
                array('key' => 'login-page', 'value' => '{"login_page_icon":"uploads\\/24\\/10\\/1729941454-43.svg","login_page_image":"uploads\\/24\\/10\\/1729936298-966.svg"}', 'status' => '1', 'created_at' => '2024-10-26 15:41:50', 'updated_at' => '2024-10-26 17:17:34')
            );

            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');

            Option::insert($options);
        }
    }
}
