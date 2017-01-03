<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/4
 * Time: 上午7:46
 */

@session_start();
$uid=$_SESSION['userid'];
$h=$_POST['height'];
$w=$_POST['weight'];
$date=$_POST['date'];

include('../../model/Sport.php');

$account=new Sport($uid,"sqlite:../../mydatabase.sqlite");
$res=$account->updateHeight($h,$w);
if($res) {

    @Header("Location:../../view/body.php");

}else{

    @Header("Location:../../view/body.php");
}
