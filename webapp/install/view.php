<?php
/*
 * This file is part of the PHP Palin v0.2 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
    require_once(dirname(__FILE__)."/include/application_top.php");
    $ini = parse_ini_file(RES."requirement.ini", true);
    $result = precheck($ini);

    $view = VIEWMOD.$_GET['mod'].'.php';
    if(file_exists($view))
        include_once($view);
    else
        die('View not found');
}