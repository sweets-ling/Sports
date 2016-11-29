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
class activityapi extends REST_Controller {
    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Activity_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['activities_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['activities_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['activities_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function activities_get() {
        $sponsorid = $this->get('sponsor');

        //if the sponsorid not exists,return all the activities;
        if($sponsorid === NULL) {
            $activities = $this->Activity_model->getAllActivities();
            //check if the activity datastore contain activities
            if($activities) {
                // Set the response and exit
                $this->response($activities, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No activities were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
        else {
            $sponsorid = (int)$sponsorid;
            // Validate the id.
            if ($sponsorid <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            $sponsoredAct = array();
            $activities = $this->Activity_model->getActivityBySponsor($sponsorid);
            if(!empty($activities)) {
                foreach($activities as $row){
                    if (isset($row['sponsor_id']) && $row['sponsor_id'] == $sponsorid)
                    {
                        array_push($sponsoredAct,$row);
                    }
                }
            }
            if(!empty($sponsoredAct)) {
                $this->set_response($sponsoredAct, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else {
                $this->set_response([
                    'status' => FALSE,
                    'message' => "activities of sponsor $sponsorid could not be found"
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

    }

    public function activities_post() {
        //validation,Load support assets
        $this->load->helper(
            array('form','url','security')
        );

        // $this->some_model->update_user( ... );
        $sponsor_id = $this->post('sponsor_id');
        $time = $this->post('time');
        $place = $this->post('place');
        $description = $this->post('description');
        $days = $this->post('days');

        if ($this->Activity_model->createActivity($sponsor_id,$time,$place,$description,$days)) {
            $this->response(null, REST_Controller::HTTP_CREATED);
        }else{
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function activities_put() {
        //update activity information
        $data = array(
            'activity_id'=>$this->put('activity_id'),
            'place'=>$this->put('place'),
            'description'=>$this->put('description'),
            'days'=>$this->put('days')
        );
        $result = $this->Activity_model->updateActivity($data);
        if($result)
            $this->response(null, REST_Controller::HTTP_OK);
        else
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function join_get(){
        $user = $this->get('user');
        $activity = $this->get('activity');
        if($user == NULL || $activity == NULL){
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $result = $this->Activity_model->joinActivity($user,$activity);
            $this->response($result, REST_Controller::HTTP_OK);
        }
    }
}