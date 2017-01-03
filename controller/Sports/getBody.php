<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/3
 * Time: 上午9:25
 */


@session_start();
$date=$_POST['date'];
$uid=$_SESSION['userid'];
include('../../model/Sport.php');
$date=date("Y-m-d", strtotime($date));

$account=new Sport($uid,"sqlite:../../mydatabase.sqlite");
$res=$account->getBody($date);

    @Header("Location:../../view/body.php?date=$date");

