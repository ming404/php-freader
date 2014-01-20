<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */



include_once('../include/application_top.php');
$db = ezSQL_mysql::get_instance(DB_USER,DB_PASSWORD,DB_NAME);
$date = date('Y-m-d',time()-(86400*30));
$query = "SELECT DISTINCT i.id FROM `".DB_PREFIX."user_item_link` uil JOIN `".DB_PREFIX."item` i ON i.id = uil.item_id WHERE `star` is null and i.`pub_date` < '$date'";
$items = @$db->get_col($query);
if(count($items)) {
    $deleteQuery = "DELETE from `".DB_PREFIX."item` WHERE id IN (".(implode(',',$items)).")";
    $deleteQueryRows = @$db->query($deleteQuery);
    $deleteQuery2 = "DELETE from `".DB_PREFIX."user_item_link` WHERE item_id IN (".(implode(',',$items)).")";
    $deleteQueryRows2 = @$db->query($deleteQuery);

    echo "Deleted $deleteQueryRows rows from Item and $deleteQueryRows2 rows from user_item_link";
}
