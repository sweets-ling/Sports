<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/2
 * Time: 20:50
 */
class Statistics extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(
            array('form','url','security')
        );
        $this->load->database();
    }
    public function index() {
        $this->load->helper('url');
        $this->load->view('view_statistics');
    }
}