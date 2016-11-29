<?php

/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/11/29
 * Time: 上午1:58
 */


class Login extends CI_Controller
{ function __construct() {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->library('session');
    $this->load->helper('cookie');
    $this->load->helper('form');
}
function index(){
    $this->load->view('login/cover');
}
function loginini(){
    $this->load->view('login/login');
}
    function login() {
        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $username =  $this->input->post('email');
        $password =  $this->input->post('password');

        if($this->form_validation->run() == TRUE){
            if($this->check_database($username,$password)){
                    redirect('Index/index');
            }else{
                $this->load->view('login/login');
            }
        }else{
            $this->load->view('login/login');
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

    function hello(){
        $result = DB::table('user')->get();

        echo $result;
    }
}