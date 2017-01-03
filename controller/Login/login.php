<?php
@session_start();
$email=$_POST['email'];
$password=$_POST['password'];

if($email && $password){
    if(($result=login($email,$password))==true){

        $_SESSION['userid']=$result["id"];
        $_SESSION['email']=$result["email"];
        $_SESSION['access']=$result["access"];
        session_write_close();
        Header("Location:../../view/homepage.php ");
    }else{
        echo "<script>alert('登录失败,请重新登录');location.href='../../view/login.php';</script>";
    }
}
function login($id,$password)
{

    $db = new PDO("sqlite:../../mydatabase.sqlite");
    $result = $db->query("select * from user where email='$id' and password='$password'")->fetchAll()[0];
    if ($result) {
        return $result;
    } else {
        return false;
    }
}
