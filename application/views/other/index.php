<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sports+| HomePage</title>

    <!-- orris -->
    <link  href='<?=base_url().'_static/css/plugins/morris/morris-0.4.3.min.css'?>' rel="stylesheet">

    <link href='<?=base_url().'_static/css/bootstrap.min.css'?>' rel="stylesheet">

    <!-- Animation CSS -->
    <link href='<?=base_url().'_static/css/animate.css'?>' rel="stylesheet">
    <link href='<?=base_url().'_static/font-awesome/css/font-awesome.css'?>' rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href='<?=base_url().'_static/css/style.css'?>' rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <div class="row border-bottom">
            <div class="navbar-header">
                <form role="search" class="navbar-form-custom" action="search_results.html">
                    <div class="form-group">
                        <input type="text" placeholder="搜索活动与用户..." class="form-control" name="top-search" id="top-search">
                    </div>
                </form>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="../login/cover.php"> <span class="m-r-sm text-muted welcome-message">Sport＋</span></a>
                </li>
                <li class="active">
                    <a aria-expanded="false" role="button" href="index.html">个人主页</a>
                </li>
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 健康<span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="../sport/sports.html">我的运动</a></li>
                        <li><a href="../sport/body.html">身体数据</a></li>
                        <li><a href="../sport/sleep.html">睡眠状况</a></li>
                        <li><a href="../sport/suggest_user.html">健康建议</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">活动 <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="../activity/activity.html">发现活动</a></li>
                        <li><a href="../activity/activity.html">我的活动</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">圈子 <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="contacts.html">我的好友</a></li>
                        <li><a href="interest.html">兴趣组</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">

                        <li>
                            <a href="../message/message.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> 你有16条新信息
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="../message/notice.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 个❤新关注
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>


                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="settings.html">
                                    <strong>进入设置中心</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>

                    </ul>
                </li>


                <li>
                    <a href="<?php echo base_url(); ?>index.php/login/loginini">
                        <i class="fa fa-sign-out"></i>
                    </a>
                </li>

            </ul>
        </div>




                <div class="row  border-bottom white-bg dashboard-header">
                  <div class="col-sm-6">
                 <div id="morris-donut-chart" ></div>
                    </div>

                    <div class="col-sm-4">
                         
                        
                            <h3>还需完成</h3>
                            <p class="small"><i class="fa fa-hand-o-up"></i> 赶紧去完成吧！</p>
                            <ul class="sortable-list connectList agile-list">
                                <li class="warning-element">
                                    跳绳30min
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                        <i class="fa fa-clock-o"></i> 12.10.2015
                                    </div>
                                </li>
                             
                                <li class="info-element">
                                    Hiti20min
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                        <i class="fa fa-clock-o"></i> 16.11.2015
                                    </div>
                                </li>
                                <li class="danger-element">
                                    跑步30min
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-primary">Done</a>
                                        <i class="fa fa-clock-o"></i> 06.10.2015
                                    </div>
                                </li>
                            
                                
                            </ul>
                    
                 
                    </div>
                  
                     
                    </div>        

            <div class="row main ">



                <div class="col-xs-12 col-md-8 article-content">
                        <div class="card">
                        <div class="card-block">


                <div class="col-md-5">


   <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>历史运动量</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="morris-one-line-chart"></div>
                        </div>
                    </div>
                    </div>

                       <div class="col-md-7">

                       <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>身体数据<small></small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content" style="position: relative">
                        <div id="morris-area-chart"></div>
                    </div>



    </div>
    </div>



<div class="ibox float-e-margins">
<blockquote>
    <p class="text-primary">我的活动动态</p>
</blockquote>
                        <div class="ibox-title">
                            <h5> 我的动态</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">

                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="../../img/a1.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy">1m ago</small>
                                            <strong>李莹</strong> 关注了<strong>雷噔噔</strong>. <br>
                                            <small class="text-muted">今天 4:21 pm - 12.06.2014</small>
                                            <div class="actions">
                                                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> 点赞 </a>
                                                <a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> 评论</a>
                                            </div>
                                        </div>
                                    </div>

                                 

                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="../../img/a2.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">2h ago</small>
                                            <strong>李莹</strong> 发布了活动感想<br>
                                            <small class="text-muted">今天 2:10 pm - 12.06.2014</small>
                                            <div class="well">
                                                这是一个类似日志的模块，这是一个巨幕。
                                            </div>
                                            <div class="pull-right">
                                                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i>点赞</a>
                                                <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i>评论</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="../../img/a3.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">2h ago</small>
                                            <strong>李莹</strong> 发布了健身图片 <br>
                                            <small class="text-muted">2 天前 8:30am</small>
                                            <div class="photos">
                                           
                                                <a target="_blank" href="../../img/landing/header_two.jpg"> <img alt="image" class="feed-photo" src="../../img/landing/header_two.jpg"></a>
                                                </div>
                                        </div>
                                    </div>
                                  
                                   
                                </div>

                                <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Show More</button>

                            </div>

                        </div>
                    </div>

   

            

</div>
</div>
                </div>
                <div class="col-xs-12 col-md-4 shot-sidebar text-center">
                    <!-- User widget -->
                    <div class="sidebar-block">







                        <div class="text-center">
                            <a href="javascript:void(0);">
                                <img alt="image" class="img-circle" src="../../img/landing/avatar4.jpg" />
                            </a>                   <br/>



                            <a href="javascript:void(0);" class="username">  <h4><strong>令佩糖</strong></h4></a>

                            <p><i class="fa fa-map-marker"></i> 地址</p>
                            <h5>
                                PHP工程师
                            </h5>
                            <p>
                                一个喜欢用毛笔写代码的吃货
                            </p>
                            <div class="row m-t-lg">
                                <div class="col-md-4">
                                    <span class="fa fa-heart"></span>
                                    <h5><strong>169</strong> 活动</h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="fa fa-star"></span>
                                    <h5><strong>28</strong> 关注</h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="fa fa-child"></span>
                                    <h5><strong>240</strong> 粉丝</h5>
                                </div>
                            </div>
                            <div class="user-button">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i>发私信</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> 星标好友</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END User widget -->

                    <!-- Details -->
                    <div class="sidebar-block">
                        <h3>Sports+ 排行榜</h3>
                        <ul class="list-group clear-list m-t ">
                            <li class="list-group-item fist-item  ">
                                <span class="pull-right">
12930步
</span>
                                <span class="label label-success pull-left">1</span>liy

                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
8800步
</span>
                                <span class="label label-info pull-left">2</span> 王子
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
6790步
</span>
                                <span class="label label-primary pull-left">3</span> 噔噔
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
4570步
</span>
                                <span class="label label-default pull-left">4</span> 我
                            </li>

                        </ul>

                    </div>
                    <!-- END Details -->

                    <!-- Details -->
                    <div class="sidebar-block">
                        <h3>好友排行榜</h3>
                        <ul class="list-group clear-list m-t ">
                            <li class="list-group-item fist-item  ">
                                <span class="pull-right">
12930步
</span>
                                <span class="label label-success pull-left">1</span>liy

                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
8800步
</span>
                                <span class="label label-info pull-left">2</span> 王子
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
6790步
</span>
                                <span class="label label-primary pull-left">3</span> 噔噔
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
4570步
</span>
                                <span class="label label-default pull-left">4</span> 我
                            </li>

                        </ul>

                    </div>
                    <!-- END Details -->

                </div>
            </div>


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
    <script src='<?=base_url().'_static/js/jquery-2.1.1.js'?>'></script>
    <script src='<?=base_url().'_static/js/bootstrap.min.js'?>'></script>
    <script src='<?=base_url().'_static/js/plugins/metisMenu/jquery.metisMenu.js'?>'></script>
    <script src='<?=base_url().'_static/js/plugins/slimscroll/jquery.slimscroll.min.js'?>'></script>

    <!-- Custom and plugin javascript -->
    <script src='<?=base_url().'_static/js/inspinia.js'?>'></script>
    <script src='<?=base_url().'_static/js/plugins/pace/pace.min.js'?>'></script>

    <!-- Morris -->
    <script src='<?=base_url().'_static/js/plugins/morris/raphael-2.1.0.min.js'?>'></script>
    <script src='<?=base_url().'_static/js/plugins/morris/morris.js'?>'></script>

    <!-- Morris demo data-->
    <script src='<?=base_url().'_static/js/demo/morris-demo.js'?>'></script>



</body>

</html>
