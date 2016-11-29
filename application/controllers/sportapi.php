<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/11/9
 * Time: 9:20
 */
class sportapi extends REST_Controller{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Sport_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['sport_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['sport_post']['limit'] = 100; // 100 requests per hour per user/key
    }

    public function sport_get()
    {
        $user_id = $this->get('user');

        $user_id = (int)$user_id;
        // Validate the id.
        if ($user_id <= 0) {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        $sports = $this->Sport_model->getSportByUser($user_id);
        if (!empty($sports)) {
            $this->set_response($sports, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => "sport data of user $user_id could not be found"
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }


    }

    public function sport_post() {
        //validation,Load support assets
        $this->load->helper(
            array('form','url','security')
        );

        // $this->some_model->create_something( ... );
        $user_id = $this->post('user_id');
        $time = $this->post('time');
        $distance = $this->post('distance');
        $calorie = $this->post('calorie');
        $avgspeed = $this->post('avg_speed');
        $topspeed = $this->post('top_speed');

        //validate value
        if(!preg_match('d{2}:d{2}:d{2}',$time)){
            $this->set_response([
                'status' => FALSE,
                'message' => "time format is not valid"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        if ($this->Sport_model->createSport($user_id,$time,$distance,$calorie,$avgspeed,$topspeed)) {
            $this->response(null, REST_Controller::HTTP_CREATED);
        }else{
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST);
        }
    }


}
