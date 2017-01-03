<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/2
 * Time: 下午4:56
 */

@session_start();
$uid=$_SESSION['userid'];
$name=$_POST['name'];
$sex=$_POST['sex'];
$location=$_POST['location'];
$hobby=$_POST['hobby'];
$description=$_POST['description'];

include('../../model/User.php');
$account=new User($uid,"sqlite:../../mydatabase.sqlite");
$res=$account->updateUserInfo($uid,$name,$sex,$location,$hobby,$description);
if($res) {
    @Header("Location:../../view/settings.php");
}else{
    echo json_encode("数据库访问出错，请重试");
    @Header("Location:../../view/settings.php");
}
