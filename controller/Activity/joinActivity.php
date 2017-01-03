<?php
/**
 * Created by PhpStorm.
 * User: sweets_ling
 * Date: 2016/12/2
 * Time: 下午8:21
 */


$aid=$_POST['aid'];
$uid=$_POST['uid'];
include('../../model/Activity.php');
$account=new Activity("sqlite:../../mydatabase.sqlite");
if($account->isActivityMember($aid,$uid)){

    echo json_encode('You aleardy are member');
}else {
    $res = $account->joinActivity($aid, $uid);
    echo json_encode('Join');
}
