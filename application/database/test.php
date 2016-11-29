<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/11/29
 * Time: 下午4:16
 */

class test extends SQLite3 {
    function __construct()
    {
       $this->open('./test.db');
    }
}

$db=new test();
if(!$db){
    echo $db->lastErrorMsg();
}else{
    echo("successfully");
}

$db->close();