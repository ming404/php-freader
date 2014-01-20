<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */



class user_channel_link extends base
{
    protected $tableName = __CLASS__;

    public function __construct()
    {
        parent::base();
    }

    public function getUserChannels($user,$tag=null)
    {
        $channels = array();
        $query = "select channel_id, tag_id from $this->tableName where user_id='$user->id'";
        if(!is_null($tag))
            $query .= " and tag_id = $tag->id";
        $culs = $this->db->get_results($query);
        if(empty($culs)) return $channels;
        foreach($culs as $cul) {
            $tag_id = empty($cul->tag_id) ? '0' : $cul->tag_id;
            $channel = channel::getBy('id',$cul->channel_id);
            $unreads = item::countUnreadByChannel($user, $cul->channel_id);
            $channel->unreadCount = empty($unreads[$cul->channel_id])?0:(int)$unreads[$cul->channel_id];
            $channels[$tag_id][] = $channel;
        }

        return !is_null($tag)?$channels[$tag->id]:$channels;
    }

    public function getUserChannelIds($user,$tag=null)
    {
        $channels = array();
        $query = "select channel_id from $this->tableName where user_id='$user->id'";
        if($tag)
            $query .= " and tag_id='$tag->id'";
        $culs = $this->db->get_results($query);
        if(empty($culs)) return $channels;
        foreach($culs as $cul)
            $channels[] = $cul->channel_id;

        return $channels;
    }

    public function addUserChannel($user,$channel)
    {
        $data = array(
            "channel_id" => $channel->id,
            "user_id" => $user->id,
            "date_created" => 'now()'
        );
        $id = $this->save($data,$this->tableName);
        return !empty($id);
    }

    public function removeUserChannel($user,$channel)
    {
        return $this->delete($this->tableName,"channel_id = '$channel->id' and user_id='$user->id'");
    }

    public function tagUserChannel($user,$channel,$tag)
    {
        return $this->db->query("update $this->tableName set tag_id=$tag->id where user_id='$user->id' and channel_id='$channel->id'");
    }

    public function untagUserChannel($user,$channel)
    {
        return $this->db->query("update $this->tableName set tag_id=NULL where user_id='$user->id' and channel_id='$channel->id'");
    }

    public static function getActiveChannels()
    {
        $channels = array();
        $ucl = new self;
        $channelIds = $ucl->db->get_results("select distinct channel_id from $ucl->tableName");
        if(!empty($channelIds))
        {
            foreach($channelIds as $ch)
                $channels[] = channel::getBy ('id', $ch->channel_id);
        }
        return $channels;
    }
}
