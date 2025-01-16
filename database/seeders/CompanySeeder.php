<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = array(
            array(
                'id' => '1',
                'name' => 'الكتلة الإسلامية - الضفة الغربية',
                'address_line1' => 'الضفة الغربية - فلسطين',
                'address_line2' => 'الضفة الغربية - فلسطين',
                'phone' => '+8801712022529',
                'email' => 'info@kutla.ps',
                'location_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3645.133068555471!2d91.08454181482016!3d23.99107768447128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754051b50ebac3f%3A0x735c1cc426d8ebb!2sNatai%20Bodtoli%20Bazar%2C%20Natai%2C%2C%20Brahmanbaria!5e0!3m2!1sen!2sbd!4v1594548160557!5m2!1sen!2sbd',
                'message' => 'مرحبا بكم في الموقع الرسمي للكتلة الإسلامية في الضفة الغربية',
                'copyright' => '<strong> 2025 جميع الحقوق محفوظة <a href="' . config('app.url') . '"> ' . config('app.url') . ' </a>.</strong>',
                'version' => '1.0',
                'status' => '1',
                'created_at' => '2022-01-29 07:39:58',
                'updated_at' => '2023-07-05 15:19:17'
            )
        );
        Company::insert($companies);
    }
}
