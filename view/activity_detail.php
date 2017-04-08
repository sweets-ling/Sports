<!DOCTYPE html>
<html>
<?php
@session_start();
if (!isset($_SESSION['userid'])) {

    echo "<script>alert('未登录!将返回登录界面....');</script>";
    echo "<meta http-equiv='Refresh' content='0;URL=login.php'>";
} else {

    include_once('../model/User.php');
    $userid = $_SESSION['userid'];
    $dbaddr = "sqlite:../mydatabase.sqlite";

    include_once('../model/Activity.php');
    $friend = new Activity($dbaddr);
    $activityid = $_REQUEST['activityid'];
    $activityDetail = $friend->getActivityDetail($activityid);

    session_write_close();
}
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description"
          content="This page is about the sport management，sport competition and social intercourse.">
    <title>Sports+| Activity</title>

    <!-- orris -->
    <link href='../_static/css/plugins/morris/morris-0.4.3.min.css' rel="stylesheet">

    <link href='../_static/css/bootstrap.min.css' rel="stylesheet">

    <!-- Animation CSS -->
    <link href='../_static/css/animate.css' rel="stylesheet">
    <link href='../_static/font-awesome/css/font-awesome.css' rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href='../_static/css/style.css' rel="stylesheet">
    <style>
        .star {
            margin: 5px;
            width: 15px;
            height: 15px;
            background-color: black;
            float: left;
            cursor: pointer;
        }
    </style>

</head>

<body>

<div id="wrapper">
    <?php include "navbarTop.php" ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>我的活动</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="../other/index.html">首页</a>
                </li>
                <li class="active">
                    <a href="new_activity.php"><strong>创建＋</strong></a>
                </li>
                <li>
                    发现
                </li>
                <li>
                    管理
                </li>
            </ol>
        </div>
    </div>

    <div class="row main">

        <div class="col-xs-12 col-md-8 article-content">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <a onclick="joinActivity(<?php echo $activityDetail['id'] ?>)"
                                   class="btn btn-white btn-xs pull-right">加入</a>
                                <h2><?php echo $activityDetail['name'] ?></h2>
                            </div>
                            <dl class="dl-horizontal">
                                <dt>状态：</dt>
                                <dd><span class="label label-primary">正在进行</span></dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <dl class="dl-horizontal">
                                <dt>创建者:</dt>
                                <dd><a href="homepage.php?userid=<?php echo $activityDetail['userid'] ?>"
                                       class="text-navy"> <?php echo $activityDetail['username'] ?></a></dd>
                                <br/>
                                <dt>开始时间:</dt>
                                <dd> <?php echo $activityDetail['begintime'] ?></dd>

                                <dt>结束时间:</dt>
                                <dd> <?php echo $activityDetail['endtime'] ?> </dd>
                            </dl>
                        </div>
                        <div class="col-lg-7" id="cluster_info">
                            <dl class="dl-horizontal">


                                <dt>参与者:</dt>
                                <dd class="project-people">
                                    <?php $member = $friend->getMyActivityMember($activityDetail['id']);
                                    foreach ($member as $x) {
                                        ?>
                                        <a href=""><img alt="image" class="img-circle" src="<?php echo $x['imgurl'] ?>"></a>
                                    <?php } ?>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row dl-horizontal col-lg-9">
                        <dt>描述:</dt>
                        <dd><?php echo $activityDetail['description'] ?></dd>
                    </div>

                    <div class="row">
                        <br>
                        <div class="col-lg-12">
                            <dl class="dl-horizontal">
                                <dt>完成度:</dt>
                                <dd>
                                    <div class="progress progress-striped active m-b-sm">
                                        <div style="width: 60%;" class="progress-bar"></div>
                                    </div>
                                    <small>活动完成度<strong>60%</strong>.继续加油哦</small>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <?php
                    if ($friend->state($activityDetail['begintime'], $activityDetail['endtime']) == 2&&$_SESSION['userid']!=$activityDetail['userid']) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <dl class="dl-horizontal">
                                    <dt>评价:</dt>
                                    <dd>
                                        <div class="">
                                            <div class="star" name=1></div>
                                            <div class="star" name=2></div>
                                            <div class="star" name=3></div>
                                            <div class="star" name=4></div>
                                            <div class="star" name=5></div>
                                        </div>
                                        <button class="btn btn-sm btn-primary" onclick="addStar()">确认</button>
                                    </dd>
                                </dl>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                    <blockquote>
                        <p class="text-primary">评论</p>
                    </blockquote>

                    <div class="row m-t-sm">
                        <div class="col-lg-12">

                            <div class="panel-body">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1">
                                        <div class="feed-activity-list">


                                            <?php $comment = $friend->getActivityComment($activityDetail['id']);

                                            foreach ($comment as $y) {
                                                ?>


                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle"
                                                             src="<?php echo $y['imgurl'] ?>">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right"><?php echo $y['time'] ?></small>
                                                        <strong><?php echo $y['username'] ?></strong> 发送了一条评论。 <br>

                                                        <div class="well">
                                                            <?php echo $y['content'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>

                                    </div>


                                </div>
                                <br/>
                                <br/> <br/>
                                <br/>
                                <div class="chat-form">
                                    <form role="form"
                                          action="../controller/Activity/comment.php?aid=<?php echo $activityDetail['id'] ?>"
                                          method="post">
                                        <div class="form-group" hidden="">
                                            <input name="uid" class="form-control" value="<?php echo $userid ?>"
                                                   placeholder="快来发表你的评论吧！"/>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="text" class="form-control"
                                                      placeholder="快来发表你的评论吧！"></textarea>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-sm btn-primary m-t-n-xs">
                                                <strong>发表评论</strong></button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php include "personal.php" ?>
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

    function joinActivity(id) {
        $.ajax({
            type: "POST",
            url: '../controller/Activity/joinActivity.php',
            data: {aid: id, uid: <?php echo $userid?>},
            datatype: "json",
            success: function (message) {

                alert(message);
                window.location.reload();


            }
        });
    }
    function addStar() {
        $.ajax({
            type: "POST",
            url: '../controller/Activity/evaluate.php',
            data: {aid: <?=$activityDetail['id']?>, star: star,uid:<?=$_SESSION['userid']?>},
            success: function (message) {
                alert("评价成功");
            }
        });
    }
    var star = 0;
    $('.star').mouseenter(function () {
        compare($(this).attr('name'));
    });
    $('.star').mouseleave(function () {
        compare(star);
    });
    function compare(num) {
        for (var i = 0; i < $('.star').length; i++) {
            if ($($('.star')[i]).attr('name') <= num) {
                $($('.star')[i]).css('background-color', 'white');
            } else {
                $($('.star')[i]).css('background-color', 'black');
            }
        }
    }
    $('.star').click(function () {
        star = $(this).attr('name');
    });
</script>

</html>
