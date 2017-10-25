<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*** Created by PhpStorm.* Date: 28.09.2017*/
class Cartridge_model extends CI_Model
{
    public function get_all_from_db()
    {
        $sql = 'select * from cartridgedb';
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function insertcartridge($data)
    {
        return $this->db->insert('cartridgedb', $data);
    }

    public function update_details($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('cartridgedb', $data);
        return $this->db->affected_rows();
    }

    public function get_element_from_db($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('cartridgedb');
        return $query->result_array();
    }

    public function get_log($id)
    {
        $this->db->order_by('id','desc');
        $this->db->where('id_item', $id);
        $query = $this->db->get('story');
        $row = $query->row_array();

        if (isset($row)) {
            //echo "result";
            //return $query->result_array();
            return $row;
        }
        else{
            $today = getdate();        $d = $today['mday'];        $m = $today['mon'];        $y = $today['year'];
            //echo "insert";
            $new_row = array('id_item' => $id,'log' => "Старт лога ".date("$d.$m.$y"),'log_full' => "Старт журнала ".date("$d.$m.$y"),'date_of_changes ' => date("$y-$m-$d"));
            $this->db->where('id', $id);
            $this->db->insert('story',$new_row);
            return $new_row;
        }
    }

    public function get_story($id)
    {
        $this->db->where('id_item', $id);
        $query = $this->db->get('story');
        $row = $query->row_array();
        if (isset($row)) {
            //echo "result";
            return $query->result_array();
            //return $row;
        }
        else{
            $today = getdate();        $d = $today['mday'];        $m = $today['mon'];        $y = $today['year'];
            //echo "insert";
            $new_row = array('id_item' => $id,'log' => "Старт лога ".date("$d.$m.$y"),'log_full' => "Старт журнала ".date("$d.$m.$y"),'date_of_changes ' => date("$y-$m-$d"));
            $this->db->where('id', $id);
            $this->db->insert('story',$new_row);
            return $new_row;
        }
    }

    public function update_log($id,$story)
    {
        $this->db->order_by('id','desc');
        $this->get_story($id);
        $this->db->where('id_item', $id);
        return $this->db->update('story', $story);
    }

    public function story_new_row($id,$story)
    {
        $this->get_story($id);
        $this->db->where('id_item', $id);
        return $this->db->insert('story', $story);
    }

    public function delete_details($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cartridgedb');
    }

}