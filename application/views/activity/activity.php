<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sports+| Activity</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

       
            <div class="row border-bottom">
       
        <div class="navbar-header">
            <form role="search" class="navbar-form-custom" action="../other/search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="搜索活动与用户..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>

       <ul class="nav navbar-top-links navbar-right">

               <li>
                   <a href="../login/cover.php"> <span class="m-r-sm text-muted welcome-message">Sport＋</span></a>
                </li>
                    <li >
                        <a aria-expanded="false" role="button" href="../other/index.html">个人主页</a>
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
                    <li class="dropdown active">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">活动 <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="activity.html">发现活动</a></li>
                            <li><a href="activity.html">我的活动</a></li>
                         
                        </ul>
                    </li> 
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">圈子 <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="../other/contacts.html">我的好友</a></li>
                            <li><a href="../other/interest.html">兴趣组</a></li>
                         
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
                                <a href="../other/settings.html">
                                    <strong>进入设置中心</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="../login/login.php">
                        <i class="fa fa-sign-out"></i> 
                    </a>
                </li>
            
            </ul>


        </div>
         <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>我的活动</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="../other/index.html">首页</a>
                        </li>
                        <li class="active">
                            <a href="new_activity.html"><strong>创建＋</strong></a>
                        </li>
                        <li >
                            发现
                        </li>
                        <li >
                            管理
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row main">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content animated fadeInRight">

                        <div class="ibox-content m-b-sm border-bottom">
                            <div class="p-xs">
                                <div class="pull-left m-r-md">
                                    <i class="fa fa-futbol-o text-navy mid-icon"></i>
                                </div>
                                <h2>选择竞赛类型</h2>
                                <span>单人竞赛 双人竞赛 多人竞赛 团队竞赛 计时竞赛</span>
                            </div>
                        </div>

                        <div class="ibox-content forum-container">
                         <div class="form-group" id="data_3">
                                                               <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                                </div>
                            </div>

                            <div class="forum-title">
                                <div class="pull-right forum-desc">
                                    <samll>参与人数: 10</samll>
                                </div>
                                <h3>热门活动</h3>
                            </div>

                            <div class="forum-item active">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="forum-icon">
                                            <i class="fa fa-shield"></i>
                                        </div>
                                        <a href="forum_post.html" class="forum-item-title">活动1</a>
                                        <div class="forum-sub-title">这里是活动描述</div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            1
                                        </span>
                                        <div>
                                            <small>关注</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            3
                                        </span>
                                        <div>
                                            <small>点赞</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            5
                                        </span>
                                        <div>
                                            <small>评论</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="forum-item">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="forum-icon">
                                            <i class="fa fa-bolt"></i>
                                        </div>
                                         <a href="forum_post.html" class="forum-item-title">活动1</a>
                                        <div class="forum-sub-title">这里是活动描述</div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            1
                                        </span>
                                        <div>
                                            <small>关注</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            3
                                        </span>
                                        <div>
                                            <small>点赞</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            5
                                        </span>
                                        <div>
                                            <small>评论</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            

                  

                        </div>
                    </div>
                </div>
            </div>
  

        </div>
        </div>

    <!-- Mainly scripts -->
    <script src="../../js/jquery-2.1.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../../js/inspinia.js"></script>
    <script src="../../js/plugins/pace/pace.min.js"></script>


</body>

</html>