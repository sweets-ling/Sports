<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2017/4/8
 * Time: 18:23
 */


$aid=$_REQUEST['aid'];
$star=$_REQUEST['star'];
$uid=$_REQUEST['uid'];
include('../../model/Activity.php');
$account=new Activity("sqlite:../../mydatabase.sqlite");
$account->addStar($aid,$uid,$star);

