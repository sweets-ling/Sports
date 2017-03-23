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
    $account = new User($userid, $dbaddr);


    include_once('../model/Friend.php');
    $friend= new Friend($dbaddr);

    $friendme=$friend->getFriendMeList($userid);
    session_write_close();
}
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports+| Contacts</title>


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
            <h2 class="text－center">约起来！</h2>
            <ol class="breadcrumb text－center">
                <li >
                    <a href="myfriend.php">我的关注</a>
                </li>
                <li>
                    <strong style="color: #19aa8d">我的粉丝</strong>
                </li>
                <li>
                    <a>网页顶部可以搜索用户哦</a>

                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row main">


            <?php
            foreach ($friendme as $item) {
                $id = $item['uid'];
                $account = new User($id, $dbaddr);
                $nickname = $account->getUserName();
                $money = $account->getMoney();
                $description = $account->getDescription();
                $level=$account->getLevel();
                $location=$account->getLocation();
                $imgurl=$account->getImgurl();
                $actAndother=$account->getActAndFriend();
                $access=$account->getAccess($id);

                ?>
                <div class="col-lg-4">
                    <div class="contact-box">

                        <div class="col-sm-4" >

                            <div class="text-center">
                                <a href="homepage.php?homeid=<?php echo $id?>"> <img alt="image" class="img-circle m-t-xs img-responsive" src="<?php echo $imgurl?>">
                                </a>   <hr/>
                                <h3><strong><?php echo $nickname?></strong></h3>

                            </div>
                        </div>
                        <div class="col-sm-8">

                            <p><i class="fa fa-map-marker"></i>&nbsp;<?php echo $location?></p>
                            <address>
                                <strong>
                                    <?php echo $access?>
                                </strong><br>
                                <?php echo $description?>
                            </address>
                            <div class="row m-t-lg text-center">
                                <div class="col-md-4">
                                    <span class="fa fa-heart" ></span>
                                    <h5><strong><?php echo $actAndother[0]?>活动</strong></h5>
                                </div>
                                <div class="col-md-4">

                                    <span class="fa fa-star" name="<?php echo $id?>" onclick="add(this.name)"></span>

                                    <h5><strong><?php echo $actAndother[1]?>关注</strong> </h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="fa fa-child"  ></span>
                                    <h5><strong><?php echo $actAndother[2]?>粉丝</strong> </h5>
                                </div>
                            </div>
                            <br>
                            <div class="user-button">

                                <div class="row">
                                    <div class="col-md-6" >
                                        <?php
                                        if(!$friend->isMyFriend($userid,$id)){  ?>
                                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="addFriend(<?php echo $id?>)"><i class="fa fa-heart"></i>加关注</button>
                                   <?php }else { ?>
                                            <button type="button" class="btn btn-warning btn-sm btn-block" onclick="delFriend(<?php echo $id?>)">取消关注</button>
                                        <?php }?>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary btn-sm btn-block" onclick="sendMsg(<?php echo $id?>)"><i class="fa fa-envelope"></i>发私信</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        </a>
                    </div>
                </div>

            <?php } ?>

        </div>
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

    function sendMsg(toname){

    //    var myWindow=window.open('./message.php?toname='+str,'','width=400,height=400');
     //   myWindow.focus();
        location.href = 'message.php?toname='+toname;
    }


</script>

<script>
    $(document).ready(function () {
        $("#friendnavbar").addClass('active');

    });
    function addFriend(id) {
        $.ajax({
            type: "POST",
            url: '../controller/Friend/addFriend.php',
            data:  { fid : id ,uid:<?php echo $userid?>},
            //contentType: "application/json; charset=utf-8",
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

    function delFriend(id) {
        $.ajax({
            type: "POST",
            url: '../controller/Friend/deleteFriend.php',
            data:  { fid : id ,uid:<?php echo $userid?>},
            //contentType: "application/json; charset=utf-8",
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

</html>