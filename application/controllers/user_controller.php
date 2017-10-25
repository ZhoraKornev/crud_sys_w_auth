<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: ASUP7
 * Date: 24.10.2017
 * Time: 15:58
 */
class User_controller extends CI_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('users_model');
    }

    public function delete_user($id){
        $this->users_model->delete_user($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Удаленo</div>');
        echo json_encode(array("status" => TRUE));

    }

    public function update_details()
    {
        $data = array(
            'user_name' => $this->input->post('user_name'),
            'user_realname' => $this->input->post('user_realname'),
            'user_password' => $this->input->post('user_password'),
            'user_access' => $this->input->post('user_access'),
        );
        $id = $this->input->post('id');
        $this->users_model->update_details($data,$id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {
        $data = $this->users_model->get_by_id($id);
        echo json_encode($data);
    }






}

