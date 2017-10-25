<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/*** Created by PhpStorm.* Date: 17.10.2017*/

class Main extends CI_Controller
{
public function index()
{
    $this->load->view('header');
    $this->load->view('main_view');
    $this->load->view('footer');
}

    public function auth_systems(){
    $this->load->view('header');
    $this->load->view('auth_managment');
    $this->load->view('footer');
    }

    public function manage_users()
    {
        $this->load->view('header');
        $this->load->view('users_manage');
        $this->load->view('footer');
    }


    public function instruction()
    {
        $this->load->view('header');
        $this->load->view('instruction');
        $this->load->view('footer');
    }


}

