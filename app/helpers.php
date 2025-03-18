<?php

use \Illuminate\Support\Str;

function template($asset = false)
{
    $activeTheme = config('basic.theme');
    if ($asset) return 'assets/themes/' . $activeTheme . '/';
    return 'themes.' . $activeTheme . '.';
}




if (!function_exists('template')) {
    function template($full = false) {
        return $full ? 'default_template_full' : 'default_template';
    }
}


// function recursive_array_replace($find, $replace, $array)
// {
//     if (!is_array($array)) {
//         return str_replace($find, $replace, $array);
//     }
//     $newArray = [];
//     foreach ($array as $key => $value) {
//         $newArray[$key] = recursive_array_replace($find, $replace, $value);
//     }
//     return $newArray;
// }

if (!function_exists('recursive_array_replace')) {
    function recursive_array_replace($search, $replace, $subject) {
        if (is_array($subject)) {
            foreach ($subject as $key => $value) {
                $subject[$key] = recursive_array_replace($search, $replace, $value);
            }
            return $subject;
        }
        return str_replace($search, $replace, $subject);
    }
}

// function menuActive($routeName, $type = null)
// {
//     $class = 'active';
//     if ($type == 3) {
//         $class = 'selected';
//     } elseif ($type == 2) {
//         $class = 'has-arrow active';
//     } elseif ($type == 1) {
//         $class = 'in';
//     }
//     if (is_array($routeName)) {
//         foreach ($routeName as $key => $value) {
//             if (request()->routeIs($value)) {
//                 return $class;
//             }
//         }
//     } elseif (request()->routeIs($routeName)) {
//         return $class;
//     }
// }

if (!function_exists('menuActive')) {
    function menuActive($routeName, $type = null)
    {
        $class = 'active';
        if ($type == 3) {
            $class = 'selected';
        } elseif ($type == 2) {
            $class = 'has-arrow active';
        } elseif ($type == 1) {
            $class = 'in';
        }

        if (is_array($routeName)) {
            foreach ($routeName as $key => $value) {
                if (request()->routeIs($value)) {
                    return $class;
                }
            }
        } elseif (request()->routeIs($routeName)) {
            return $class;
        }
    }
}


// function getFile($image, $clean = '')
// {
//     return file_exists($image) && is_file($image) ? asset($image) . $clean : asset(config('location.default'));
// }
if (!function_exists('getFile')) {
    function getFile($image, $clean = '')
    {
        return file_exists($image) && is_file($image) ? asset($image) . $clean : asset(config('location.default'));
    }
}


// function removeFile($path)
// {
//     return file_exists($path) && is_file($path) ? @unlink($path) : false;
// }

if (!function_exists('removeFile')) {
    function removeFile($path)
    {
        return file_exists($path) && is_file($path) ? @unlink($path) : false;
    }
}

// function loopIndex($object)
// {
//     return ($object->currentPage() - 1) * $object->perPage() + 1;
// }
if (!function_exists('loopIndex')) {
    function loopIndex($object)
    {
        return ($object->currentPage() - 1) * $object->perPage() + 1;
    }
}


// function getAmount($amount, $length = 0)
// {
//     if (0 < $length) {
//         return number_format($amount + 0, $length);
//     }
//     return $amount + 0;
// }

if (!function_exists('getAmount')) {
    function getAmount($amount, $length = 0)
    {
        if (0 < $length) {
            return number_format($amount + 0, $length);
        }
        return $amount + 0;
    }
}


if (!function_exists('strRandom')) {
function strRandom($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
}

if (!function_exists('diffForHumans')) {
function diffForHumans($date)
{
    $lang = session()->get('lang');
    \Carbon\Carbon::setlocale($lang);
    return \Carbon\Carbon::parse($date)->diffForHumans();
}}

if (!function_exists('dateTime')) {
function dateTime($date, $format = 'd M, Y h:i A')
{
    return date($format, strtotime($date));
}
}

if (!function_exists('putPermanentEnv')) {
    function putPermanentEnv($key, $value)
    {
        $path = app()->environmentFilePath();
        $escaped = preg_quote('=' . env($key), '/');
        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }
}

if (!function_exists('checkTo')) {
function checkTo($currencies, $selectedCurrency = 'USD')
{
    foreach ($currencies as $key => $currency) {
        if (property_exists($currency, strtoupper($selectedCurrency))) {
            return $key;
        }
    }
}
}

if (!function_exists('code')) {
function code($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}
}

if (!function_exists('invoice')) {

function invoice()
{

    return time() . code(4);
}
}

if (!function_exists('wordTruncate')) {

function wordTruncate($string, $offset = 0, $length = null): string
{
    $words = explode(" ", $string);
    isset($length) ? array_splice($words, $offset, $length) : array_splice($words, $offset);
    return implode(" ", $words);
}
}

if (!function_exists('linkToEmbed')) {

function linkToEmbed($string)
{
    if (strpos($string, 'youtube') !== false) {
        $words = explode("/", $string);
        if (strpos($string, 'embed') == false) {
            array_splice($words, -1, 0, 'embed');
        }
        $words = str_ireplace('watch?v=', '', implode("/", $words));
        return $words;
    }
    return $string;
}
}

if (!function_exists('slug')) {

function slug($title)
{
    return \Illuminate\Support\Str::slug($title);
}
}

if (!function_exists('title2snake')) {

function title2snake($string)
{
    return Str::title(str_replace(' ', '_', $string));
}
}

if (!function_exists('snake2Title')) {

function snake2Title($string)
{
    return Str::title(str_replace('_', ' ', $string));
}
}

if (!function_exists('kebab2Title')) {

function kebab2Title($string)
{
    return Str::title(str_replace('-', ' ', $string));
}
}

if (!function_exists('getLevelUser')) {

function getLevelUser($id)
{
    $ussss = new \App\Models\User();
    return $ussss->referralUsers([$id]);
}
}

if (!function_exists('getPercent')) {

function getPercent($total, $current)
{
    if ($current > 0 && $total > 0) {
        $percent = (($current * 100) / $total) ?: 0;
    } else {
        $percent = 0;
    }
    return round($percent, 0);
}
}

if (!function_exists('flagLanguage')) {

function flagLanguage($data)
{
    return '{' . rtrim($data, ',') . '}';
}
}

if (!function_exists('getIpInfo')) {

function getIpInfo()
{
    $ip = null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);

    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;


    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['os_platform'] = $os_platform;
    $data['browser'] = $browser;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');

    return $data;
}
}

if (!function_exists('resourcePaginate')) {


function resourcePaginate($data, $callback)
{
    return $data->setCollection($data->getCollection()->map($callback));
}
}

if (!function_exists('clean')) {

function clean($string)
{
    $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
}

if (!function_exists('camelToWord')) {

function camelToWord($str)
{
    $arr = preg_split('/(?=[A-Z])/', $str);
    return trim(join(' ', $arr));
}
}

if (!function_exists('in_array_any')) {

function in_array_any($needles, $haystack)
{
    return (bool)array_intersect($needles, $haystack);
}
}

if (!function_exists('adminAccessRoute')) {

function adminAccessRoute($search)
{
    $list = collect(config('role'))->pluck('access')->flatten()->intersect(auth()->guard('admin')->user()->admin_access);


    if (is_array($search)) {
        $list = $list->intersect($search);
        if (0 < count($list)) {
            return true;
        }
        return false;
    } else {

        return $list->search(function ($item) use ($search) {
            if ($search == $item) {
                return true;
            }
            return false;
        });
    }
}
}

if (!function_exists('shortName')) {

function shortName($name, $length = 3)
{
    return Str::limit(strtoupper($name), $length, '');
}
}

if (!function_exists('basicControl')) {

function basicControl()
{
    return \App\Models\Configure::firstOrCreate(['id' => 1]);
}
}

if (!function_exists('getRoute')) {
    function getRoute($route, $params = null)
    {
        return isset($params) ? route($route, $params) : route($route);
    }
}

if (!function_exists('isMenuActive')) {
    function isMenuActive($routes, $type = 0)
    {
        $class = [
            '0' => 'active',
            '1' => 'style=display:block',
            '2' => true
        ];

        if (is_array($routes)) {
            foreach ($routes as $key => $route) {
                if (request()->routeIs($route)) {
                    return $class[$type];
                }
            }
        } elseif (request()->routeIs($routes)) {
            return $class[$type];
        }

        if ($type == 1) {
            return 'style=display:none';
        } else {
            return false;
        }
    }
}


if (!function_exists('getTitle')) {
    function getTitle($title)
    {
        return ucwords(preg_replace('/[^A-Za-z0-9]/', ' ', $title));
    }
}
if (!function_exists('convertRate')) {
function convertRate($currencyCode, $payout)
{
    $convertRate = 0;
    $rate = optional($payout->method)->convert_rate;

    if ($rate) {
        $convertRate = $rate->$currencyCode;
    }

    return (float)$convertRate;
}
}
