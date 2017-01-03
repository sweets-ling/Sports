<!DOCTYPE html>
<html>
<?php
@session_start();
if(!isset($_SESSION['userid'])){

    echo "<script>alert('未登录!将返回登录界面....');</script>";
    echo "<meta http-equiv='Refresh' content='0;URL=login.php'>";
}
else {
    include_once('../model/User.php');
    $id = $_SESSION['userid'];
    $toname=$_REQUEST['toname'];
    $dbaddr = "sqlite:../mydatabase.sqlite";

    include_once('../model/Message.php');
    $message = new Message($dbaddr);
    $list=$message->getNotice($id);
    session_write_close();
}
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sports+| Message</title>

    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <!-- orris -->
    <link  href='../_static/css/plugins/morris/morris-0.4.3.min.css' rel="stylesheet">

    <link href='../_static/css/bootstrap.min.css' rel="stylesheet">

    <!-- Animation CSS -->
    <link href='../_static/css/animate.css' rel="stylesheet">
    <link href='../_static/font-awesome/css/font-awesome.css' rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href='../_static/css/style.css' rel="stylesheet">


</head>

<body>

<div id="wrapper">

    <?php include "navbarTop.php" ?>
    <div class="row wrapper border-bottom white-bg page-heading text－center">
        <div class="col-lg-9 ">
            <h2 class="text－center">通知中心</h2>
            <ol class="breadcrumb text－center">

                <li class="active">
                    <a href="message.php">我的私信</a>


                </li>
                <li >
                    <strong class="text－center" style="color: #19aa8d">我的通知</strong></a>


                </li>
            </ol>
        </div>
    </div>

    <div class="row main ">



        <div class="col-xs-12 col-md-8 ">
            <div class="card">
                <div class="card-block">


                    <blockquote>
                        <p class="text-primary">通知详情</p>
                    </blockquote>


                    <div class="chat-activity-list">




                        <?PHP $count=1;
                        foreach ($list as $x) {

                                ?>
                                <div class="chat-element">

                                    <a href="#" class="pull-left">
                                        <img alt="image" class="img-circle" src="../_static/img/avatar/system.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy"></small>
                                        <strong>系统</strong>
                                        <p class="m-b-xs">
                                        <h3> <?php echo $x['message_content']?>  </h3>            </p>
                                        <small class="text-muted"><?php echo $x['send_time']?></small>
                                    </div>
                                </div>


                        <?php }?>


                    </div>






                </div>
            </div>
        </div>
     <?php include "personal.php"?>

    </div>
</div>


<!-- Mainly scripts -->
<script src='../_static/js/jquery-2.1.1.js'></script>
<script src='../_static/js/bootstrap.min.js'></script>
<script src='../_static/js/plugins/metisMenu/jquery.metisMenu.js'></script>
<script src='../_static/js/plugins/slimscroll/jquery.slimscroll.min.js'></script>

<!-- Custom and plugin javascript -->
<script src='../_static/js/inspinia.js'></script>
<script src='../_static/js/plugins/pace/pace.min.js'></script>

<!-- Morris -->
<script src='../_static/js/plugins/morris/raphael-2.1.0.min.js'></script>
<script src='../_static/js/plugins/morris/morris.js'></script>

<!-- Morris demo data-->
<script src='../_static/js/demo/morris-demo.js'></script>

</body>

</html>
<script>
    function jump_to(toname) {
        location.href = 'message.php?toname='+toname;
    }
    function deleteDia(toname){
        $.ajax({
            type: "POST",
            url: '../controller/Message/deleteMessage.php',
            data:  { id : <?php echo $id?> ,toname: toname},
            datatype: "json",
            success: function (message) {
                if(message){
                    window.location.reload();
                }else{
                    alert("数据库访问出错，请检查数据库连接");
                }

            }
        });
    }
</script>