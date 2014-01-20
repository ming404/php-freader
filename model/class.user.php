<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */



class user extends base
{
    public $id;
    public $email;
    public $firstName;
    public $lastName;
    public $password;
    public $accessLevel;
    public $preference;
    public $status;
    public $dateCreated;
    public $lastUpdated;

    //$user->channels[tag_id][channels], where tag_id=0 = untagged subscription
    public $channels;
    public $tags;

    public $defaultPreference = '{"sort":"latest","mode":"unread","class":"special","id":"allitems"}';

    protected $tableName = __CLASS__;

    const ACCESS_LEVEL_SU = 100;
    const ACCESS_LEVEL_USER = 10;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_BANNED = -1;

    public function __construct()
    {
        parent::base();
    }

    public static function getBy($column,$needle)
    {
        $user = new self;
        $data = $user->db->get_row("select * from $user->tableName where $column='".$user->db->escape($needle)."'");
        if(!empty($data->id))
        {
            $user->id = $data->id;
            $user->email = $data->email;
            $user->firstName = $data->first_name;
            $user->lastName = $data->last_name;
            $user->accessLevel = $data->access_level;
            $user->preference = empty($data->preference)?json_decode($user->defaultPreference):json_decode($data->preference);
            $user->status = $data->status;
            $user->dateCreated = $data->date_created;
            $user->lastUpdated = $data->last_updated;

            $ucl = new user_channel_link;
            $user->channels = $ucl->getUserChannels($user);
            unset($ucl);

            $tag = new tag;
            $user->tags = $tag->getAllByUser($user);

            unset($data);
        }

        return $user;
    }

    public function save()
    {
        $data = array(
            'email' => $this->email,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'access_level' => $this->accessLevel,
            'preference' => json_encode($this->preference),
            'status' => $this->status,
            'last_updated' => 'now()',
        );

        try
        {
            if(empty($this->id))
            {
                $data['date_created'] = 'now()';
                $this->id = parent::save($data,$this->tableName);
            }
            else
                parent::save($data,$this->tableName,"id='$this->id'");
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    public function updatePassword($password)
    {
        $data = array(
            'password' => $this->db->escape(hash(HASH_METHOD,SALT.$password)),
            'last_updated' => 'now()',
        );

        try
        {
            parent::save($data,$this->tableName,"id='$this->id'");
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    public function verifyPassword($password)
    {
        $data = $this->db->get_var("select 1 as result from $this->tableName where id='$this->id' and password='".$this->db->escape(hash(HASH_METHOD,SALT.$password))."'");
        return !empty($data);
    }

    public function hasChannel($channel)
    {
        if(!empty($this->channels))
        {
            foreach($this->channels as $tag)
            {
                foreach($tag as $userChannel)
                {
                    if(strcmp($userChannel->guid,$channel->guid)==0)
                        return true;
                }
            }
        }

        return false;
    }

    public function subscribe($channel)
    {
        $ucl = new user_channel_link;
        if($ucl->addUserChannel($this,$channel))
            $this->channels[0][] = $channel;
    }

    public function unsubscribe($channel)
    {
        $ucl = new user_channel_link;
        if($ucl->removeUserChannel($this,$channel))
        {
            if(!empty($this->channels))
            {
                foreach($this->channels as $tag_id=>$tag)
                {
                    foreach($tag as $idx => $userChannel)
                    {
                        if(strcmp($userChannel->guid,$channel->guid)==0)
                        {
                            unset($this->channels[$tag_id][$idx]);
                            return;
                        }
                    }
                }
            }
        }
    }

    public function getName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function import($opml)
    {
        $xml = @simplexml_load_string($opml);
        if(!$xml) return false;

        $uclObj = new user_channel_link;
        $results = array("tag"=>0,"channel"=>0);

        foreach($xml->body->outline as $outline)
        {
            if(count($outline->outline))
            {
                //tag with channels
                $tag = tag::getBy('name', $outline['title'], $this);
                if(!$tag->id)
                {
                    $tag->name = (string) $outline['title'];
                    $tag->userId = $this->id;
                    $tag->save();
                    $results['tag']++;
                }
                foreach($outline->outline as $channel)
                {
                    $ch = channel::getBy('guid', guid($channel['xmlUrl']));
                    if($ch->isNew()) {
                        $ch->feedUrl = (string) $channel['xmlUrl'];
                        $ch->title = (string) $channel['title'];
                        $ch->htmlUrl = (string) $channel['link'];
                        $ch->save();
                        $results['channel']++;
                    }
                    if(!$this->hasChannel($ch))
                        $uclObj->addUserChannel($this,$ch);
                    $uclObj->tagUserChannel($this,$ch,$tag);
                }
            }
            else if(!empty($outline['xmlUrl']))
            {
                $channel = $outline;
                $ch = channel::getBy('guid', guid($channel['xmlUrl']));
                if($ch->isNew()) {
                    $ch->feedUrl = (string) $channel['xmlUrl'];
                    $ch->title = (string) $channel['title'];
                    $ch->htmlUrl = (string) $channel['link'];
                    $ch->save();
                    $results['channel']++;
                }
                if(!$this->hasChannel($ch))
                    $uclObj->addUserChannel($this,$ch);
            }
        }
        return $results;
    }

    public function export()
    {
        $xml = simplexml_load_string('<?xml version="1.0" encoding="UTF-8"?><opml version="1.0"><head><title>'.  ucfirst($this->firstName).' subscriptions in '.SITE_NAME.'</title></head><body></body></opml>');
        if(!empty($this->tags))
        {
            foreach($this->tags as $tag_id => $tagObj)
            {
                if(!empty($this->channels[$tag_id]))
                {
                    $tag = $xml->body->addChild('outline');
                    $tag->addAttribute('text',$tagObj->name);
                    $tag->addAttribute('title',$tagObj->name);
                    foreach($this->channels[$tag_id] as $channelObj)
                    {
                        $channel = $tag->addChild('outline');
                        $channel->addAttribute('text',$channelObj->title);
                        $channel->addAttribute('title',$channelObj->title);
                        $channel->addAttribute('type','rss');
                        $channel->addAttribute('xmlUrl',$channelObj->feedUrl);
                        $channel->addAttribute('htmlUrl',$channelObj->link);
                    }
                }
            }
            if(!empty($this->channels[0]))
            {
                foreach($this->channels[0] as $channelObj)
                {
                    $channel = $xml->body->addChild('outline');
                    $channel->addAttribute('text',$channelObj->title);
                    $channel->addAttribute('title',$channelObj->title);
                    $channel->addAttribute('type','rss');
                    $channel->addAttribute('xmlUrl',$channelObj->feedUrl);
                    $channel->addAttribute('htmlUrl',$channelObj->link?$channelObj->link:$channelObj->feedUrl);
                }
            }
        }
        return $xml->asXML();
    }

    public function isActive()
    {
        return $this->status == self::STATUS_ACTIVE;
    }
}

