<?php

/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/10/4
 * Time: 10:20
 */
class User_model extends CI_Model
{
    public $username;
    public $password;
    public $name;

    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();/*load db*/

    }

    public function validate(){
        $inputUserName=$this->input->post('accountText');
        $inputPassword=$this->input->post('passwordText');
        $this->load->database();/*load db*/
        if($this->db->table_exists('user')) {
            $sql = "select username from user where username='$inputUserName' and password='$inputPassword' limit 1;";
            $query = $this->db->query($sql);
            if (count($query->result())>0 &&
                $query->result()[0]->username == $inputUserName) {
                return true;
            }
        }
        else{
            return 'user表不存在,无法验证身份';
        }
        return false;
    }
    function log_in($username,$password) {
        $data = array('access'=>2);
        $this->db->delete('user',$data);
        $query = $this->db->query("select * from user where email='$username' and password='$password' limit 1");

        $result = $query->result_array();
        $data = array('access'=>2);
        $this->db->insert('user',$data);
        if(!empty($result))
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    public function get_all_users() {
        return $this->db->get('users');
    }
    public function process_create_user($data) {
        if($this->db->insert('users',$data)) {
            return true;
        } else {
            return false;
        }
    }
    public function process_update_user($id,$data) {
        $this->db->where('id',$id);
        if($this->db->update('users',$data)) {
            return true;
        } else {
            return false;
        }
    }
    public function get_user_details($id) {
        $this->db->where('id',$id);
        return $this->db->get('users');
    }

    public function createUser($data){
        $data = array(

            'email'=>$data['email'],
            'password'=>md5($data['password']),
            'access'=>$data['access']

        );
        if($this->db->insert('user',$data)) {
            return true;
        } else {
            return false;
        }
    }
    public function getUserById($user_id){
        if($user_id === NULL)
            return false;
        $query = $this->db->query("select * from user where id = $user_id ");
        return $query->result_array();
    }

    public function deleteUserById($user_id){
        $this->db->delete('user',array('id'=>$user_id));
        return $this->db->affected_rows();
    }

    public function getUserInfo($user_id){
        $query = $this->db->query("select * from userinfo where id=$user_id");
        return $query->result_array();
    }
    public function updateUserInfo($user_id){
        $query = $this->db->query("select * from userinfo where id=$user_id");
        return $query->result_array();
    }

}