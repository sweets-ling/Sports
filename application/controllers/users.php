<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/10/7
 * Time: 14:24
 */
class Users extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(
            array('form','url','security')
        );
        $this->load->model('User_model');
        $this->load->database();
    }
    public function index() {
        $this->load->helper('url');
        redirect('users/view_users');
//        $this->load->view('view_statistics');
    }
    public function view_users() {
        $data['query']=$this->User_model->getAllUsers();
        $this->load->view('view_all_users',$data);
    }
    public function open_new_user() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['name']=array('name'=>'name','id'=>'username','value'=>set_value('name',''),'max_length'=>'100');
        $data['email']=array('name'=>'email','id'=>'email','value'=>set_value('email',''),'max_length'=>'100');
        $data['is_active']=array('name'=>'is_active','id'=>'is_active','value'=>set_value('is_active',''));
        $this->load->view('new_user',$data);

    }
    public function new_user() {
        //Load support assets
        $this->load->library('form_validation');
        //set validation rules
        $this->form_validation->set_rules('username_input','USERNAME','required|alpha|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('email_input','EMAIL','required');
        $this->form_validation->set_rules('password_input','PASSWORD','required|min_length[5]|max_length[20]');

        //Begin validation
        if($this->form_validation->run() == false) {
            echo "validation failed";
        } else {
            $data = array(
                'name' => $this->input->post('username_input'),
                'email' => $this->input->post('email_input'),
                'password' => $this->input->post('password_input'),
                'last_login_time' => date("Y-m-d H:i:s"),
            );
            if($this->User_model->process_create_user($data)) {
                redirect('users');
            }
        }

    }

    public function edit_user() {
        //Load support assets
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('','<br/>');

        //set validation rules
        $this->form_validation->set_rules('name','user name','required');
        $this->form_validation->set_rules('email','user email','required');
        $this->form_validation->set_rules('is_active','Is Active','min_length[1]|max_length[1]|integer|is_natural');

        if($this->input->post()){
            $id=$this->input->post('id');
        } else {
            $id=$this->uri->segment(3);
        }

        //Begin validation
        if($this->form_validation->run() == false) {
            //First Load,or problem with form
            $query=$this->User_model->get_user_details($id);
            foreach ($query->result() as $row) {
                $name=$row->name;
                $email=$row->email;
                $is_active=$row->is_active;

                $data['username']=array(
                    'name'=>'name',
                    'id'=>'name',
                    'value'=>set_value('username',$name),
                );
                $data['email']=array(
                    'name'=>'email',
                    'id'=>'email',
                    'value'=>set_value('email',$email),
                );
                $data['is_active']=array(
                    'name'=>'is_active',
                    'id'=>'is_active',
                    'value'=>"accept",
                );
                $data['id']=array(
                    'id'=>set_value('id',$id)
                );
                $this->load->view('edit_user',$data);
            }
        } else {
            //validation passed , now excape the data
            $data=array(
                'name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'is_active'=>0,
            );

            if($this->User_model->process_update_user($id,$data)) {
                redirect('users/view_users');
            }
        }

    }

}