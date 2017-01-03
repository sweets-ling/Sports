<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/2
 * Time: 下午8:22
 */

$aid=$_POST['aid'];
$uid=$_POST['uid'];
include('../../model/Activity.php');
$account=new Activity("sqlite:../../mydatabase.sqlite");
$res=$account->exitActivity($aid,$uid);
if($res) {

    @Header("Location:../../view/myActivity.php");

}else{

    @Header("Location:../../view/myActivity.php");
}
