<?php

namespace Database\Seeders;

use App\Models\Photogallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $photogalleries = array(
            array('title' => 'Designer Sonia Musa makes her debut','description' => 'The new Sonia Musa Store in Banani DOHS is an addition to the glamour of the boulevard that boasts having it all. The boutique designed to create a space of warmth and comfort for the client who wishes to unwind in a','image' => 'uploads/images/photogallery/maanphotogallery30012022_054307_high.png','status' => '1','viewers' => '105','user_id' => '1','created_at' => '2021-09-14 06:32:15','updated_at' => '2024-05-19 10:47:30'),
            array('title' => 'X3 Pro: The Gaming Diva','description' => 'X3 Pro: The Gaming Diva','image' => 'uploads/images/photogallery/maanphotogallery16032024_183744_bot.php','status' => '0','viewers' => '108','user_id' => '1','created_at' => '2021-09-27 09:49:25','updated_at' => '2024-05-01 01:17:24'),
            array('title' => 'Black girls of the silver screen','description' => 'When Honey Ryder rises from the waters in a daring costume with conch shells in her hands and a dagger by her side, the world took notice.
          From the very start, they are captivatingly beautiful,','image' => 'uploads/images/photogallery/maanphotogallery27092021_095023_card-3.jpg','status' => '1','viewers' => '292','user_id' => '1','created_at' => '2021-09-27 09:50:23','updated_at' => '2024-05-19 01:48:05'),
            array('title' => 'One-Stop Fashion Solution for Women','description' => 'There was a time when the term "Entrepreneurship" was frowned upon. Only a few individuals were dare to move on to entrepreneurship','image' => 'uploads/images/photogallery/maanphotogallery24102021_035221_women.jfif','status' => '1','viewers' => '313','user_id' => '1','created_at' => '2021-09-27 09:50:23','updated_at' => '2024-05-18 10:51:37'),
            array('title' => 'craftsmanship are you particularly dealing','description' => 'The specialty of Sonia Musa Dhaka is the care and attention put in the detail in every design we create. All of our designs are done by hand in our private atelier.','image' => 'uploads/images/photogallery/maanphotogallery30012022_034329_high_3.jpg','status' => '1','viewers' => '443','user_id' => '1','created_at' => '2021-09-27 09:51:03','updated_at' => '2024-05-19 01:47:36'),
            array('title' => 'Some Lesser Known Facts About Roman Reigns','description' => 'Some Lesser Known Facts About Roman Reigns Does Roman Reigns smoke?: No
          Does Roman Reigns drink alcohol?: Yes
          Roman was born into the legendary American Samoan Anoa’i family, with a huge legacy of professional wrestlers','image' => 'uploads/images/photogallery/maanphotogallery30012022_034302_roman_rings.jpg','status' => '1','viewers' => '448','user_id' => '1','created_at' => '2021-09-27 09:51:34','updated_at' => '2024-05-19 01:49:10'),
            array('title' => 'Bondstein Technologies','description' => 'Bondstein Technologies Limited,a IoT company based in HiTech City Kaliakoi','image' => 'uploads/images/photogallery/maanphotogallery23102021_081348_896047.jpg','status' => '1','viewers' => '345','user_id' => '1','created_at' => '2021-10-07 13:26:18','updated_at' => '2024-05-19 01:47:32'),
            array('title' => 'Bond girls that can give 00s a run for their money','description' => 'In all honesty, we no longer wish to refer them as Bond Girls. Leading women in the James Bond franchise may seem quite a mouthful, but that is exactly how things have shaped up, at least since \'Casino Royale\' to','image' => 'uploads/images/photogallery/maanphotogallery30012022_034350_style_2.jpg','status' => '1','viewers' => '402','user_id' => '1','created_at' => '2021-10-07 13:35:00','updated_at' => '2024-05-19 05:00:02'),
            array('title' => 'balloon, large airtight bag filled with hot air','description' => 'Balloons were used in the first successful human attempts at flying. Experimentation with balloonlike craft may have','image' => 'uploads/images/photogallery/maanphotogallery23102021_080950_ballon.jpg','status' => '0','viewers' => '196','user_id' => '1','created_at' => '2021-10-23 12:06:30','updated_at' => '2024-04-27 16:50:26')
          );

          Photogallery::insert($photogalleries);
    }
}
