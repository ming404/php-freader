<?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


function predump($array)
{
	echo "<pre>".print_r($array,true)."</pre>";
}

function yesno($value)
{
    return $value == "1" ? '<span class="label label-success">Yes</span>' : '<span class="label label-important">No</span>';
}

function ononly($value)
{
    return $value == "1" ? '<span class="label label-success">On</span>' : '<span class="label label-success">Off</span>';
}

function onwarning($value,$actual)
{
    $class = $value==$actual?'success':'warning';
    return $value == "1" ? '<span class="label label-'.$class.'">On</span>' : '<span class="label label-'.$class.'">Off</span>';
}

function randString($length=5)
{
    return substr(str_shuffle("abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789"), 0, $length);
}

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function canonicalizePath($path)
{
    return realpath(dirname($path)).DIRECTORY_SEPARATOR.basename($path);
}

function precheck(&$ini)
{
    if(empty($ini)) return array();
    $result = array();
    if(!empty($ini['library']))
    {
        foreach($ini['library'] as $name => $active)
        {
            if(in_array($name,array('mysql','mysqlnd','mysqli')))
                $result['library'][$name] = extension_loaded('mysql') || extension_loaded('mysqlnd');
            else
                $result['library'][$name] = extension_loaded($name);
        }
    }
    if(!empty($ini['version']))
    {
        if(isset($ini['version']['php']))
            $result['version']['php'] = version_compare(phpversion(), $ini['version']['php'], ">=");
    }
    if(!empty($ini['writable']))
    {
        foreach($ini['writable'] as $category => $filename) {
            $absFilename = canonicalizePath($filename);
            $result['writable'][$name] = is_writable(dirname($absFilename)) && !file_exists($absFilename);
        }
    }
    if(!empty($ini['recommend']))
    {
        foreach($ini['recommend'] as $name => $status)
        {
            if(in_array(strtolower($status),array('on','off')))
                $ini['recommend'][$name] = strtolower($status)=='on'?'1':'';
            $result['recommend'][$name] = in_array(get_cfg_var($name),array(false,0,'0','Off'))?'':'1';
        }
    }
    return $result;
}
