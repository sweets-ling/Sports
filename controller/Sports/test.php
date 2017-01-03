
<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/3
 * Time: 下午10:46
 */
@session_start();
include('../../model/Sport.php');
$id=$_SESSION['userid'];
$sport=new Sport($id,'sqlite:../../mydatabase.sqlite');
$data=$sport->getSportsData();
echo(json_encode($data));