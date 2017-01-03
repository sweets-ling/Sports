<?php
@session_start();
$name=$_POST['name'];
$description=$_REQUEST['description'];
$type=$_POST['type'];
$date=$_POST['daterange'];
$array=explode('-', $date);
$limit=$_POST['a'];
$uid=$_POST['uid'];
include('../../model/Activity.php');
$array[0]=date("Y-m-d", strtotime($array[0]));
$array[1]=date("Y-m-d", strtotime($array[1]));
$account=new Activity("sqlite:../../mydatabase.sqlite");
$res=$account->newActivity($name,$type,$description,$array[0],$array[1],$uid,$limit);
if($res) {

    @Header("Location:../../view/myActivity.php");

}else{

    @Header("Location:../../view/myActivity.php");
}
