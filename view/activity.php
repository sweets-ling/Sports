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
    $userid = $_SESSION['userid'];
    $dbaddr = "sqlite:../mydatabase.sqlite";
    include_once('../model/Activity.php');
    $friend= new Activity($dbaddr);
    $type=$_REQUEST['type'];
    if($type==null){
        $myActivity=$friend->getAllActivity();
    }else {
        $myActivity = $friend->getAllActivityList($type);
    }
    session_write_close();
}
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports+| Activity</title>

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
         <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>发现好玩</h2>
                    <ol class="breadcrumb">

                        <li class="active">
                           <a href="activity.php"> <strong class="text－center" style="color: #19aa8d">探索活动</strong></a>
                        </li>
                        <li >
                            <a href="new_activity.php">创建＋</a>
                        </li>
                        <li >
                            <a href="myActivity.php">我的</a>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row main">

                <div class="col-xs-12 col-md-8 article-content">
                    <div class="card">
                        <div class="card-block">


                            <div class="wrapper wrapper-content animated fadeInRight">

                                <div class="ibox-content m-b-sm border-bottom">
                                    <div class="p-xs">
                                        <div class="pull-left m-r-md">
                                            <i class="fa fa-futbol-o text-navy mid-icon"></i>
                                        </div>
                                        <h2>选择竞赛类型</h2>
                                        <span><a href="activity.php?type=0" style="color: black">跑步 </a></span>
                                        <span><a href="activity.php?type=1" style="color: black">&nbsp;篮球 </a></span>
                                        <span><a href="activity.php?type=2" style="color: black">&nbsp;足球 </a></span>
                                        <span><a href="activity.php?type=3" style="color: black">&nbsp;羽毛球 </a></span>
                                        <span><a href="activity.php?type=4" style="color: black">&nbsp;乒乓球 </a></span>
                                    </div>
                                </div>







                                <?php
                                foreach ($myActivity as $item) {
                                ?>
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td class="project-status">
                                            <br><br>
                                            <?php if($friend->state($item['begintime'],$item['endtime'])==0){?>
                                            <span class="label label-default">尚未开始</span>
                                            <?php }else if($friend->state($item['begintime'],$item['endtime'])==1){?>
                                            <span class="label label-primary">正在进行</span>
                                            <?php }else{?>
                                                <span class="label label-default">已经结束</span>
                                            <?php }?>
                                        </td>
                                        <td class="project-title" style="width:30%">
                                            <a href="activity_detail.php?activityid=<?php echo $item['id']?>"><h2><?php echo $item['name']?></h2></a>

                                            <h5><?php echo $item['description']?></h5>
                                        </td>
                                        <td class="project-completion" style="width:20%"><br>
                                            <h5><?php echo $item['begintime']?>至<?php echo $item['endtime']?></h5>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </td>
                                        <td class="project-people" style="width:40%">
                                            <br><br>
                                            <?php $myActivitymember=$friend->getMyActivityMember($item['id']);
                                            foreach($myActivitymember as $x){
                                                ?>
                                                <a href=""><img alt="image" class="img-circle" src="<?php echo $x['imgurl']?>"></a>

                                            <?php }  ?>
                                        </td>
                                        <td class="project-actions" style="width:10%">
                                            <a href="activity_detail.php?activityid=<?php echo $item['id']?>" class="btn btn-white btn-sm"><i class="fa fa-folder"></i>查看 </a>
                                            <hr>
                                            <?php if($friend->isActivityMember($item['id'],$userid)){
                                                ?>
                                                <a  class="btn btn-white btn-sm" onclick="exitActivity(<?php echo $item['id']?>)"><i class="fa fa-child"></i>退出</a>
                                            <?php } else{?>
                                                <a  class="btn btn-primary btn-sm"  onclick="joinActivity(<?php echo $item['id']?>)"><i class="fa fa-child"></i>加入</a>


                                          <?php  } ?>

                                        </td>
                                    </tr>





                                    <?php }?>



                                    </tbody>
                                </table>


                            </div>



                        </div>
                    </div>
                </div>

                <?php include "personal.php"?>



            </div>
  

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


</body>
<script>

    function exitActivity(aid) {
        $.ajax({
            type: "POST",
            url: '../controller/Activity/exitActivity.php',
            data:  { aid : aid ,uid: <?php echo $userid?>},
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
    function joinActivity(aid) {
        $.ajax({
            type: "POST",
            url: '../controller/Activity/joinActivity.php',
            data:  { aid : aid ,uid: <?php echo $userid?>},
            datatype: "json",
            success: function (message) {

                window.location.reload();


            }
        });
    }

</script>
</html>
