<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/1
 * Time: 14:57
 */
class Sport_model extends CI_Model {
    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database(); // 加载数据库模块
    }

    public function createSport($user_id,$time,$distance,$calorie,$avgspeed,$topspeed) {
        //validate input value
        if($user_id < 0 ){
            return false;
        }

        $currentTime = date("Y-m-d h:i:s");
        $data = array(
            'user_id'=>$user_id,
            'time'=>$time,
            'distance'=>$distance,
            'calorie'=>$calorie,
            'avgspeed'=>$avgspeed,
            'topspeed'=>$topspeed,
            'createdat'=>$currentTime
        );

        if($this->db->insert('sport',$data)){
            return true;
        }else{
            return false;
        }
    }
    public function getSportByUser($user_id){
        $query = $this->db->query("select count(sport_id) as sumday,sum(calorie) as sumcalorie, sum(distance) as sumdistance,strftime('%Y %m',createdat) as mon from sport where user_id=4 group by mon");
        return $query->result_array();
    }
}