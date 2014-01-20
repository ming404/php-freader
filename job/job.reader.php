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
$starttime = time();
$activeChannels = user_channel_link::getActiveChannels();
if(!empty($activeChannels)) {
    foreach($activeChannels as $channel)     {
        try {
            $itemCount = $channel->updateFromRemote();
            echo "Insert / Update $itemCount items for {$channel->title}" . PHP_EOL;
            echo "Memory usage: " . memory_get_usage(). " | " . memory_get_peak_usage() . PHP_EOL;
            unset($channel);
        } catch(Exception $e) {
            echo $e->getMessage() . PHP_EOL;
            continue;
        }
    }
    unset($activeChannels);
    echo "Time Taken: ".  gmdate("H:i:s",time()-$starttime) . PHP_EOL;
    echo "Memory peak usage (emalloc / real): " . memory_get_peak_usage() . " / " . memory_get_peak_usage(true) . PHP_EOL;
} else {
    echo "No active channels to be found";
}
