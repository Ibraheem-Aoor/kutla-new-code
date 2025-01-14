<?php

namespace Database\Seeders;

use App\Models\Newsspeciality;
use Illuminate\Database\Seeder;

class NewsSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsspecialities = [
            ['id' => 1, 'name' => 'أخبار', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'رياضة', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'أخبار عربية', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'أخبار فلسطينية', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'PT+', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'تقارير تلفزيونية', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'ألبوم الصور', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'كتّاب مقالات وآراء', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'المحور العام', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'منوعات', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'مباشر', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'name' => 'تكنولوجيا', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'name' => 'الحرب على غزة', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'name' => 'أخبار دولية', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'name' => 'علوم', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'name' => 'اقتصاد فلسطيني', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'name' => 'الطقس', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'name' => 'مقالات', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'name' => 'أخبار اسرائيلية', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'name' => 'مفقودات', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'name' => 'مجلة', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'name' => 'عالم السيارات', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'name' => 'دليل', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'name' => 'أخبار انجليزية', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'name' => 'طوارئ', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'name' => 'رمضان', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'name' => 'dasdas', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'name' => 'مؤمن تجريبي', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'name' => 'نقابي وأكاديمي', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'name' => 'أخبار الكليات', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 32, 'name' => 'أسرى الحرية', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 33, 'name' => 'حريات وحقوق', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 35, 'name' => 'شهداؤنا', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 36, 'name' => 'وطني', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 37, 'name' => 'طالبات', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
        ];

        Newsspeciality::insert($newsspecialities);
    }
}
