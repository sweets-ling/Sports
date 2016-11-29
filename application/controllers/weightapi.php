<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/11/9
 * Time: 9:00
 */
class weightapi extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Weight_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['weight_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['weight_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['weight_put']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function weight_get()
    {
        $user_id = $this->get('user');

        // If the id parameter doesn't exist return all the users

        if ($user_id === NULL)
        {

            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'User_id is null, No weights were found'
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

        $weight = $this->Weight_model->getWeightByUser($user_id);
        if (!empty($weight))
        {
            $this->set_response($weight, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => "Weight of $user_id could not be found"
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function weight_post()
    {
        //validation,Load support assets
        $this->load->helper(
            array('form','url','security')
        );

        // $this->some_model->update_weight( ... );
        $user_id = $this->post('user');
        $kilo = $this->post('kilogram');
        if ($this->Weight_model->createWeight($user_id,$kilo)) {
            $this->response(null, REST_Controller::HTTP_CREATED);
        }
    }

    public function weight_put()
    {
        //update activity information
        $data = array(
            'weight_id'=>$this->put('weight_id'),
            'kilogram'=>$this->put('kilogram'),
        );
        $result = $this->Weight_model->updateWeight($data);
        if($result)
            $this->response(null, REST_Controller::HTTP_OK);
        else
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST);
    }
}