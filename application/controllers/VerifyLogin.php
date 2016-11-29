<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/2
 * Time: 16:57
 */
class VerifyLogin extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('cookie');
    }
    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $username =  $this->input->post('username');
        $password =  $this->input->post('password');
        if($this->form_validation->run() == TRUE){
            if($this->check_database($username,$password)){
                if($this->session->authority == 4){
                    redirect('users');
                }else{
                    redirect('activity');
                }

            }else{
                $this->load->view('view_login');
            }
        }else{
            $this->load->view('view_login');
        }

    }

    function check_database($username,$password)
    {
        //Field validation succeeded.  Validate against database
        //query the database

        $result = $this->User_model->log_in($username, $password);

        if($result){
            foreach($result as $row)
            {
                $userinfo = array(
                    'id'=>$row['id'],
                    'username'=>$row['name'],
                    'authority'=>$row['authority'],
                    'email'=>$row['email']
                );
                $this->session->set_userdata($userinfo);

            }
            return TRUE;
        }else{
            return false;
        }
    }
}