<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/5
 * Time: 22:20
 */
class friendapi extends REST_Controller{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Friend_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['rank_get']['limit'] = 500; // 500 requests per hour per user/key
    }
    public function rank_get(){
        $user_id = $this->get('user');
        if ($user_id === NULL)
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'User is null, No friends were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        $user_id = (int) $user_id;
        $ranks = $this->Friend_model->getAllFriendRank($user_id);
        if (!empty($ranks))
        {
            $this->set_response($ranks, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => "ranks of $user_id could not be found"
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}