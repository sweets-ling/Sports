<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/10/22
 * Time: 16:44
 */
class Activity extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(
            array('form','url','security')
        );
        $this->load->model('Activity_model');
        $this->load->database();
    }
    public function index() {
        $this->load->helper('url');
        $this->load->view('view_all_activity');
    }
}