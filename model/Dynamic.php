<?php

/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/4
 * Time: 上午10:41
 */
class Dynamic
{
    public $db;
    public $id;
    public $infolist;


    public function __construct($id,$dbadd){

        $this->db= new PDO($dbadd);
        $this->id=$id;
    }
    public function getDynamic(){
        return $this->db->query("select distinct d.*,u.imgurl from dynamic d,userinfo u ,friends f
                          where f.uid='$this->id' and (d.uid=f.fid or d.uid=f.uid) and u.id=d.uid");
    }

}