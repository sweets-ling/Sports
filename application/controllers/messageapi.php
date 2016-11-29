<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/5
 * Time: 20:40
 */
class messageapi extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Message_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['messages_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['messages_post']['limit'] = 100; // 100 requests per hour per user/key
    }
    function messages_get() {
        $receiverid = $this->get('receiver');
        $proposerid = $this->get('proposer');

        // If the id parameter doesn't exist return all the users

        //发出人和接收人都为空，返回所有advice
        if ($receiverid === NULL && $proposerid === NULL)
        {

            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'receiver and proposer params were not found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

        }
        else if($proposerid === NULL){
            //接收人不为空
            $receiverid = (int)$receiverid;

            // Validate the id.
            if ($receiverid <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            $receivedMessages =  $this->Message_model->getMessagesByReceiver($receiverid);

            if(!empty($receivedMessages)) {
                $this->set_response($receivedMessages, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => "messages of receiver $receiverid could not be found"
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
        else if($receiverid === NULL){
            //发出人不为空
            $proposerid = (int)$proposerid;

            // Validate the id.
            if ($proposerid <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            $proposedAdvices = $this->Message_model->getMessagesByProposer($proposerid);
            if(!empty($proposedAdvices)) {
                $this->set_response($proposedAdvices, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => "messages of proposer $proposerid could not be found"
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }
    function messages_post() {
        //validation,Load support assets
        $this->load->model('Message_model');
        $this->load->helper(
            array('form','url','security')
        );

        // $this->some_model->update_user( ... );
        $proposer_id = $this->post('proposer_id');
        $receiver_id = $this->post('receiver_id');
        $content = $this->post('content');

        if ($this->Message_model->createMessage($proposer_id,$receiver_id,$content)) {
            $this->response(null, REST_Controller::HTTP_CREATED);
        }else{
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST);
        }

    }
}