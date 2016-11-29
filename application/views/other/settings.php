<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sports+| Settings</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">

    <link href="../../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

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
                    <li >
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
                    <a href="../login/login.php">
                        <i class="fa fa-sign-out"></i> 
                    </a>
                </li>
            
            </ul>


        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>设置中心</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">首页</a>
                        </li>
                      
                        <li class="active">
                            <strong>个人信息</strong>
                        </li>
                        <li class="active">
                         <a href="../login/update_password.html">修改密码</a>
                            
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">













































            
         
            <div class="row main">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>编辑个人信息<small>   请填写以下信息</small></h5>
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
                            <form method="get" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">姓名</label>

                                    <div class="col-sm-10"><input type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">邮箱</label>
                                    <div class="col-sm-10"><input type="text" class="form-control"> <span class="help-block m-b-none">这是一个提示信息</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">个人描述</label>

                                    <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">＊＊</label>

                                    <div class="col-sm-10"><input type="text" placeholder="test" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-2 control-label">不可编辑项</label>

                                    <div class="col-lg-10"><input type="text" disabled="" placeholder="Disabled input here..." class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-2 control-label">不可编辑</label>

                                    <div class="col-lg-10"><p class="form-control-static">email@example.com</p></div>
                                </div>
                               
                                <div class="hr-line-dashed"></div>
                              
                              
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Select</label>

                                    <div class="col-sm-10"><select class="form-control m-b" name="account">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                    </select>
                                    </div>
                                </div>
                               
                               
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
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

    <!-- iCheck -->
    <script src="../../js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
</body>

</html>
