<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/*** Created by PhpStorm.* Date: 28.09.2017*/


Class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('login_model');
    }
    public function index() {
        if(isset($this->session->userdata['logged_in'])){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Нужно сначала выйти из текущей учетной записи</div>');
            redirect(base_url().'cartridge');
        }else{
            $this->load->view('header');
            $this->load->view('login_form');
            $this->load->view('footer');
        }
    }

// Show registration page
    public function user_registration_show() {
        if(isset($this->session->userdata['logged_in'])){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Нужно сначала выйти из текущей учетной записи</div>');
            redirect(base_url().'cartridge');
        }else {
            $this->load->view('header');
            $this->load->view('registration_form');
            $this->load->view('footer');
        }
    }
// Validate and store registration data in database
    public function new_user_registration() {
// Check validation for user input in SignUp form
        $this->form_validation->set_rules('username', 'Пользователь', 'trim|required');
        $this->form_validation->set_rules('password', 'Пароль', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('realname', 'Твоё имя', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('registration_form');
            $this->load->view('footer');
        } else {
            $data = array(
                'user_name' => $this->input->post('username'),
                'user_password' => $this->input->post('password'),
                'user_realname' => $this->input->post('realname')
            );
            $result = $this->login_model->registration_insert($data);
            if ($result == TRUE) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Регистрация прошла успешно - теперь можно залогиниться.</div>');
                $this->load->view('header');
                $this->load->view('login_form');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Пользователь с такими данными уже существует,пробуй другие</div>');
                $this->load->view('header');
                $this->load->view('registration_form');
            }
        }
    }
// Check for user login process
    public function user_login_process() {
        $this->form_validation->set_rules('username', 'Пользователь', 'trim|required');
        $this->form_validation->set_rules('password', 'Пароль', 'trim|required|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Добро пожаловать</div>');
                redirect(base_url().'cartridge');
            }else{
                $this->load->view('header');
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Введённые данные некоректные</div>');
                $this->load->view('login_form');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->login_model->login($data);
            if ($result == TRUE) {
                $username = $this->input->post('username');
                $result = $this->login_model->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->user_name,
                        'realname' => $result[0]->user_realname,
                        'access' => $result[0]->user_access,
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    redirect(base_url().'cartridge');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Введёные данные не верные</div>');
                $this->load->view('header');
                $this->load->view('login_form');
            }
        }
    }
// Logout
    public function logout() {
// Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">До скорых встреч</div>');
        $this->load->view('header');
        $this->load->view('login_form');
    }

    public function root_login()
    {
        $this->form_validation->set_rules('username', 'Пользователь', 'required');
        $this->form_validation->set_rules('pswrd', 'Пароль', 'required|min_length[6]');
        $logged_in = FALSE;
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Введёные данные не верные</div>');
            $this->load->view('header');
            $this->load->view('auth_managment');
        }
        else
        {
            if ($this->input->post('username') == "root" && $this->input->post('pswrd') == "password") {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Открыт доступ к редактированию пользователей<br> Пожалуйста аккуратней с этим,валидаций данных и систем защит на этой странице нету.<br></div>');
                $this->load->view('header');
                $this->load->model('users_model');
                $data['users'] = $this->users_model->get_all_users();
                $data['logged_in'] = TRUE;
                /*$logged_in = TRUE;*/
                $this->load->view('users_manage',$data);/*, $logged_in);*/
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Не угадал с данными</div>');
                $this->load->view('header');
                $this->load->view('auth_managment');
            }
        }
    }
}




?>