<?php

/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/11/30
 * Time: 上午2:21
 */
class User
{
    public $db;
    public $id;
    public $infolist;


    public function __construct($id,$dbadd){

        $this->db= new PDO($dbadd);
        $this->id=$id;
        $this->infolist=$this->db->query("select * from userinfo where id='$this->id'")->fetchAll()[0];


    }
    public  function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->db=null;
    }
    public function getUserName(){
        return $this->infolist['name'];
    }
    public function getAge(){
        $birth=$this->infolist['birthday'];
        list($by,$bm,$bd)=explode('-',$birth);
        $cm=date('n');
        $cd=date('j');
        $age=date('Y')-$by-1;
        if ($cm>$bm || $cm==$bm && $cd>$bd) $age++;
        return $age;
    }
    public function getDescription(){
        return $this->infolist["description"];
    }
    public function getImgurl(){
        return $this->infolist["imgurl"];
    }
    public function getSex(){
        return $this->infolist["sex"];

    }
    public function getLocation(){
        return $this->infolist["location"];
    }
    public function getHobby(){
        return $this->infolist["hobby"];
    }
    public function getMoney(){
        return $this->infolist["money"];
    }

    public function getLevel(){
        $ex=$this->infolist["ex"];
        return floor($ex/100);
    }

    public function getActAndFriend(){
        $result1=$this->db->query("
            select count(*) from activity where uid='$this->id'and state!=-1 ")->fetchAll()[0][0];
        $result2=$this->db->query("
            select count(*) from friends where uid='$this->id'")->fetchAll()[0][0];
        $result3=$this->db->query("
            select count(*) from friends where fid='$this->id'")->fetchAll()[0][0];
        return array($result1,$result2,$result3);
    }

    public function getAccess($id){
        $access= $this->db->query("select access from user where id='$id' ")->fetchAll()[0][0];
        if($access==0){
            return '普通用户';
        }
        if($access==1){
            return '教练';
        }if($access==2){
            return '医生';
        }if($access==3){
            return '管理员';
        }
    }
    public function  updateUserInfo($id,$name,$sex,$location,$hobby,$description){
        return $this->db->exec("update userinfo set name='$name',sex='$sex',location='$location',hobby='$hobby',description='$description' where id='$id'");
    }
    public function  updateAccess($email,$access){
        return $this->db->exec("update user set access='$access' where email='$email'");
    }


    public function searchUser($keyword){
        return $this->db->query("select * from userinfo where name like %$keyword%");
    }


}