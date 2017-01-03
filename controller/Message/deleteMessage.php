<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/1
 * Time: 下午2:45
 */

include('../../model/Message.php');
$friendid=$_POST['toname'];
$id =  $_POST['id'];
$account=new Message("sqlite:../../mydatabase.sqlite");
$res=$account->deletePeople($id,$friendid);
if($res) {
    Header("Location:../../view/message.php?toname='$friendid'");

}else{
    Header("Location:../../view/message.php?toname='$friendid'");
}
