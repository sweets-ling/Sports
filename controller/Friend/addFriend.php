<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/1
 * Time: 下午2:45
 */

include('../../model/Friend.php');
$friendid=$_POST['fid'];
$id =  $_POST['uid'];
$account=new Friend("sqlite:../../mydatabase.sqlite");
$res=$account->addFriend($id,$friendid);
if($res) {
    echo json_encode(true); //$.ajax已经指定了服务器返回的数据为json格式

}else{
    echo json_encode(false);
}
