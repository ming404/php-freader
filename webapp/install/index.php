<?php /*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */ ?>
<?php
include_once('include/header.php');

$result = precheck($ini);
//predump($ini);
//predump($result);
include_once(VIEW.$ini['app']['template'].'.php');
include_once(INC.'footer.php');
