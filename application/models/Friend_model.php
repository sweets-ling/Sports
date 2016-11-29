<?php

/**
 * Created by PhpStorm.
 * User: WH
 * Date: 2015/12/5
 * Time: 22:22
 */
class Friend_model extends CI_Model
{
    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database(); // 加载数据库模块
    }

    public function getAllFriendRank($own_id){
        //return all advices
        $query = $this->db->query("select sport.user_id,users.name,sum(distance) as sumdis from frdrelation frd join sport on (sport.user_id = frd.friend_id or sport.user_id = $own_id)  join users on users.id = sport.user_id where own_id = $own_id  group by sport.user_id order by sumdis desc");
        return $query->result_array();
    }
}