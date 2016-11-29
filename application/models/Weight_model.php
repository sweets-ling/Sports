<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/1
 * Time: 9:00
 */
class Weight_model extends CI_Model {
    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database(); // 加载数据库模块
    }

    public function createWeight($user_id,$kilogram) {
        //validate input value
        if($user_id < 0 || $kilogram < 0){
            return false;
        }

        $currentTime = date("Y-m-d h:i:s");
        $data = array(
            'user_id'=>$user_id,
            'kilogram'=>$kilogram,
            'createdat'=>$currentTime
        );

        if($this->db->insert('weight',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function getWeightByUser($user_id){
        $query = $this->db->query("select * from weight where user_id=$user_id order by createdat desc");
        return $query->result_array();
    }

    public function updateWeight($data){
        if(isset($data['weight_id']) && $data['weight_id'] != null){
            $this->db->where('weight_id',$data['weight_id']);
        }else{
            return false;
        }
        $newData = array();
        if(isset($data['kilogram']) && $data['kilogram'] != null)
            $newData['kilogram'] = $data['kilogram'];
        $this->db->update('weight',$newData);
        return  true;
    }

}