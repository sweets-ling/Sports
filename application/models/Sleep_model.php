<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/1
 * Time: 9:00
 */
class Sleep_model extends CI_Model {
    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database(); // 加载数据库模块
    }

    public function createSleep($user_id,$begin_time,$end_time,$sleep_eff_time) {

        //validate input value
        if($user_id < 0 ){
            return false;
        }
        //validate time format
        if(!preg_match('d{4}-d{2}-d{2}sd{2}:d{2}:d{2}',$begin_time)){
            return false;
        }

        if(!preg_match('d{4}-d{2}-d{2}sd{2}:d{2}:d{2}',$end_time)){
            return false;
        }

        if(!preg_match('d{2}:d{2}:d{2}',$sleep_eff_time)){
            return false;
        }

        $data = array(
            'user_id'=>$user_id,
            'sleep_begin'=>$begin_time,
            'sleep_end'=>$end_time,
            'sleep_eff_time'=>$sleep_eff_time
        );

        if($this->db->insert('sleep',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function getSleepByUser($user_id){
        $query = $this->db->query("select avg(sleep_seconds)/3600 as shour , avg(sleep_seconds)/60 as sm,avg(eff_seconds)/3600 as ehour,avg(eff_seconds)/60 as em,avg(eff) from (select strftime('%s',sleep_end) - strftime('%s',sleep_begin) as sleep_seconds,strftime('%s',sleep_eff_time)-strftime('%s','00:00:00') as eff_seconds,(strftime('%s',sleep_eff_time)-strftime('%s','00:00:00'))*1.0/(strftime('%s',sleep_end)-strftime('%s',sleep_begin))*1.0 as eff from sleep where user_id=$user_id order by sleep_begin desc )");
        return $query->result_array();
    }

    public function getSleepByWeekdayUser($user_id){
        $query=$this->db->query("select user_id,count(sleep_id) as daycount,avg(strftime('%s',sleep_end) - strftime('%s',sleep_begin))/3600 as avg_sleep,strftime('%w',sleep_begin) as weekday,avg(strftime('%s',sleep_eff_time)-strftime('%s','00:00:00'))/3600 as avg_eff from sleep where user_id=$user_id group by weekday order by sleep_begin desc");
        return $query->result_array();
    }

    public function deleteSleep($sleep_id){
        $query = $this->db->delete('sleep',array('sleep_id'=>$sleep_id));
        return $this->db->affected_rows();
    }

}