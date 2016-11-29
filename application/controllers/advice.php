<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/2
 * Time: 20:49
 */
class Advice extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(
            array('form','url','security')
        );
        $this->load->model('Advice_model');
        $this->load->database();
    }
    public function index() {
        $this->load->helper('url');
        $this->load->view('view_all_advice');
    }
}