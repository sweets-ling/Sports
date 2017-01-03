<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/3
 * Time: 上午12:50
 */


$aid=$_REQUEST['aid'];
$content=$_POST['text'];
$uid=$_POST['uid'];
include('../../model/Activity.php');
$account=new Activity("sqlite:../../mydatabase.sqlite");
$res=$account->addComment($aid,$uid,$content);
@Header("Location:../../view/activity_detail.php?activityid=$aid");
