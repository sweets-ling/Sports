<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/3
 * Time: 下午1:16
 */

session_start();
include('../../model/Sport.php');
$id=$_SESSION['userid'];
$date=$_POST['date'];
$sport=new Sport($id,'sqlite:../../mydatabase.sqlite');
$data=$sport->getSleepGraph($date);

exit(json_encode($data));



