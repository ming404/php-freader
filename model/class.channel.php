<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */



class channel extends base
{
    public $id;
    public $guid;
    public $feedUrl;
    public $title;
    public $link;
    public $description;
    public $language;
    public $ttl;
    public $imageTitle;
    public $imageUrl;
    public $imageLink;
    public $lastBuildDate;
    public $unreadCount;

    protected $tableName = __CLASS__;

    public function __construct()
    {
        parent::base();
    }

    public function updateFromXML($xml)
    {
        try
        {
            $channel = $xml->getName()=='feed' ? $xml : $xml->channel;
            $this->title = (string) $channel->title;
            if(count($channel->link)){  //feed
                foreach($channel->link[0]->attributes() as $key => $value) {
                    if($key == 'href') {
                        $this->link = (string) $value;
                        break;
                    }
                }
                if(empty($this->link))
                    $this->link = (string) $channel->link;
            }
            if(!empty($channel->description))
                $this->description = (string) $channel->description;
            else if(!empty($channel->subtitle))
                $this->description = (string) $channel->subtitle;
            if(!empty($channel->language))
                $this->language = (string) $channel->language;
            if(!empty($channel->ttl))
                $this->ttl = (string) $channel->ttl;
            if(!empty($channel->image->title))
                $this->imageTitle = (string) $channel->image->title;
            if(!empty($channel->image->url))
                $this->imageUrl = (string) $channel->image->url;
            if(!empty($channel->image->link))
                $this->imageLink = (string) $channel->image->link;
             $this->lastBuildDate = date(DATE_ATOM);

            if(empty($this->title))
                throw new Exception('Not able to retrieve feed contents');
            $this->save();
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public function updateFromRemote($xml=null)
    {
        try
        {
            $itemCount = 0;
            if(is_null($xml)) {
                try {
                    $xmlRaw = url_get_contents($this->feedUrl);
                    if(empty($xmlRaw))
                        $xmlRaw = file_get_contents($this->feedUrl); // second change
                    if(empty($xmlRaw))
                        throw new Exception("Failed to get feed contents");
                    $xml = simplexml_load_string_sanity($xmlRaw);
                }catch(Exception $e) {
                    return $itemCount;
                }
            }
            $this->updateFromXML($xml);
            if(count($xml->channel->item)) {
                foreach($xml->channel->item as $itemxml) {
                    $item = item::createFromXML($itemxml);
                    $item->channelId = $this->id;
                    if($item->save())
                        $itemCount++;
                    unset($item);
                }
            }
            else if(count($xml->entry)) {
                foreach($xml->entry as $itemxml) {
                    $item = item::createFromXML($itemxml);
                    $item->channelId = $this->id;
                    if($item->save())
                        $itemCount++;
                    unset($item);
                }
            }
            unset($xml);
            return $itemCount;
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public static function getBy($column,$needle)
    {
        $channel = new self;
        $data = $channel->db->get_row("select * from $channel->tableName where $column='".$channel->db->escape($needle)."'");
        if(!empty($data->id))
        {
            $channel->id = $data->id;
            $channel->guid = $data->guid;
            $channel->feedUrl = $data->feed_url;
            $channel->title = $data->title;
            $channel->link = $data->link;
            $channel->description = $data->description;
            $channel->language = $data->language;
            $channel->imageTitle = $data->image_title;
            $channel->imageUrl = $data->image_url;
            $channel->imageLink = $data->image_link;
            $channel->lastBuildDate = $data->last_build_date;

            unset($data);
        }

        return $channel;
    }

    public function save()
    {
        if(empty($this->guid))
            $this->guid = guid($this->feedUrl);
        $data = array(
            'guid' => $this->guid,
            'feed_url' => $this->feedUrl,
            'title' => $this->title,
            'link' => $this->link,
            'description' => $this->description,
            'language' => $this->language,
            'image_title' => $this->imageTitle,
            'image_url' => $this->imageUrl,
            'image_link' => $this->imageLink,
            'last_build_date' => $this->lastBuildDate,
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
}
