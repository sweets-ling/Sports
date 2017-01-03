<?php

/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/1
 * Time: 上午8:34
 */
class Interest
{
    public $id;
    public $db;

    function __construct($dbaddr)
    {

        $this->db = new PDO($dbaddr);
    }
    public function getInterestList($id){
        return $this->db->query("select * from interest where uid=$id")->fetchAll();
    }

    public function getInterestMeList(){
        return $this->db->query("select * from interest where fid=$this->id")->fetchAll();
    }

    public function getFriendList(){
        return $this->db->query("select * from interest where uid=$this->id  and fid in 
                        (select fid from friends where fid='$this->id')")->fetchAll();
    }
    public function addFriend($uid,$fid){
        return $this->db->exec("insert into interest(uid,fid) VALUES ('$uid','$fid')")->fetchAll();
    }
    public function deleteFriend($uid,$fid){
        return $this->db->exec("delete from interest where uid='$uid'and fid='$fid'")->fetchAll();
    }

}