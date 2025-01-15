<?php

//create function for breaking news

use \App\Models\News;
use \App\Models\Theme;
use App\Models\Option;
use \App\Models\Settings;
use App\Models\Socialshare;
use \App\Models\Newscategory;
use \App\Models\Photogallery;
use \App\Models\Seooptimization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

function cache_remember(string $key, callable $callback, int $ttl = 1800): mixed
{
    return cache()->remember($key, env('CACHE_LIFETIME', $ttl), $callback);
}

function get_option($key)
{
    return cache_remember($key, function () use ($key) {
        return Option::where('key', $key)->first()->value ?? [];
    });
}

function imageUpload($image, $imageDirectory, $existFileUrl = null, $name = null)
{
    if ($image) {
        if (file_exists($existFileUrl)) {
            unlink($existFileUrl);
        }
        $fileName = $name . '.' . $image->getClientOriginalExtension();
        //$fileName = $image;
        $image->move($imageDirectory, $fileName);
        $fileUrl = $imageDirectory . $fileName;
    } else {
        if (isset($existFileUrl)) {
            $fileUrl = $existFileUrl;
        } else {
            $fileUrl = '';
        }
    }
    return $fileUrl;
}
function breakingnews()
{
    $breakingnews = News::join('newssubcategories', 'news.subcategory_id', '=', 'newssubcategories.id')
        ->join('newscategories', 'newssubcategories.category_id', '=', 'newscategories.id')
        ->select('news.id', 'news.title', 'news.created_at', 'newscategories.name as news_category', 'newscategories.slug as news_categoryslug')
        ->where('news.breaking_news', 1)
        ->where('news.status', 1)
        ->latest()
        ->get();
    return $breakingnews;
}
function popularsnews()
{
    $popularsnews = News::join('newssubcategories', 'news.subcategory_id', '=', 'newssubcategories.id')
        ->join('newscategories', 'newssubcategories.category_id', '=', 'newscategories.id')
        ->join('users', 'news.reporter_id', '=', 'users.id')
        ->select('news.id', 'news.title', 'news.image', 'news.date', 'newscategories.name as news_category', 'newscategories.slug as news_categoryslug', DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
        ->where('news.status', 1)
        ->orderByDesc('news.viewers')
        ->limit(3)
        ->get();
    return $popularsnews;
}
function newscategories()
{
    if (Schema::hasTable('seooptimizations')) {
        $newscategories = Newscategory::where('type', 'news')
            ->orderBy('id')
            ->get();
        return $newscategories;
    } else {
        return [];
    }
}
function photogalleries()
{
    $photogalleries = Photogallery::where('status', 1)
        ->select('id', 'image')
        ->orderByDesc('id')
        ->limit(6)
        ->get();
    return $photogalleries;
}
function settings()
{
    $settings = Settings::first();
    return $settings;
}
function seooptimization()
{
    $seooptimization = Seooptimization::first();
    return $seooptimization;
}
function advertisement()
{
    $advertisement = \App\Models\Advertisement::latest()->first();
    return $advertisement;
}
function googleanalytics()
{
    $googleanalytics = \App\Models\Googleanalytic::latest()->get();
    return $googleanalytics;
}
function home()
{
    $home = Newscategory::where('type', 'home')->value('name');
    return $home;
}
function contactus()
{
    $contactus = Newscategory::where('type', 'contact')->value('name');
    return $contactus;
}
function socials()
{
    $socials = Socialshare::take(5)->get();
    return $socials;
}
function headers()
{
    $header = \App\Models\Header::where('status', 1)->where('is_active', 1)->first();
    return $header;
}
function menu()
{
    $menu = \App\Models\Menu::where('status', 1)->where('is_active', 1)->first();
    return $menu;
}
function footer()
{
    $footer = \App\Models\Footer::where('status', 1)->where('is_active', 1)->first();
    return $footer;
}
function companies()
{
    $companies = \App\Models\Company::where('status', 1)->first();
    return $companies;
}
function themeActivation()
{
    if (Schema::hasTable('themes')) {
        $activeTheme = Theme::where('is_active', 1)->first();
        return $activeTheme;
    }
}

function languages()
{
    return [
        'en' => ['name' => 'English', 'flag' => 'us'],
        'ar' => ['name' => 'Arabic', 'flag' => 'sa'],
        'bn' => ['name' => 'Bengali', 'flag' => 'bd'],
        'zh' => ['name' => 'Chinese', 'flag' => 'cn'],
        'fr' => ['name' => 'French', 'flag' => 'fr'],
        'de' => ['name' => 'German', 'flag' => 'de'],
        'hi' => ['name' => 'Hindi', 'flag' => 'in'],
        'es' => ['name' => 'Spanish', 'flag' => 'es'],
        'ja' => ['name' => 'Japanese', 'flag' => 'jp'],
        'rum' => ['name' => 'Romanian', 'flag' => 'ro'],
        'vi' => ['name' => 'Vietnamese', 'flag' => 'vn'],
        'it' => ['name' => 'Italian', 'flag' => 'it'],
        'th' => ['name' => 'Thai', 'flag' => 'th'],
        'bs' => ['name' => 'Bosnian', 'flag' => 'ba'],
        'nl' => ['name' => 'Dutch', 'flag' => 'nl'],
        'pt' => ['name' => 'Portuguese', 'flag' => 'pt'],
        'pl' => ['name' => 'Polish', 'flag' => 'pl'],
        'he' => ['name' => 'Hebrew', 'flag' => 'il'],
        'hu' => ['name' => 'Hungarian', 'flag' => 'hu'],
        'fi' => ['name' => 'Finnish', 'flag' => 'fi'],
        'el' => ['name' => 'Greek', 'flag' => 'gr'],
        'ko' => ['name' => 'Korean', 'flag' => 'kr'],
        'ms' => ['name' => 'Malay', 'flag' => 'my'],
        'id' => ['name' => 'Indonesian', 'flag' => 'id'],
        'fa' => ['name' => 'Persian', 'flag' => 'ir'],
        'tr' => ['name' => 'Turkish', 'flag' => 'tr'],
        'sr' => ['name' => 'Serbian', 'flag' => 'rs'],
        'km' => ['name' => 'Khmer', 'flag' => 'khm'],
        'uk' => ['name' => 'Ukrainian', 'flag' => 'ua'],
        'lo' => ['name' => 'Lao', 'flag' => 'la'],
        'ru' => ['name' => 'Russian', 'flag' => 'ru'],
        'cs' => ['name' => 'Czech', 'flag' => 'cz'],
        'kn' => ['name' => 'Kannada', 'flag' => 'ka'],
        'mr' => ['name' => 'Marathi', 'flag' => 'mh'],
        'sv' => ['name' => 'Swedish', 'flag' => 'se'],
        'da' => ['name' => 'Danish', 'flag' => 'dk'],
        'ur' => ['name' => 'Urdu', 'flag' => 'pk'],
        'sq' => ['name' => 'Albanian', 'flag' => 'al'],
        'sk' => ['name' => 'Slovak', 'flag' => 'sk'],
        'bur' => ['name' => 'Burmese', 'flag' => 'mm'],
        'ti' => ['name' => 'Tigrinya', 'flag' => 'er'],
        'kz' => ['name' => 'Kazakh', 'flag' => 'kz'],
        'az' => ['name' => 'Azerbaijani', 'flag' => 'az'],
        'zh-cn' => ['name' => 'Chinese (CN)', 'flag' => 'zh-cn'],
        'zh-tw' => ['name' => 'Chinese (TW)', 'flag' => 'zh-tw'],
        'pt-br' => ['name' => 'Portuguese (BR)', 'flag' => 'pt-br'],
        'tz' => ['name' => 'Swahili', 'flag' => 'tz'],
        'ps' => ['name' => 'Pashto', 'flag' => 'af'],
        'prs' => ['name' => 'Dari', 'flag' => 'afdari'],
        'ca' => ['name' => 'Andorra', 'flag' => 'ad'],
        'bt' => ['name' => 'Dzongkha', 'flag' => 'dz'],
        'drcfr' => ['name' => 'Congo (DRC)', 'flag' => 'drc'],
        'cgfr' => ['name' => 'Congo (Republic)', 'flag' => 'cg'],
        'escr' => ['name' => 'Costa Rica (Spanish)', 'flag' => 'cr'],
        'enbw' => ['name' => 'Botswana (English)', 'flag' => 'bw'],
        'bws' => ['name' => 'Botswana (Setswana)', 'flag' => 'bws'],
        'deat' => ['name' => 'Austria(German)', 'flag' => 'at'],
        'enbs' => ['name' => 'Bahamas(English)', 'flag' => 'bs'],
        'arbh' => ['name' => 'Bahrain(Arabic)', 'flag' => 'bh'],
        'pt-ao' => ['name' => 'Angola(Portuguese)', 'flag' => 'ao'],
        'es-ar' => ['name' => 'Argentina(Spanish)', 'flag' => 'ar'],
        'hy' => ['name' => 'Armenian', 'flag' => 'am'],
        'au-en' => ['name' => 'Australia', 'flag' => 'au'],
        'bb-en' => ['name' => 'Barbados(English)', 'flag' => 'bb'],
        'be' => ['name' => 'Belarusian', 'flag' => 'by'],
        'nl-be' => ['name' => 'Belgium(Dutch)', 'flag' => 'be'],
        'bz-en' => ['name' => 'Belize(English)', 'flag' => 'bz'],
        'bj-fr' => ['name' => 'Benin(French)', 'flag' => 'bj'],
        'bo-es' => ['name' => 'Bolivia(Spanish)', 'flag' => 'bo'],
        'bn-ms' => ['name' => 'Brunei(Malay)', 'flag' => 'bn'],
        'bg' => ['name' => 'Bulgarian', 'flag' => 'bg'],
        'bf-fr' => ['name' => 'Burkina Faso(French)', 'flag' => 'bf'],
        'cm-fr' => ['name' => 'Cameroon(French)', 'flag' => 'cm'],
        'ca-en' => ['name' => 'Canada(English)', 'flag' => 'ca'],
        'cl-es' => ['name' => 'Chile(Spanish)', 'flag' => 'cl'],
        'co-es' => ['name' => 'Colombia(Spanish)', 'flag' => 'co'],
        'km-ar' => ['name' => 'Comoros(Arabic)', 'flag' => 'km'],
        'hr' => ['name' => 'Croatian', 'flag' => 'hr'],
        'cu-es' => ['name' => 'Cuba(Spanish)', 'flag' => 'cu'],
        'cy-el' => ['name' => 'Cyprus(Greek)', 'flag' => 'cy'],
        'dj-fr' => ['name' => 'Djibouti(French)', 'flag' => 'dj'],
        'dm-en' => ['name' => 'Dominica(English)', 'flag' => 'dm'],
        'tet' => ['name' => 'Tetum', 'flag' => 'tl'],
        'ec-es' => ['name' => 'Ecuador(Spanish)', 'flag' => 'ec'],
        'eg-ar' => ['name' => 'Egypt(Arabic)', 'flag' => 'eg'],
        'sv-es' => ['name' => 'El Salvador(Spanish)', 'flag' => 'sv'],
        'gq-es' => ['name' => 'Equatorial Guinea(Spanish)', 'flag' => 'gq'],
        'et' => ['name' => 'Estonian', 'flag' => 'ee'],
        'ss' => ['name' => 'Swati', 'flag' => 'sz'],
        'am' => ['name' => 'Amharic', 'flag' => 'et'],
        'fj-en' => ['name' => 'Fiji', 'flag' => 'fj'],
        'ga-fr' => ['name' => 'Gabon(French)', 'flag' => 'ga'],
        'gm-en' => ['name' => 'Gambia(English)', 'flag' => 'gm'],
        'ka' => ['name' => 'Georgian', 'flag' => 'ge'],
        'gh-en' => ['name' => 'Ghana(English)', 'flag' => 'gh'],
        'gd-en' => ['name' => 'Grenada(English)', 'flag' => 'gd'],
        'gt-en' => ['name' => 'Guatemala(English)', 'flag' => 'gt'],
        'gn-fr' => ['name' => 'Guinea(French)', 'flag' => 'gn'],
        'gy-en' => ['name' => 'Guyana(English)', 'flag' => 'gy'],
        'ht-fr' => ['name' => 'Haiti(French)', 'flag' => 'ht'],
        'hn-es' => ['name' => 'Honduras(Spanish)', 'flag' => 'hn'],
        'is' => ['name' => 'Icelandic', 'flag' => 'is'],
        'ga' => ['name' => 'Irish', 'flag' => 'ie'],
        'uz' => ['name' => 'Uzbek', 'flag' => 'uz'],
        'zh-tw-man' => ['name' => 'Mandarin', 'flag' => 'tw'],
        'tg' => ['name' => 'Tajik', 'flag' => 'tj'],
        'sm' => ['name' => 'Samoan', 'flag' => 'ws'],
        'fil' => ['name' => 'Filipino', 'flag' => 'ph'],

    ];
}

function formatted_date(string $date = null, string $format = 'd M, Y'): ?string
{
    return !empty($date) ? Date::parse($date)->format($format) : null;
}


function return_post_link($post)
{
    $post_id = $post->id;
    $name = str_replace('%', '::', $post->title);
    $url = (implode('-', explode(' ', $name)));
    $url = (implode('-', explode('/', $url)));
    return route('news.details', ['post' =>  $post_id, 'slug' =>  $url]);
}
