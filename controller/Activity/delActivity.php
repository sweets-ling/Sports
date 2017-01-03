<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/2
 * Time: 下午8:22
 */


$aid=$_REQUEST['aid'];
include('../../model/Activity.php');
$account=new Activity("sqlite:../../mydatabase.sqlite");
$res=$account->delActivity($aid);
if($res) {

    @Header("Location:../../view/myActivity.php");

}else{

    @Header("Location:../../view/myActivity.php");
}
