<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/3
 * Time: 上午3:48
 */
@session_start();
$uid=$_SESSION['userid'];
$email=$_POST['email'];
$access=$_POST['a'];

include('../../model/User.php');
$account=new User($uid,"sqlite:../../mydatabase.sqlite");
$res=$account->updateAccess($email,$access);

echo "<script>alert('update access success');location.href='../../view/access.php';</script>";
