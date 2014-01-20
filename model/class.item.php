<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */



class item extends base
{
    public $id;
    public $channelId;
    public $guid;
    public $title;
    public $link;
    public $description;
    public $pubDate;
    public $creator;

    public $read;
    public $star;
    public $uiLinkId;

    public $tableName = __CLASS__;
    private $uiLinkTableName = 'user_item_link';

    public function __construct()
    {
        parent::base();
        $this->uiLinkTableName = DB_PREFIX . $this->uiLinkTableName;
    }

    public static function createFromXML($xml)
    {
        $namespaces = $xml->getNameSpaces(true);

        $item = new self;
        $item->title = (string) $xml->title;

        $content = !empty($namespaces['content'])?$xml->children($namespaces['content']):new stdClass();
        if(!empty($content->encoded))
            $item->description = (string) $content->encoded;
        else if(!empty($xml->content))
            $item->description = (string) $xml->content;
        else if(!empty($xml->description))
            $item->description = (string) $xml->description;
        else {
        }

        if(!empty($xml->link))
            $item->link = (string) $xml->link;
        else{
            foreach($xml->link->attributes() as $key => $value) {
                if($key == 'href') {
                    $item->link = (string) $value;
                    break;
                }

            }
        }
        if(!empty($xml->guid))
            $item->guid = guid((string)$xml->guid);
        if(!empty($xml->id))
            $item->guid = guid((string)$xml->id);
        else
            $item->guid = guid($item->title.$item->link);
        if(!empty($xml->pubDate))
            $item->pubDate = (string) $xml->pubDate;
        else
            $item->pubDate = date(DATE_RSS);
        $item->pubDate = date(DATE_ATOM,strtotime($item->pubDate));
        if(!empty($xml->author->name))
            $item->creator = (string) $xml->author->name;
        else if(!empty($xml->author))
            $item->creator = (string) $xml->author;
        else if(!empty($namespaces['dc'])) {
            $dc = $xml->children($namespaces['dc']);
            if(!empty($dc->creator))
                $item->creator = (string) $dc->creator;
        }
        else
            $item->creator = "";

        return $item;
    }

    public static function getBy($column,$needle,$user)
    {
        $item = new self;
        $data = null;
        if(empty($user))
            $data = $item->db->get_row("select $item->tableName.* from $item->tableName where $item->tableName.$column='".$item->db->escape($needle)."'");
        else
            $data = $item->db->get_row("select $item->tableName.*, $item->uiLinkTableName.id as uilinkid from $item->tableName left join $item->uiLinkTableName on $item->tableName.id=$item->uiLinkTableName.item_id and $item->uiLinkTableName.user_id='$user->id' where $item->tableName.$column='".$item->db->escape($needle)."'");
        if(!empty($data->id))
        {
            $item->id = $data->id;
            $item->channelId = $data->channel_id;
            $item->guid = $data->guid;
            $item->title = $data->title;
            $item->link = $data->link;
            $item->description = $item->wrapTag($data->description);
            $item->creator = $data->creator;
            $item->pubDate = $data->pub_date;
            $item->read = !empty($data->read);
            $item->star = !empty($data->star);
            $item->uiLinkId = empty($data->uilinkid)?'':$data->uilinkid;

            unset($data);
        }

        return $item;
    }

    public static function getAll($user,$channels=null,$sortBy=null,$read=null,$star=null,$limit=20,$offset=0)
    {
        $item = new self;
        $items = array();
        $query = "select $item->tableName.id, $item->tableName.channel_id, $item->tableName.guid, $item->tableName.title, $item->tableName.link, $item->tableName.description, $item->tableName.creator, $item->tableName.pub_date, $item->uiLinkTableName.read, $item->uiLinkTableName.star, $item->uiLinkTableName.id as uilinkid "
                    . " from $item->tableName left join $item->uiLinkTableName on $item->tableName.id=$item->uiLinkTableName.item_id and $item->uiLinkTableName.user_id='$user->id' where 1=1";
        if(!empty($channels))
        {
            $channelIds = array();
            foreach($channels as $channel)
                $channelIds[] = is_string($channel)?$channel:$channel->id;
            $query .= " and $item->tableName.channel_id in (".implode(',',$channelIds).")";
        }
        if($read === false)
            $query .= " and ($item->uiLinkTableName.id is null or $item->uiLinkTableName.read is null)";
        if($star === true)
            $query .= " and ($item->uiLinkTableName.id is not null and $item->uiLinkTableName.star is not null)";
        if(empty($sortBy))
            $sortBy = '$item->tableName.pub_date desc';
        $query .= " order by $sortBy";
        $query .= " limit $offset, $limit";

        $rows = $item->db->get_results($query);
        if(!empty($rows))
        {
            foreach($rows as $data)
            {
                $item = new self;
                $item->id = $data->id;
                $item->channelId = $data->channel_id;
                $item->guid = $data->guid;
                $item->title = $data->title;
                $item->link = $data->link;
                $item->description = $item->wrapTag($data->description);
                $item->creator = $data->creator;
                $item->pubDate = $data->pub_date;
                $item->read = !empty($data->read);
                $item->star = !empty($data->star);
                $item->uiLinkId = $data->uilinkid;

                $items[] = $item;
            }
        }
        unset($rows);

        return $items;
    }

    static public function getBySearch($user,$text,$sortBy=null,$read=null,$star=null,$limit=20,$offset=0)
    {
        $item = new self;
        $items = array();
        $query = "select $item->tableName.id, $item->tableName.channel_id, $item->tableName.guid, $item->tableName.title, $item->tableName.link, $item->tableName.description, $item->tableName.creator, $item->tableName.pub_date, $item->uiLinkTableName.read, $item->uiLinkTableName.star, $item->uiLinkTableName.id as uilinkid "
                    . " from $item->tableName left join $item->uiLinkTableName on $item->tableName.id=$item->uiLinkTableName.item_id and $item->uiLinkTableName.user_id='$user->id' where"
                    . " $item->tableName.description like '%".  mysql_real_escape_string($text)."%'"
                    . " or $item->tableName.title like '%".  mysql_real_escape_string($text)."%'";
        if(empty($sortBy))
            $sortBy = "$item->tableName.pub_date desc";
        $query .= " order by $sortBy";
        $query .= " limit $offset, $limit";

        $rows = $item->db->get_results($query);
        if(!empty($rows))
        {
            foreach($rows as $data)
            {
                $item = new self;
                $item->id = $data->id;
                $item->channelId = $data->channel_id;
                $item->guid = $data->guid;
                $item->title = $data->title;
                $item->link = $data->link;
                $item->description = $item->wrapTag($data->description);
                $item->creator = $data->creator;
                $item->pubDate = $data->pub_date;
                $item->read = !empty($data->read);
                $item->star = !empty($data->star);
                $item->uiLinkId = $data->uilinkid;

                $items[] = $item;
            }
        }
        unset($rows);

        return $items;
    }

    public function save()
    {
        $test = item::getBy('guid', $this->guid,null);
        if($test)
            $this->id = $test->id;
        $data = array(
            'guid' => $this->guid,
            'channel_id' => $this->channelId,
            'title' => $this->title,
            'link' => $this->link,
            'description' => $this->description,
            'creator' => $this->creator,
            'pub_date' => $this->pubDate,
        );

        try
        {
            if(empty($this->id))
                $this->id = parent::save($data,$this->tableName);
            else
                parent::save($data,$this->tableName,"id='$this->id'");
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    public function star($user)
    {
        $data = array(
            'star' => 'now()',
            'user_id' => $user->id
        );
        $this->setAttribute($data);
        $this->star = true;
    }

    public function unstar($user)
    {
        $data = array(
            'star' => 'null',
            'user_id' => $user->id
        );
        $this->setAttribute($data);
        $this->star = null;
    }

    public function read($user)
    {
        $data = array(
            '`read`' => 'now()',
            'user_id' => $user->id
        );
        $this->setAttribute($data);
        $this->read = true;
    }

    public function unread($user)
    {
        $data = array(
            '`read`' => 'null',
            'user_id' => $user->id
        );
        $this->setAttribute($data);
        $this->read = null;
    }

    private function setAttribute($data)
    {
        if(!$this->uiLinkId) {
            $data['item_id'] = $this->id;
            $this->uiLinkId = parent::save($data,$this->uiLinkTableName);
        } else {
            parent::save($data,$this->uiLinkTableName,"id='$this->uiLinkId'");
        }
    }

    public function bulkRead($user,$channelIds,$date)
    {
        $query = "INSERT INTO $this->uiLinkTableName (user_id,item_id,`read`) SELECT 1, id, now() FROM $this->tableName WHERE pub_date < '$date' and channel_id in ($channelIds) ON DUPLICATE KEY UPDATE `read`=now()";
        $this->db->query($query);

        return $this->db->rows_affected;
    }

    public static function countUnreadByChannel($user,$channelIds)
    {
        $channels = array();
        $item = new self;
        $query = "select $item->tableName.channel_id, count($item->tableName.id) as total from $item->tableName left join $item->uiLinkTableName on $item->tableName.id=$item->uiLinkTableName.item_id and $item->uiLinkTableName.user_id='$user->id' where $item->uiLinkTableName.read is null and $item->tableName.channel_id in ($channelIds) group by $item->tableName.channel_id";
        $rows = $item->db->get_results($query);
        if(count($rows)) {
            foreach($rows as $data)
                $channels[$data->channel_id] = $data->total;
        }
        return $channels;
    }

    private function wrapTag($html)
    {
        return preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html);
    }
}
