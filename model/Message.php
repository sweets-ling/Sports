<?php

/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/1
 * Time: 下午5:37
 */
class Message
{
    public $db;

    function __construct($dbaddr)
    {
        $this->db = new PDO($dbaddr);
    }

    function addMessage($user_id,$friend_id,$sender_id,$receiver_id ,$type, $message_content,$send_time,$state){

        $sql="INSERT INTO message(user_id,friend_id,sender_id,receiver_id ,type, message_content,send_time,state) VALUES ( '$user_id', '$friend_id', '$sender_id', '$receiver_id', '$type', '$message_content', '$send_time', '$state')";
        $result1=$this->db->exec($sql);
        $sql="INSERT INTO message(user_id,friend_id,sender_id,receiver_id ,type, message_content,send_time,state) VALUES ( '$friend_id', '$user_id', '$sender_id', '$receiver_id', '$type', '$message_content', '$send_time', '$state')";
        $result2=$this->db->exec($sql);
        return $result1&$result2;
    }

    function getMessageList($user_id){
        $sql="SELECT COUNT(p.id) AS message_count,p.user_id,p.friend_id,p.sender_id,p.receiver_id,p.send_time,p.message_content, u.`name` AS friend_name,u.imgurl AS friend_image
         FROM (SELECT * FROM message ORDER BY send_time asc) p INNER JOIN userinfo u on u.id=friend_id 
        WHERE p.user_id='$user_id' and p.`state` !=3     GROUP BY p.friend_id ORDER BY p.send_time DESC
          ";
        return $this->db->query($sql)->fetchAll();
    }

    function getMessageDetail($id,$fid){
        $this->db->exec("update message set state=2 where user_id='$id'and friend_id='$fid';");
        $sql="SELECT p.message_content,p.sender_id,p.receiver_id,p.send_time,u.`name` AS sender_name,u.imgurl AS sender_image,uu.`name` AS receiver_name FROM message p INNER JOIN userinfo u on u.id=p.sender_id INNER JOIN userinfo uu on uu.id=p.friend_id WHERE p.user_id='$id' and p.friend_id='$fid' and p.`state` !=3 ORDER BY p.send_time asc";
        return $this->db->query($sql)->fetchAll();
    }
    function getNotRead($id,$type)
    {
        $result = $this->db->query("SELECT COUNT(*),send_time FROM message WHERE user_id='$id' AND type='$type' and state=0 order by send_time desc")->fetchAll()[0];
        //PHP计算两个时间差的方法
        $startdate = $result[1];
        $enddate = date("Y-m-d H:i:s");
        $date = floor((strtotime($enddate) - strtotime($startdate)) / 86400);
        $hour = floor((strtotime($enddate) - strtotime($startdate)) % 86400 / 3600);
        $minute = floor((strtotime($enddate) - strtotime($startdate)) % 86400 / 60);
        $second = floor((strtotime($enddate) - strtotime($startdate)) % 86400 % 60);
        return array($result[0], $hour);
    }

    function  deletePeople($id,$fid){
        return $this->db->exec("UPDATE message SET state=3 WHERE user_id='$id' AND friend_id='$fid'");
    }

    function getNotice($id){
        $this->db->exec("update message set state=2 where user_id='$id'and type='0';");
        $sql="SELECT p.message_content,p.send_time FROM message p WHERE p.user_id='$id' and p.`state` !=3 and p.type=0 ORDER BY p.send_time desc";
        return $this->db->query($sql)->fetchAll();
    }

    }