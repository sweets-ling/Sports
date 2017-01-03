<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/4
 * Time: 上午12:20
 */

session_start();
include('../../model/Sport.php');
$id=$_SESSION['userid'];
$date=$_POST['date'];
$sport=new Sport($id,'sqlite:../../mydatabase.sqlite');
$data=$sport->getSportGraph();
exit(json_encode($data));
