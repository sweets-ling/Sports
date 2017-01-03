<?php
/**
 * Created by PhpStorm.
 * User: fulinhua
 * Date: 2016/10/10
 * Time: 10:48
 */
$name=$_POST["username"];

$email=$_POST["email"];
$password=$_POST['password'];
$passwordAgain=$_POST['passwordAgain'];
$check=$_POST['check'];
if($check!='on') {
    echo "<script>alert('需要先同意网站条款');
    location.href='../../view/register.php?email=$email&name=$name';          
    </script>";
}else if($password!=$passwordAgain) {

    echo "<script>alert('密码不一致');location.href='../../view/register.php?email=$email&name=$name';     
</script>";
}else {
    $db = new PDO("sqlite:../../mydatabase.sqlite"); //注意红字部分的路径格式，这样写会报错：new PDO('myDB.sqlite');
    if ($db) {
        $emailcheck = $db->query("select count(*) from user where email='$email'")->fetchAll()[0][0];
        if ($emailcheck > 0) {
            echo "<script>alert('该邮箱已被注册');location.href='../../view/register.php';</script>";
        } else {
            $result = $db->exec("insert into user(email,password) values ('$email','$password')");
            if ($result) {
                $result= $db->query("select id from user where email='$email'")->fetchAll()[0];
                $result2 = $db->exec("insert into userinfo(id,name) values ('$result[0]','$name')");
                if ($result2) {
                    echo "<script>alert('注册成功,请重新登录');location.href='../../view/login.php';</script>";
                } else {
                    $db->exec("delete from user where id='$result[0]'");

                    echo "<script>alert('注册失败,请重新注册');location.href='../../view/register.php';</script>";
                }
                 } else {
                echo "<script>alert('注册失败,请重新注册');location.href='../../view/register.php';</script>";
            }
        }

    } else {
        echo '数据库连接出错，请重试';
    }
}