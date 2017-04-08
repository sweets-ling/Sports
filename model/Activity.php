<?php

/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/1
 * Time: 上午8:10
 */
class Activity
{

    public $id;
    public $db;

    function __construct($dbaddr)
    {
        $this->db = new PDO($dbaddr);
    }
    public function getMyActivityList($id){

        return $this->db->query("select * from activity where uid=$id order by endtime desc")->fetchAll();
    }
    public function newActivity($name,$type,$description,$begintime,$endtime,$uid,$limit){
        $result= $this->db->query("select * from friends where uid='$uid'");
        $result=$result->fetchAll();
      //  var_export( $result);
        foreach ($result as $item) {
            $fid=$item['fid'];
            $today=date('Y-m-d H:i:s');
            $sql="INSERT INTO message(user_id,friend_id,sender_id,receiver_id ,type, message_content,send_time,state) VALUES ( '1', '$fid', '1', '$fid', '0', '你的好友邀请你去参与活动，快去查看吧', '$today', '0')";
         // echo $sql;
          $this->db->exec($sql);

        }
        $today=date('Y-m-d H:i:s');
          $this->db->exec("insert into dynamic(uid,content,time,detail) VALUES ('$uid','用户: $uid 发布了新活动，快去参与吧','$today','活动名称:$name 活动描述:$description');");
            return $this->db->exec("insert into activity 
          (name,type,description,begintime,endtime,uid,limits,state)
           values ('$name','$type','$description','$begintime','$endtime','$uid','$limit',0)");

    }

    public function getMyActivityMember($id){

        return $this->db->query("select *,u.id as userId from activity_member a,userinfo u where a.aid=$id and u.id=a.uid")->fetchAll();
    }
    public function getActivityDetail($id){

        return $this->db->query("select a.*,u.id as userid ,u.name as username from activity a,userinfo u where a.id=$id and a.uid=u.id")->fetchAll()[0];
    }
    public function getActivityComment($id){

        return $this->db->query("select c.*,u.id as userid,u.name as username, u.imgurl as imgurl from activity_comment c ,userinfo u where c.aid='$id' and u.id=c.uid order by time desc")->fetchAll();
    }
    public function getAllActivityList($type){
        return $this->db->query("select * from activity where type='$type' order by begintime desc")->fetchAll();
    }
    public function getAllActivity(){
        return $this->db->query("select * from activity  order by begintime desc")->fetchAll();
    }

    public function isActivityMember($aid,$uid){
        return $this->db->query("select count(*) from activity_member where aid='$aid' and uid='$uid'")->fetchAll()[0][0];
    }
    public function joinActivity($aid,$uid){
        return $this->db->exec("insert into activity_member(aid,uid) values ('$aid','$uid')");
    }
    public function exitActivity($aid,$uid){
        return $this->db->exec("delete from activity_member where aid='$aid' and uid='$uid'");
    }
    public function delActivity($aid){
      $this->db->exec("delete from activity_member where aid='$aid'");
        return       $this->db->exec("delete from activity where id='$aid'");
    }
    public function getMyJoinActivityList($id){

        return $this->db->query("select a.* from activity a ,activity_member m where m.uid=$id and a.id=m.aid order by endtime desc")->fetchAll();
    }
    public function addComment($aid,$uid,$text){
        $today=date('Y-m-d H:m:s');
        return       $this->db->exec("insert into activity_comment (aid,uid,content,time) VALUES ('$aid','$uid','$text','$today')");
    }
    public function addStar($aid,$uid,$star){
        if(count($this->db->query("select * from activity_star WHERE aid = '$aid' AND uid = '$uid'")->fetchAll())!=0){
            $this->db->exec("UPDATE activity_star set star = '$star' WHERE  aid = '$aid' AND uid = '$uid'");
        }else{
            $this->db->exec("insert into activity_star (aid,uid,star) VALUES ('$aid','$uid','$star')");
        }
    }

    public function state($begin,$end){
        $today=date('Y-m-d');
        if(strtotime($today)<strtotime($begin)){
            return 0;
        }else if(strtotime($today) >strtotime($end)){
            return 2;
        }else{
            return 1;
        }
    }


    public function searchActivity($keyword){
        return $this->db->query("select * from activity where name like %$keyword%");
    }
}