<?php
/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/10/22
 * Time: 16:45
 */
Class Activity_model extends CI_Model {
    public $activity_id;
    public $sponsor_id;
    public $place;
    public $description;
    public $createdat;
    public $deadline;

    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database(); // 加载数据库模块
    }

    public function createActivity($sponsor,$time,$place,$descript,$dayNum) {
//        $query = $this->db->query("select count(*) as lineNum from activities");
//        $row = $query->row();
//        $lineNum = $row->lineNum;
        $currentTime = date("Y-m-d h:i:s");
        $data = array(
//            'activity_id'=>$lineNum,
            'sponsor_id'=>$sponsor,
            'activitytime'=>$time,
            'place'=>$place,
            'description'=>$descript,
            'createdat'=>$currentTime,
            'deadline'=>date('Y-m-d H:i:s',strtotime($currentTime."$dayNum days"))
        );
        if($this->db->insert('activities',$data)) {
            return "created activity success";
        } else {
            return "failed to create activity!";
        }
    }

    public function getAllActivities() {
        $query = $this->db->query("select activity_id ,sponsor_id ,place,description,createdat,deadline,activitytime,GROUP_CONCAT(acp.uname) as uname from activities act left join (select aid,uid,users.name as uname from activitypart join users on users.id = activitypart.uid ) as acp on acp.aid = act.activity_id group by activity_id order by createdat desc");
        return $query->result_array();
    }

    public function getActivityBySponsor($sponsorid) {
        $query = $this->db->query("select * from activities where sponsor_id = $sponsorid order by createdat desc");
        return $query->result_array();
    }

    public function updateActivity($data) {
        if(isset($data['activity_id']) && $data['activity_id'] != null){
            $this->db->where('activity_id',$data['activity_id']);
        }else{
            return false;
        }
        $newData = array();
        if(isset($data['place']) && $data['place'] != null)
            $newData['place'] = $data['place'];
        if(isset($data['description']) && $data['description'] != null)
            $newData['description'] = $data['description'];
        $this->db->update('activities',$newData);
        return  true;
    }

    public function joinActivity($userid,$activity){
        $currentTime = date("Y-m-d h:i:s");
        $data = array(
            'aid'=>$activity,
            'uid'=>$userid,
            'jointime'=>$currentTime
        );
        if($this->db->insert('activitypart',$data)) {
            return "created part success";
        } else {
            return "failed to create activitypart!";
        }
    }
}