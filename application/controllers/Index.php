<?php

/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/11/29
 * Time: 上午2:16
 */
class Index extends CI_Controller
{ function __construct() {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->library('session');
    $this->load->helper('cookie');
    $this->load->helper('form');
}
    function index(){
        $this->load->view('other/index');
    }

}