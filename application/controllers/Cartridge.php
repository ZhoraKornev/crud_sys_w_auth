<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/*** Created by PhpStorm.* Date: 28.09.2017*/
class Cartridge extends CI_controller
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('cartridge_model');
    }

    public function index()
    {
        $data['cartridges'] = $this->cartridge_model->get_all_from_db();
        $this->load->view('cartridge_details', $data);
    }
    public function addcartridgedata()
    {
        $today = getdate();
        $d = $today['mday'];
        $m = $today['mon'];
        $y = $today['year'];
        if($_POST)
        {
            $data = array('owner' => $this->input->post('owner'),
                'brand' => $this->input->post('brand'),
                'marks' => $this->input->post('marks'),
                'code' => $this->input->post('code'),
                'servicename' => $this->input->post('servicename'),
                'technical_life' => $this->input->post('technical_life'),
                'comments' => $this->input->post('comments'),
                'weight_before' => $this->input->post('weight_before'),
                'weight_after' => $this->input->post('weight_after'),
                'date_income' => date("$y-$m-$d")
            );
            if($this->cartridge_model->insertcartridge($data))
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Данные о картридже добавлены в базу данных</div>');
                redirect(base_url().'cartridge/addcartridgedata', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Чёт пошло не так</div>');
                redirect(base_url().'cartridge/addcartridgedata', 'refresh');
            }
        }
        else            {
                $this->load->view('add_cartridge');
        }
    }


    public function updatedetails($id)
    {
        $tmpdata['data'] = $this->cartridge_model->get_element_from_db($id);
        $this->data = array(
            //'id' =>$id,
            'owner' => $this->input->post('owner'),
            //'brand' => $this->input->post('brand'),
            //'marks' => $this->input->post('marks'),
            'code' => $this->input->post('code'),
            'servicename' => $this->input->post('servicename'),
            'technical_life' => $this->input->post('technical_life'),
            'comments' => $this->input->post('comments'),
            'weight_before' => $this->input->post('weight_before'),
            'weight_after' => $this->input->post('weight_after'),
            'date_income' => $this->input->post('date_income'),
            'date_outcome' => $this->input->post('date_outcome'),
            'inservice' => ($this->input->post('date_income') < $this->input->post('date_outcome') ? 1 :0)); //($speed <= 60) ? "Скорость в пределах нормы" : "Превышение скорости !";
        if ($_POST)
        {
            if($this->cartridge_model->get_log($id) >0)
            {
                $this->story_update($id,$this->data);
            }

            if($this->cartridge_model->update_details($this->data, $id) > 0)
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Данные зашли в базу данных</div>');
                redirect(base_url().'cartridge/updatedetails/'.$id, 'refresh');
            }
            else
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Что-то пошло не так...</div>');
                redirect(base_url().'cartridge/updatedetails/'.$id, 'refresh');
            }
        }
        else
        {
            $this->load->view('edit_details',$tmpdata);
        }
    }
    public function deletedetails($id)
    {
        $this->cartridge_model->delete_details($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">удаленo</div>');
        redirect(base_url().'cartridge/');
    }


    public function story($id)
    {
        $data ['item'] = $this->cartridge_model->get_element_from_db($id);
        $data ['stories'] = $this->cartridge_model->get_story($id);
        $this->load->view('story_of_element',$data);
    }


    public function story_update($id,$data_from_form){
        $story_from_db = $this->cartridge_model->get_story($id)[0];
        $item_from_db = $this->cartridge_model->get_element_from_db($id)[0];
        $current_info_db = implode("||",$item_from_db);
        $today = getdate();
        $d = $today['mday'];
        $m = $today['mon'];
        $y = $today['year'];
        $name = " ".($this->session->userdata['logged_in']['username'])." имя ".($this->session->userdata['logged_in']['realname']);
        if(isset($story_from_db['id']))
        {
            $log =  $this->cartridge_model->get_log($id)['log'];
            $log_full_old = $this->cartridge_model->get_log($id)['log_full'];
        }
        else{
            $this->cartridge_model->get_log($id);
            $log =  $this->cartridge_model->get_log($id)['log'];
            $log_full_old = $this->cartridge_model->get_log($id)['log_full'];
        }
        foreach ($data_from_form as $key=>$value) {
            if (isset($item_from_db[$key]))
            {
                if ($value !== $item_from_db[$key])
                {
                    $logtmp = " Новое событие ".date("$d.$m.$y")." ключ ||".$key."|| с данными  **".$item_from_db[$key]."**изменилось на**".$value."** "."Внёс изменения пользователь".$name."\n";
                    $log .= $logtmp;
                }
            }
            if (isset($story_from_db[$key])) {
                if ($value !== $story_from_db[$key]) {
                    $story[$key] = $value;
                }
            }
        }
        $new_info = implode("||",$data_from_form);
        $log_full =  $log_full_old."  "."Изменения были ".date("$d.$m.$y")." от пользователя ".$name." данные: **".$current_info_db."** изменились на новые данные  **".$new_info."** конец. \n";
        if ($log !== $this->cartridge_model->get_log($id)['log']){
        $story ['log'] = $log;
        unset($log);
        $story['log_full'] = $log_full;
        $story['id_item'] = $id;
        $story['date_of_changes'] = date("$y-$m-$d");
        $this->cartridge_model->story_new_row($id, $story);
        }

    }

}