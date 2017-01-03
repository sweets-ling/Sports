<?php
@session_start();
$sender=$_REQUEST['sender'];
$recevier=$_REQUEST['receiver'];
$text=$_POST['text'];

include('../../model/Message.php');
$account=new Message("sqlite:../../mydatabase.sqlite");
$res=$account->addMessage($sender,$recevier,$sender,$recevier ,1, $text,date('Y-m-d H:m:s'),0);
if($res) {
    @Header("Location:../../view/message.php?toname=$recevier");

}else{
    echo json_encode("数据库访问出错，请重试");
    @Header("Location:../../view/message.php?toname=$recevier");
}
