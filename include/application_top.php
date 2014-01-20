<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


$config = dirname(__FILE__)."/config.php";
if(!file_exists($config)) {
    header('Location: /install/index.php');
    die();
}

require_once($config);

define('APP_NAME',"PHP Freader");
define('APP_DESCRIPTION',"Next generation feed reader that works");
define('VERSION',"1.1");

if(!defined('DB_PREFIX'))
    define('DB_PREFIX','');

define('DS',DIRECTORY_SEPARATOR);
define('FS',dirname(dirname(__FILE__)).DS);
define('INC',FS.'include'.DS);
define('LIB',FS.'lib'.DS);
define('MODEL',FS.'model'.DS);
define('RES',FS.'resource'.DS);

require_once(INC . 'functions.php');

$start_time = microtime_float();

import('ez_sql/ez_sql_core');
import('ez_sql/ez_sql_mysql');

import('base');
import('channel');
import('item');
import('user');
import('user_channel_link');
import('tag');
import('log');

