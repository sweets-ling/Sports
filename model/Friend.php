<?php

/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/1
 * Time: 上午12:48
 */
class Friend
{
    public $db;

    function __construct( $dbaddr)
    {
        $this->db = new PDO($dbaddr);
    }
    public function getMyFriendList($id){

        $result= $this->db->query("select * from friends where uid=$id");
        if($result){
            return $result->fetchAll();
        }else{
            return array();
        }
    }

    public function getFriendMeList($id){
        return $this->db->query("select * from friends where fid=$id")->fetchAll();
    }

    public function addFriend($uid,$fid){
        return $this->db->exec("insert into friends(uid,fid) VALUES ('$uid','$fid')");
    }
    public function deleteFriend($uid,$fid){
        return  $this->db->exec("delete from friends where uid=$uid and fid=$fid");

    }
    public function isMyFriend($uid,$fid){
       $res=  $this->db->query("select *  from friends where uid=$uid and fid=$fid")->fetchAll()[0];
        if($res){
            return true;
        }else{
            return false;
        }
    }

}

