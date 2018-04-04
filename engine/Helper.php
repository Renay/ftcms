<?php

class Setting extends \Engine\Helper\Setting {}

class Session extends \Engine\Helper\Session {}

class Rcon extends \Engine\Helper\Rcon {}

class Router extends \Engine\Router\Router {}

class Cookie extends \Engine\Helper\Cookie {}

class Common extends \Engine\Helper\Common {}

class DB extends \Engine\Core\Database\SingleDB {}

class Config extends \Engine\Core\Config\Config {}

class View extends Engine\Core\Template\View {}

class User extends App\Models\User {};

class Navigation extends Engine\Core\Navigation\Navigation {}


error_reporting( E_ERROR );


/*
Title:      Minecraft Avatar
URL:        http://github.com/jamiebicknell/Minecraft-Avatar
Author:     Jamie Bicknell
Twitter:    @jamiebicknell
*/

function get_skin($user)
{
    // Default Steve Skin: http://assets.mojang.com/SkinTemplates/steve.png
    $output = 'iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAFDUlEQVR42u2a20sUURzH97G0LKMotPuWbVpslj1olJ';
    $output .= 'XdjCgyisowsSjzgrB0gSKyC5UF1ZNQWEEQSBQ9dHsIe+zJ/+nXfM/sb/rN4ZwZ96LOrnPgyxzP/M7Z+X7OZc96JpE';
    $output .= 'ISfWrFhK0YcU8knlozeJKunE4HahEqSc2nF6zSEkCgGCyb+82enyqybtCZQWAzdfVVFgBJJNJn1BWFgC49/VpwGVl';
    $output .= 'D0CaxQiA5HSYEwBM5sMAdKTqygcAG9+8coHKY/XXAZhUNgDYuBSPjJL/GkzVVhAEU5tqK5XZ7cnFtHWtq/TahdSw2';
    $output .= 'l0HUisr1UKIWJQBAMehDuqiDdzndsP2EZECAG1ZXaWMwOCODdXqysLf++uXUGv9MhUHIByDOijjdiSAoH3ErANQD7';
    $output .= '3C7TXXuGOsFj1d4YH4OTJAEy8y9Hd0mCaeZ5z8dfp88zw1bVyiYhCLOg1ZeAqC0ybaDttHRGME1DhDeVWV26u17lR';
    $output .= 'APr2+mj7dvULfHw2q65fhQRrLXKDfIxkau3ZMCTGIRR3URR5toU38HbaPiMwUcKfBAkoun09PzrbQ2KWD1JJaqswj';
    $output .= 'deweoR93rirzyCMBCmIQizqoizZkm2H7iOgAcHrMHbbV9KijkUYv7qOn55sdc4fo250e+vUg4329/Xk6QB/6DtOws';
    $output .= '+dHDGJRB3XRBve+XARt+4hIrAF4UAzbnrY0ve07QW8uHfB+0LzqanMM7qVb+3f69LJrD90/1axiEIs6qIs21BTITo';
    $output .= 'ewfcSsA+Bfb2x67OoR1aPPzu2i60fSNHRwCw221Suz0O3jO+jh6V1KyCMGse9721XdN5ePutdsewxS30cwuMjtC86';
    $output .= '0T5JUKpXyKbSByUn7psi5l+juDlZYGh9324GcPKbkycaN3jUSAGxb46IAYPNZzW0AzgiQ5tVnzLUpUDCAbakMQXXr';
    $output .= 'OtX1UMtHn+Q9/X5L4wgl7t37r85OSrx+TYl379SCia9KXjxRpiTjIZTBFOvrV1f8ty2eY/T7XJ81FQAwmA8ASH1ob';
    $output .= '68r5PnBsxA88/xAMh6SpqW4HRnLBrkOA9Xv5wPAZjAUgOkB+SHxgBgR0qSMh0zmZRsmwDJm1gFg2PMDIC8/nAHIMl';
    $output .= 's8x8GgzOsG5WiaqREgYzDvpTwjLDy8NM15LpexDEA3LepjU8Z64my+8PtDCmUyRr+fFwA2J0eAFYA0AxgSgMmYBMZ';
    $output .= 'TwFQnO9RNAEaHOj2DXF5UADmvAToA2ftyxZYA5BqgmZZApDkdAK4mAKo8GzPlr8G8AehzMAyA/i1girUA0HtYB2Ca';
    $output .= 'IkUBEHQ/cBHSvwF0AKZFS5M0ZwMQtEaEAmhtbSUoDADH9ff3++QZ4o0I957e+zYAMt6wHkhzpjkuAcgpwNcpA7AZD';
    $output .= 'LsvpwiuOkBvxygA6Bsvb0HlaeKIF2EbADZpGiGzBsA0gnwQHGOhW2snRpbpPexbAB2Z1oicAMQpTnGKU5ziFKc4xS';
    $output .= 'lOcYpTnOIUpzgVmgo+XC324WfJAdDO/+ceADkCpuMFiFKbApEHkOv7BfzfXt+5gpT8V7rpfYJcDz+jAsB233r6yyB';
    $output .= 'sJ0mlBCDofuBJkel4vOwBFPv8fyYAFPJ+wbSf/88UANNRVy4Awo6+Ig2gkCmgA5DHWjoA+X7AlM//owLANkX0w035';
    $output .= '9od++pvX8fdMAcj3/QJ9iJsAFPQCxHSnQt8vMJ3v2wCYpkhkAOR7vG7q4aCXoMoSgG8hFAuc/grMdAD4B/kHl9da7';
    $output .= 'Ne9AAAAAElFTkSuQmCC';
    $output = base64_decode($output);
    if ($user != '') {
        $ch = curl_init('http://skins.minecraft.net/MinecraftSkins/' . $user . '.png');
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($status == 301) {
            preg_match('/location:(.*)/i', $result, $matches);
            curl_setopt($ch, CURLOPT_URL, trim($matches[1]));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_NOBODY, 0);
            $result = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($status == 200) {
                $output = $result;
            }
        }
        curl_close($ch);
    }
    return $output;
}



function getHeader($user = null, $size = 48, $view = 'front')
{
    $view = in_array($view, array('f', 'l', 'r', 'b')) ? $view : 'f';
    $skin = get_skin($user);

    $im = imagecreatefromstring($skin);
    $av = imagecreatetruecolor($size, $size);

    $x = array('f' => 8, 'l' => 16, 'r' => 0, 'b' => 24);

    imagecopyresized($av, $im, 0, 0, $x[$view], 8, $size, $size, 8, 8);         // Face
    imagecolortransparent($im, imagecolorat($im, 63, 0));                       // Black Hat Issue
    imagecopyresized($av, $im, 0, 0, $x[$view] + 32, 8, $size, $size, 8, 8);    // Accessories

    header('Content-type: image/png');
    imagepng($av);
    imagedestroy($im);
    imagedestroy($av);
}

if (!function_exists('php_os')) {
    function php_os() {
        return strtoupper(substr(PHP_OS, 0, 3));
    }
}

if (!function_exists('request')) {
    function request() {
        return new Engine\Core\Request\Request;
    }
}

if (!function_exists('permfile')) {
    function permfile($path) {
        return substr(sprintf('%o', fileperms($path)), -3);
    }
}

if (!function_exists('redirect')) {
    function redirect($url = '') {
        if (strpos($url, '/') !== 0) {
            $url = "/{$url}";
        }

        header("Location: {$url}");
    }
}

if (!function_exists('bcrypt')) {
    function bcrypt($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}

if (!function_exists('asset')) {
    function asset($path) {
        return '/resources/assets/' . $path;
    }
}

if (!function_exists('view')) {
    function view($path, $data = []){
        return Engine\Core\Template\View::make($path, $data);
    }
}

if (!function_exists('nr2ds')) {
    function nr2ds($var, array $symbols = []){
        return str_replace(array_merge(["\r\n", "\n"], $symbols), PHP_EOL, $var);
    }
}

if (!function_exists('nr2br')) {
    function nr2br($var){
        return str_replace(["\r\n", "\n"], '<br />', $var);
    }
}

if (!function_exists('rcon')) {
    function rcon($host, $port, $pass)
    {
        return new Engine\Helper\Rcon($host, $port, $pass);
    }
}

if (!function_exists('config')) {
    function config($config)
    {
        return Config::get($config);
    }
}

if (!function_exists('diff')) {
    function diff($datetime1, DateTime $datetime2 = null)
    {
        if (!isset($datetime2)) {
            $datetime2 = new DateTime('now');
        }

        $datetime1 = new DateTime($datetime1);
        $interval = $datetime1->diff($datetime2, false);

        // calculate seconds
        $interval->s = $datetime2->getTimestamp() - $datetime1->getTimestamp();
        $interval->i = floor($interval->s / 60);
        $interval->h = floor($interval->s / (60 * 60));
        $interval->d = $interval->days;
        $interval->w = floor($interval->days / 7);
        $interval->m = floor($interval->days / $datetime1->format('t'));

        return $interval;
    }
}

if (!function_exists('showDate')) {
    function showDate($date)
    {
        if (!is_int($date)) $date = strtotime($date);

        $stf = 0;
        $cur_time = time();
        $diff = $cur_time - $date;

        $seconds = array('секунда', 'секунды', 'секунд');
        $minutes = array('минута', 'минуты', 'минут');
        $hours = array('час', 'часа', 'часов');
        $days = array('день', 'дня', 'дней');
        $weeks = array('неделя', 'недели', 'недель');
        $months = array('месяц', 'месяца', 'месяцев');
        $years = array('год', 'года', 'лет');
        $decades = array('десятилетие', 'десятилетия', 'десятилетий');

        $phrase = array($seconds, $minutes, $hours, $days, $weeks, $months, $years, $decades);
        $length = array(1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600);

        for ($i = sizeof($length) - 1; ($i >= 0) && (($no = $diff / $length[$i]) <= 1); $i--) {
            ;
        }
        if ($i < 0) {
            $i = 0;
        }
        $_time = $cur_time - ($diff % $length[$i]);
        $no = floor($no);
        $value = sprintf("%d %s ", $no, getPhrase($no, $phrase[$i]));

        if (($stf == 1) && ($i >= 1) && (($cur_time - $_time) > 0)) {
            $value .= time_ago($_time);
        }

        return $value . ' назад';
    }
}

if (!function_exists('rm_dir')) {
    function rm_dir($path) {
        if (is_file($path)) return unlink($path);
        if (is_dir($path)) {
            foreach(scandir($path) as $p) if (($p!='.') && ($p!='..'))
                rm_dir($path.DIRECTORY_SEPARATOR.$p);
            return rmdir($path);
        }
        return false;
    }
}

if (!function_exists('getPhrase')) {
    function getPhrase($number, $titles)
    {
        $cases = array(2, 0, 1, 1, 1, 2);

        return $titles[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
    }
}

if (!function_exists('queryServer')) {
    function queryServer($host, $port = 25565, $timeout = 2)
    {
        if (!$fp = @fsockopen($host, $port, $errno, $errstr, $timeout)) {
            return false;
        }

        stream_set_timeout($fp, $timeout);
        fwrite($fp, "\xFE\x01");
        $data = fread($fp, 1024);
        fclose($fp);
        $server = '';
        if ($data or substr($data, 0, 1) != "\xFF") {
            $data = substr($data, 3);
            $data = iconv('UTF-16BE', 'UTF-8', $data);

            // ver 1.4 >
            if ($data[1] === "\xA7" && $data[2] === "\x31") {
                $data = explode("\x00", $data);
                $server = [
                    'online' => (int)$data[4],
                    'max' => (int)$data[5],
                ];
            } else {
                $data = explode("\xA7", $data);
                $server = [
                    'online' => isset($data[1]) ? (int)$data[1] : 0,
                    'max' => isset($data[2]) ? (int)$data[2] : 0
                ];
            }
            $server['bar'] = 'primary';
            $server['percent'] = ceil(($server['online'] * 100) / $server['max']);
        }

        return $server;
    }
}