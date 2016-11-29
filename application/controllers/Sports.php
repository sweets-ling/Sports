<?php

/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/11/29
 * Time: 上午10:46
 */
class Sports extends CI_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Sleep_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['sleep_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['sleep_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['sleep_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function sleep_get()
    {
        $type = $this->get('type');
        if($type != NULL){
            $user_id = $this->get('user');
            if($type == 'weekday' && $user_id!=NULL){
                $weekSleep = $this->Sleep_model->getSleepByWeekdayUser($user_id);
                $this->set_response($weekSleep, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }else{
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }
        }else{
            $user_id = $this->get('user');

            // If the id parameter doesn't exist return all the users

            if ($user_id === NULL)
            {

                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'User_id is null, No sleep data were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

            }


            // Find and return a single record for a particular user.

            $user_id = (int) $user_id;

            // Validate the id.
            if ($user_id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retreival.
            // Usually a model is to be used for this.

            $sleepData = $this->Sleep_model->getSleepByUser($user_id);
            if (!empty($sleepData))
            {
                $this->set_response($sleepData, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => "Sleep data of $user_id could not be found"
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

    }

    public function sleep_post()
    {
        //validation,Load support assets
        $this->load->helper(
            array('form','url','security')
        );

        // $this->some_model->update_weight( ... );
        $user_id = $this->post('user');
        $begin_time = $this->post('begin');
        $end_time = $this->post('end');
        $eff_time = $this->post('eff');
        if($user_id === null){
            $this->set_response([
                'status' => FALSE,
                'message' => "user param needed"
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        if($begin_time === null){
            $this->set_response([
                'status' => FALSE,
                'message' => "begin param needed"
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        if($end_time === null){
            $this->set_response([
                'status' => FALSE,
                'message' => "end param needed"
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        if($eff_time === null){
            $this->set_response([
                'status' => FALSE,
                'message' => "eff_time param needed"
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        if ($this->Sleep_model->createSleep($user_id,$begin_time,$end_time,$eff_time)) {
            $this->response(null, REST_Controller::HTTP_CREATED);
        }
    }

    public function sleep_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id < 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $result = $this->Sleep_model->deleteSleep($id);

        $message = [
            'message' => "delete $result sleep data, where sleep_id = $id"
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

}