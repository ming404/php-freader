<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */



class log extends base
{
    protected $tableName = __CLASS__;

    public function __construct()
    {
        parent::base();
    }

    public static function status()
    {
        try {
            $log = new self;
            $log->db->get_var("select 1 from $log->tableName");
            if($log->hasError())
                throw new Exception ($log->db->last_error);
            return true;
        } catch(Exception $e) {
            return false;
        }
    }

    public static function usage()
    {
        $request = $_REQUEST;
        unset($request['password']);
        $data = array(
            'type' => __FUNCTION__,
            'user_id' => empty($_SESSION['user'])?null:$_SESSION['user']->id,
            'request_body' => empty($_REQUEST)?null:json_encode($request),
            'action' => empty($_REQUEST['action'])?null:$_REQUEST['action'],
            'user_agent' => empty($_SERVER['HTTP_USER_AGENT'])?null:$_SERVER['HTTP_USER_AGENT'],
            'remote_addr' => empty($_SERVER['REMOTE_ADDR'])?null:$_SERVER['REMOTE_ADDR'],
            'http_x_forwarded_for' => empty($_SERVER['HTTP_X_FORWARDED_FOR'])?null:$_SERVER['HTTP_X_FORWARDED_FOR'],
            'date_created' => 'now()',
        );
        $log = new self;
        $log->save($data,$log->tableName);
    }
}

