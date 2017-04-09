<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports+| HomePage</title>

    <!-- orris -->
    <link  href='../_static/css/plugins/morris/morris-0.4.3.min.css' rel="stylesheet">

    <link href='../_static/css/bootstrap.min.css' rel="stylesheet">

    <!-- Animation CSS -->
    <link href='../_static/css/animate.css' rel="stylesheet">
    <link href='../_static/font-awesome/css/font-awesome.css' rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href='../_static/css/style.css' rel="stylesheet">

</head>
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
    include_once('../model/Dynamic.php');
    $friend= new Dynamic($userid,$dbaddr);
    include_once('../model/Sport.php');
    $sport= new Sport($userid,$dbaddr);
    include_once('../model/Activity.php');
    $activity = new Activity($dbaddr);

        $sportdata=$sport->getSport(date('Y-m-d'));


   $dynamic=$friend->getDynamic();
    session_write_close();
}
?>

<body>

    <div id="wrapper">
        <?php include "navbarTop.php" ?>
                <div class="row  border-bottom white-bg dashboard-header">
                  <div class="col-sm-6">
                 <div id="morris-donut-chart" style="height: 280px;"></div>
                    </div>

                    <div class="col-sm-4">
                         
                        
                            <h3>今日推荐</h3>
                            <p class="small"><i class="fa fa-hand-o-up"></i>快去约小伙伴一起运动吧！</p>

                        <ul class="sortable-list connectList agile-list " style="cursor: default">
                            <?php
                            foreach($activity->getRecommendActivity() as $item){
                                $activityDetail = $activity->getActivityDetail($item['aid']);
                                ?>
                                <li class="warning-element" onclick="location.href='/view/activity_detail.php?activityid=<?=$activityDetail['id']?>'">
                                    <?=$activityDetail['name']?>
                                    <div class="agile-detail">
                                        <?=$activityDetail['description']?>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>


                    </div>
                  
                     
                    </div>        

            <div class="row main ">

                <div class="col-xs-12 col-md-8 article-content">
                        <div class="card">
                        <div class="card-block">


<div class="ibox float-e-margins">
<blockquote>
    <p class="text-primary">好友动态</p>
</blockquote>

                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">




                                    <?php
                                    foreach ($dynamic as $item) {
                                    ?>
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="<?php echo $item['imgurl']?>">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right"><?php echo $item['time']?></small>
                                            <strong><?php echo $item['content']?></strong><br>
                                                <div class="well">
                                                    <?php echo $item['detail']?>
                                            </div>
                                            <div class="pull-right">
                                                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i>点赞</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                                  
                                   
                                </div>

<!--                                <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Show More</button>-->

                            </div>

                        </div>
                    </div>

   

            

</div>
</div>
                </div>
       <?php include "personal.php"?>


              <div class="wrapper wrapper-content animated fadeInRight" >
            <div class="row">
                <div class="col-lg-6">

            </div>
        
            </div>
          
            <div class="row">
                <div class="col-lg-6">
                 
                </div>
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

    <!-- Morris -->
    <script src='../_static/js/plugins/morris/raphael-2.1.0.min.js'></script>
    <script src='../_static/js/plugins/morris/morris.js'></script>

    <!-- Morris demo data-->
<!--    <script src='../_static/js/demo/morris-demo.js'></script>-->

</body>
<script>

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{ label: "今日步数", value: <?php echo $sportdata['steps']?>},
            { label: "距离健康步数", value:  <?php echo 10000-$sportdata['steps']?>},
        ],
        resize: true,
        colors: ['#87d6c6', '#54cdb4','#1ab394'],
    });
</script>
</html>
