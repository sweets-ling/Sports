<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sports+| Message</title>


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
                    <li>
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
                            <a href="message.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> 你有16条新信息
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="notice.html">
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
                <div class="row wrapper border-bottom white-bg page-heading text－center">
                <div class="col-lg-9 ">
                    <h2 class="text－center">通知中心</h2>
                    <ol class="breadcrumb text－center">
                        <li>
                            <a href="../other/index.html">首页</a>
                        </li>
                         <li class="active">
                          <a href="message.html"> <strong class="text－center">私信</strong></a>
                           
                        </li>
                        <li >
                         <a href="notice.html">通知</a>
                       
                        </li>
                    </ol>
                </div>
            </div>   

            <div class="row main ">



                <div class="col-xs-12 col-md-8 article-content">
                        <div class="card">
                        <div class="card-block">


                     <blockquote>
    <p class="text-primary">我的私信</p>
</blockquote>


                <div class="chat-activity-list">

                    <div class="chat-element">
                        <a href="#" class="pull-left">
                            <img alt="image" class="img-circle" src="../../img/a2.jpg">
                        </a>
                        <div class="media-body ">
                            <small class="pull-right text-navy">1m ago</small>
                            <strong>Mike Smith</strong>
                            <p class="m-b-xs">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            </p>
                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                        </div>
                    </div>

                    <div class="chat-element right">
                        <a href="#" class="pull-right">
                            <img alt="image" class="img-circle" src="../../img/a4.jpg">
                        </a>
                        <div class="media-body text-right ">
                            <small class="pull-left">5m ago</small>
                            <strong>John Smith</strong>
                            <p class="m-b-xs">
                                Lorem Ipsum is simply dummy text of the printing.
                            </p>
                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                        </div>
                    </div>

                    <div class="chat-element ">
                        <a href="#" class="pull-left">
                            <img alt="image" class="img-circle" src="../../img/a2.jpg">
                        </a>
                        <div class="media-body ">
                            <small class="pull-right">2h ago</small>
                            <strong>Mike Smith</strong>
                            <p class="m-b-xs">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            </p>
                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                        </div>
                    </div>
                    <div class="chat-form">
                            <form role="form">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-sm btn-primary m-t-n-xs"><strong>Send message</strong></button>
                                </div>
                            </form>
                        </div>

                </div>
           
            
   

            

</div>
</div>
                </div>
                <div class="col-xs-12 col-md-4 shot-sidebar text-center">
                    <!-- User widget -->
                    <div class="sidebar-block">



                              
                                


                        <div class="text-center">
                                <div class="chat-users">


                                    <div class="users-list text-left">
                                        <div class="chat-user">
                                            <img class="chat-avatar img-circle" src="../../img/a4.jpg" alt="" >
                                            <div class="chat-user-name ">
                                                <a href="#">Karl Jordan</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <img class="chat-avatar img-circle" src="../../img/a1.jpg" alt="" >
                                            <div class="chat-user-name ">
                                                <a href="#">Monica Smith</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <span class="pull-right pull-buttom label label-warning">1</span>
                                            <img class="chat-avatar img-circle" src="../../img/a2.jpg" alt="" >
                                            <div class="chat-user-name ">
                                                <a href="#">Michael Smith</a>
                                            </div>
                                        </div>
                                        
                                  


                                    </div>

                             
                            </div>


                    </div>
                    <!-- END User widget -->
                   
                
                   
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