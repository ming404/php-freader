<?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


header("Content-type: text/json");
$ini = parse_ini_file(RES."requirement.ini", true);

//test config file
if(file_exists($ini['writable']['configuration']))
    die(json_encode(array('status'=>0,'message'=>'Configuration file already existed.')));

if($ini['require']['db'])
{
    //test database
    $link = @mysql_connect($_POST['db_host'], $_POST['db_user'], $_POST['db_password']);
    if(!$link)
        die(json_encode(array('status'=>0,'message'=>'Unable to connect to database server. Please make sure the given host name and credential are both correct')));

    if(!mysql_select_db($_POST['db_name']))
        die(json_encode(array('status'=>0,'message'=>'Unable to select the given database. Please make sure the given database name is correct.')));

    $buffer = '';
    if(file_exists(RES.$ini['schema']['db']))
    {
        $lines = file(RES.$ini['schema']['db'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line)
        {
            // Skipping comments
            if (substr(ltrim($line), 0, 2) == '--')
                continue;

            if (substr($line, -1) != ";")
            {
                $buffer .= $line;
                continue;
            }

            // Skip lines containing EOL
            if (($line = trim($line)) == '')
                continue;
            else if ($buffer)
            {
                $line = $buffer . $line;
                $buffer = '';
            }
            $line = trim($line);
            $line = substr($line, 0, -1);

            //add table prefix
            if(!empty($_POST['db_prefix']))
            {
                $heads = array(
                    "CREATE TABLE IF NOT EXISTS `",
                    "INSERT INTO `",
                    "CREATE TABLE  `",
                    "ALTER TABLE  `",
                );
                foreach($heads as $head)
                {
                    if(strstr($line,$head))
                    {
                        $line = str_ireplace ($head, $head.$_POST['db_prefix'], $line);
                        break;
                    }
                }
            }
            $result = @mysql_query($line);

            if (!$result )
            {
                if(strstr($line, "DROP TABLE"))
                    continue;
                else
                    die(json_encode(array('status'=>0,'message'=>mysql_error())));
            }
        }
    }
}

$output = '<?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

'.PHP_EOL.PHP_EOL;
$output .= 'date_default_timezone_set("'.date_default_timezone_get().'");'.PHP_EOL;
$output .= 'error_reporting(0);'.PHP_EOL.PHP_EOL;
if(!empty($ini['require']))
{
    foreach($ini['require'] as $require => $value)
    {
        $output .= '//'.strtoupper($require).PHP_EOL;
        foreach($_POST as $key => $value)
        {
            if(strstr($key,$require.'_'))
                $output .= 'define("'.strtoupper($key).'","'.$_POST[$key].'");'.PHP_EOL;
        }
        $output .= PHP_EOL;
    }
}
if(!empty($ini['optional']))
{
    foreach($ini['optional'] as $optional => $value)
    {
        if(!empty($_POST[$optional.'_yesno']))
        {
            $output .= '//'.strtoupper($optional).PHP_EOL;
            foreach($_POST as $key => $value)
            {
                if(strstr($key,$optional.'_') && $key!=$optional.'_yesno')
                    $output .= 'define("'.strtoupper($key).'","'.$_POST[$key].'");'.PHP_EOL;
            }
            $output .= PHP_EOL;
        }
    }
}
if(!empty($ini['extra']))
{
    $output .= '//EXTRA'.PHP_EOL;
    foreach($ini['extra'] as $extra => $value)
    {
        if($extra == "salt")
            $value = randString($value);
        $output .= 'define("'.strtoupper($extra).'","'.$value.'");'.PHP_EOL;
    }
    $output .= PHP_EOL;
}
$res = file_put_contents(canonicalizePath($ini['writable']['configuration']), $output);
if($res)
    die(json_encode(array('status'=>1,'message'=>basename($ini['writable']['configuration']).' created successful')));
else
    die(json_encode(array('status'=>0,'message'=>'Configuration file was not created successful due to unknown reason. Please contact your system administrator.')));
