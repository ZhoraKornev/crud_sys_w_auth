<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*** Created by PhpStorm.* Date: 24.10.2017*/


class Users_model extends CI_Model {

    var $table = 'user_login';

    public function get_all_users()
    {
        $sql = 'select * from user_login';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function update_details($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }








}