<?php
/*
 * This file is part of the PHP Freader version 1.1 package.
 *
 * (c) Ming Teoh <http://www.linkedin.com/in/mingteoh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */



class base
{
    protected $db;

    protected function base()
    {
        $this->db = ezSQL_mysql::get_instance(DB_USER,DB_PASSWORD,DB_NAME);
        $this->tableName = DB_PREFIX . $this->tableName;
    }

    protected function save($data, $table, $whereClause=null)
    {
        if (empty($whereClause)) {
            $query = 'insert into ' . $table . ' (';
            while (list($columns, ) = each($data)) {
                $query .= $columns . ', ';
            }
            $query = substr($query, 0, -2) . ') values (';
            reset($data);
            while (list(, $value) = each($data)) {
                switch ((string)$value) {
                case 'now()':
                    $query .= 'now(), ';
                    break;
                case 'null':
                    $query .= 'null, ';
                    break;
                default:
                    $query .= '\'' . $this->db->escape($value) . '\', ';
                    break;
                }
            }
            $query = substr($query, 0, -2) . ')';
        } else {
            $query = 'update ' . $table . ' set ';
            while (list($columns, $value) = each($data)) {
                switch ((string)$value) {
                case 'now()':
                    $query .= $columns . ' = now(), ';
                    break;
                case 'null':
                    $query .= $columns .= ' = null, ';
                    break;
                default:
                    $query .= $columns . ' = \'' . $this->db->escape($value) . '\', ';
                    break;
                }
            }
            $query = substr($query, 0, -2) . ' where ' . $whereClause;
        }
        $this->db->query($query);

        return empty($whereClause) ? $this->db->insert_id : $this->db->rows_affected;
    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function delete($table, $whereClause)
    {
        $query = 'delete from ' . $table . ' where ' . $whereClause;
        $this->db->query($query);
        return $this->db->rows_affected;
    }

    public function hasError()
    {
        return !empty($this->db->last_error);
    }
}
