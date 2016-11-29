<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/10/4
 * Time: 9:16
 */
class LoginController extends CI_Controller{
    public function LoginController(){
        parent::__construct();
    }
    public function index(){
        $this->load->helper(array('form'));
        $this->load->view('view_login');
    }
}