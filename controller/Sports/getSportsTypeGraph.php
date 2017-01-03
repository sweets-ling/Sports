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
$sport=new Sport($id,'sqlite:../../mydatabase.sqlite');
$data=$sport->getSportsType();

exit(json_encode($data));



