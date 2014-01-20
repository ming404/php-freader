<?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


error_reporting(E_ALL); //disable E_STRICT

define('PALIN_NAME','Palin');
define('PALIN_VERSION','0.3');

define('DS',DIRECTORY_SEPARATOR);
define('FS',dirname(dirname(__FILE__)).DS);
define('INC',FS.'include'.DS);
define('RES',FS.'resource'.DS);
define('VIEW',FS.'view'.DS);
define('VIEWMOD',VIEW.'module'.DS);

require_once(INC . 'functions.php');

$start_time = microtime_float();

//lib translation
$libs['mysqlnd'] = "MySQL Native Driver";
$libs['mysql'] = "MySQL";
$libs['mysqli'] = "MySQL Improved Extension";
$libs['json'] = "JSON Parser";
$libs['xml'] = "XML Parser";
$libs['curl'] = "cURL";

$ini = parse_ini_file(RES."requirement.ini", true);
//predump($ini);


/*
bcmath
calendar
com_dotnet
Core
ctype
date
dom
ereg
filter
ftp
gd
hash
iconv
libxml
mcrypt
mhash
oci8
odbc
openssl
pcre
PDO
pdo_mysql
Phar
Reflection
session
SimpleXML
soap
SPL
standard
tokenizer
wddx
xmlreader
xmlwriter
zip
zlib */
