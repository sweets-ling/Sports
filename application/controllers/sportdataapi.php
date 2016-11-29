<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/4
 * Time: 19:26
 */
class sportdataapi extends REST_Controller{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Sport_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['sport_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['sport_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['sport_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
    public function sport_get() {
        $user_id = $this->get('user');

        //if the sponsorid not exists,return all the activities;
        if($user_id === NULL) {
            $this->response([
                'status' => FALSE,
                'message' => 'No user param in get request,sport data not found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        else {
            $user_id = (int)$user_id;
            // Validate the id.
            if ($user_id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }
            $sports = $this->Sport_model->getSportByUser($user_id);
            if(!empty($sports)) {
                $this->set_response($sports, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else {
                $this->set_response([
                    'status' => FALSE,
                    'message' => "sport of user $user_id could not be found"
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }
}