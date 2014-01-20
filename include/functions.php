<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


function import($obj)
{
    if(file_exists(MODEL . 'class.' . $obj . '.php'))
        require_once(MODEL . 'class.' . $obj . '.php');
    else if(file_exists(LIB . $obj . '.php'))
        require_once(LIB . $obj . '.php');
    else
        throw new Exception("File not file: " . $obj);
}

function predump($array,$title='',$class='predump')
{
	if(php_sapi_name() == 'cli')
	{
		if($title)
			echo $title . PHP_EOL;
		print_r($array);
	}
	else
	{
		echo "<pre class='$class'>";
		if($title)
			echo '<h1>'.$title.'</h1>';
		print_r($array);
		echo PHP_EOL."</pre>";
	}
}

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function guid($string)
{
    return hash(HASH_METHOD,$string);
}

function feedDate($date,$format='Y-m-d')
{
    $ts = strtotime($date);
    $toNow = time() - $ts;
    if($ts < strtotime('last month')) {
        return date($format.' g:ia',$ts);
    }
    if($ts < strtotime('last 2 weeks')) {
        $weeks = ceil($toNow / 86400 / 7);
        return "$weeks week".($weeks>1?'s':'')." ago";
    }
    if($ts < time()-86400) {
        $days = ceil($toNow / 86400);
        return "$days day".($days>1?'s':'')." ago";
    }
    if($ts < time()-3600) {
        $hours = ceil($toNow / 3600);
        return "$hours hour".($hours>1?'s':'')." ago";
    }

    $min = ceil($toNow / 60);
    return "$min minute".($min>1?'s':'')." ago";

}

function simplexml_load_string_sanity($xml)
{
    $xml = preg_replace('/([\xc0-\xdf].)/se', "'&#' . ((ord(substr('$1', 0, 1)) - 192) * 64 + (ord(substr('$1', 1, 1)) - 128)) . ';'", $xml);
    $xml = preg_replace('/([\xe0-\xef]..)/se', "'&#' . ((ord(substr('$1', 0, 1)) - 224) * 4096 + (ord(substr('$1', 1, 1)) - 128) * 64 + (ord(substr('$1', 2, 1)) - 128)) . ';'", $xml);

    $res =  @simplexml_load_string($xml);
    if(!$res)
        throw new Exception ("Failed to read the returned content");
    else
        return $res;
}

//http://stackoverflow.com/questions/3979802/alternative-to-file-get-contents
function url_get_contents ($Url) {
    if (!function_exists('curl_init')){
        return false;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_ENCODING , "gzip");
    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36');
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function randString($length=5)
{
    return substr(str_shuffle("abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789~!@#%^&*()_+[]:;<>?,./{}|"), 0, $length);
}

function upgradeAvailable()
{
    $versioninfo = json_decode(file_get_contents("http://www.php-freader.org/?versioninfo"));
    return VERSION < $versioninfo->ver;
}