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
class userapi extends REST_Controller {
    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model('User_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function users_get() {
        $user_id = $this->get('user_id');

        //if the sponsorid not exists,return all the activities;
        if($user_id === NULL) {
            $users = $this->User_model->getAllUsers();
            //check if the activity datastore contain activities
            if($users) {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
        else {
            $user_id = (int)$user_id;
            // Validate the id.
            if ($user_id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            $users =$this->User_model->getUserById($user_id);
            if(!empty($users)) {
                $this->set_response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else {
                $this->set_response([
                    'status' => FALSE,
                    'message' => "user of user_id $user_id could not be found"
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

    }

    public function users_post() {
        //validation,Load support assets
        $this->load->helper(
            array('form','url','security')
        );

        // $this->some_model->update_user( ... );
        $name = $this->post('username');
        $email = $this->post('email');
        $password = $this->post('password');
        $authority = $this->post('authority');
        //validate input value
        if($name == NULL)
            $this->response(['message' =>'username is null'], REST_Controller::HTTP_BAD_REQUEST);
        if($email == NULL)
            $this->response(['message' =>'email is null'], REST_Controller::HTTP_BAD_REQUEST);
        if($password == NULL)
            $this->response(['message' =>'password is null'], REST_Controller::HTTP_BAD_REQUEST);
        if($authority == NULL)
            $this->response(['message' =>'authority is null'], REST_Controller::HTTP_BAD_REQUEST);

        $data = array(
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'authority'=>$authority
        );
        if ($this->User_model->createUser($data)) {
            $this->response(null, REST_Controller::HTTP_CREATED);
        }else{
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function users_delete(){
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id < 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $result = $this->User_model->deleteUserById($id);

        $message = [
            'id' => $id,
            'message' => "delete id = $result user"
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

    public function users_put() {
        //update activity information
        $id =  (int) $this->get('id');
        $values = array();

        if ($id===NULL || $id < 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        $email = $this->put('email');
        $authority = $this->put('authority');
        $data=array();
        if($email!= NULL)
            $data['email']=$email;
        if($authority!=NULL)
            $data['authority']=$authority;

        $result = $this->User_model->process_update_user($id,$data);
        if($result)
            $this->response(['status'=>true,'message'=>'update success'], REST_Controller::HTTP_OK);
        else
            $this->response(null, REST_Controller::HTTP_BAD_REQUEST);
    }
}