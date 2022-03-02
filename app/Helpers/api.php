<?php

use App\Models\Settings;

function BBgetDateFormat($date, $format = null)
{
    if (!$date) null;

    if (!is_numeric($date))
        $date = strtotime($date);

    if ($format) {
        return date($format, $date);
    }

    return date('m/d/Y', $date);
}

/**
 * @param $time
 * @return bool|string
 */
function BBgetTimeFormat($time, $format = null)
{
    if (!$time) null;

    if ($format) {
        return date($format, strtotime($time));
    }

    return date("H:i:s", strtotime($time));
}

function array_sort_with_count(array $array, $count)
{
    $cunk = array_chunk($array, $count);
    if (count($cunk)) {
        return $cunk[0];
    }
    return false;
}

function get_pluck($data, $key, $name)
{
    $result = [];
    if (count($data)) {
        foreach ($data as $datum) {
            $result[$datum->{$key}] = $datum->{$name};
        }
    }

    return $result;
}

function app_name()
{
    return env('APP_NAME');
}

function app_url($user)
{
    return env('APP_URL');
}


function shortUniqueID()
{
    return base_convert(microtime(false), 10, 36);
}


function time_ago($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function generateRandomString($length = 7)
{
    return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHJKLMNPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

function no_image()
{
    return "/images/no_image.png";
}

function get_site_email()
{
    $settings = new Settings();
    $model = $settings->getEditableData("main_settings")->toArray();

    return (isset($model['company_email'])) ? $model['company_email'] : '';
}

function get_site_phone()
{
    $settings = new Settings();
    $model = $settings->getEditableData("main_settings")->toArray();
    $main = (isset($model['main'])) ? $model['main'] :null;
    $phone = null;

    if($main && $model['phones']){
        $phones = json_decode($model['phones'],true);
        if(isset($phones[$main])){
            $phone = $phones[$main]['number'];
        }
    }
    return $phone;
}
