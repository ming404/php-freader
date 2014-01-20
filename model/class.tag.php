<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */



class tag extends base
{
    public $id;
    public $name;
    public $userId;

    protected $tableName = __CLASS__;

    public function __construct()
    {
        parent::base();
    }

    public static function getBy($column,$needle,$user)
    {
        $tag = new self;
        $data = $tag->db->get_row("select * from $tag->tableName where $column='".$tag->db->escape($needle)."' and user_id='$user->id'");
        if(!empty($data->id))
        {
            $tag->id = $data->id;
            $tag->name = $data->name;
            $tag->userId = $user->id;
            
            unset($data);
        }

        return $tag;
    }

    public function getAllByUser($user)
    {
        $data = $this->db->get_results("select * from $this->tableName where user_id='$user->id' order by name");
        $tags = array();
        if(!empty($data))
        {
            foreach($data as $row)
            {
                $tag = new tag;
                $tag->id = $row->id;
                $tag->name = $row->name;
                $tag->userId = $row->user_id;
                $tags[$row->id] = $tag;
            }
        }
        return $tags;
    }

    public function save()
    {
        $data = array(
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->userId,
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

    public function delete()
    {
        try {
            parent::delete($this->tableName, "id='$this->id'");
        } catch (Exception $e) {
            return false;
        }
    }
}

