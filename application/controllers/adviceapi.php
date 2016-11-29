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
class adviceapi extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Advice_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['advices_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['advices_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['advices_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function advices_get()
    {
        $receiverid = $this->get('receiver');
        $proposerid = $this->get('proposer');

        // If the id parameter doesn't exist return all the users

        //发出人和接收人都为空，返回所有advice
        if ($receiverid === NULL && $proposerid === NULL)
        {
            $advices =$this->Advice_model->getAllAdvices();
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($advices)
            {
                // Set the response and exit
                $this->response($advices, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No advices were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
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

            $receivedAdvices = array();
            $advices = $this->Advice_model->getAdvicesByReceiver($receiverid);
            if(!empty($advices)) {
                foreach ($advices as $row)
                {
                    if (isset($row['receiver_id']) && $row['receiver_id'] == $receiverid)
                    {
                        array_push($receivedAdvices,$row);
                    }
                }
            }
            if(!empty($receivedAdvices)) {
                $this->set_response($receivedAdvices, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => "advice of receiver $receiverid could not be found"
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

            $proposedAdvices = array();
            $advices = $this->Advice_model->getAdvicesByProposer($proposerid);
            if(!empty($advices)) {
                foreach ($advices as $row)
                {
                    if (isset($row['proposer_id']) && $row['proposer_id'] == $proposerid)
                    {
                        array_push($proposedAdvices,$row);
                    }
                }
            }
            if(!empty($proposedAdvices)) {
                $this->set_response($proposedAdvices, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => "advice of proposer $proposerid could not be found"
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

    }

    public function advices_post()
    {
        //validation,Load support assets
        $this->load->model('Advice_model');
        $this->load->helper(
            array('form','url','security')
        );

        // $this->some_model->update_user( ... );
        $proposer_id = $this->post('proposer_id');
        $receiver_id = $this->post('receiver_id');
        $title = $this->post('title');
        $content = $this->post('content');

        if ($this->Advice_model->createAdvice($proposer_id,$receiver_id,$title,$content)) {
            $this->response(null, REST_Controller::HTTP_CREATED);
        }else{
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST);
        }

    }

    public function advices_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id < 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $result = $this->Advice_model->deleteAdvice($id);

        $message = [
            'id' => $id,
            'message' => "delete $result advices"
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }


}