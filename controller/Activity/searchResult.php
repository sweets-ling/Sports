
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2017/3/2
 * Time: 下午6:22
 */
<?php
@session_start();
$keyword=$_POST['top-search'];
include('../../model/Activity.php');
include('../../model/User.php');
$activity=new Activity("sqlite:../../mydatabase.sqlite");
$user=new User("sqlite:../../mydatabase.sqlite");
$resActivity=$activity->searchActivity($keyword);
$resUser=$user->searchUser($keyword);


