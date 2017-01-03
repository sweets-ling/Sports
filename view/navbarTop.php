<?php
@session_start();
if(!isset($_SESSION['userid'])){

    echo "<script>alert('未登录!将返回登录界面....');</script>";
    echo "<meta http-equiv='Refresh' content='0;URL=login.php'>";
}
else {
    include_once('../model/User.php');
    $id = $_SESSION['userid'];
    $dbaddr = "sqlite:../mydatabase.sqlite";
    $user=new User($id,$dbaddr);

    include_once('../model/Message.php');
    $message = new Message($dbaddr);
    $noreadMes=$message->getNotRead($id,1);
    $noreadNotice=$message->getNotRead($id,0);
    session_write_close();
}



?>

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
            <a href="../index.php"> <span class="m-r-sm text-muted welcome-message">Sport＋</span></a>
        </li>
        <li id="homepagenavbar">
            <a aria-expanded="false" role="button" href="homepage.php">个人主页</a>
        </li>
        <li id="sportsnavbar" class="dropdown">
            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 健康<span class="caret"></span></a>
            <ul role="menu" class="dropdown-menu">
                <li><a href="sports.php">我的运动</a></li>
                <li><a href="body.php">身体数据</a></li>
                <li><a href="sleep.php">睡眠状况</a></li>
<!--                <li><a href="suggest_user.php">健康建议</a></li>-->
            </ul>
        </li>
        <li id="activitynavbar" class="dropdown">
            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">活动 <span class="caret"></span></a>
            <ul role="menu" class="dropdown-menu">
                <li><a href="activity.php?type=" discover">探索活动</a></li>
                <li><a href="myActivity.php?type=" my">我的活动</a></li>
            </ul>
        </li>
        <li id="friendnavbar" class="dropdown">
            <a aria-expanded="false" role="button" href="myfriend.php">圈子 </a>


        </li>
        <?php if($user->getAccess($id)=='管理员'){?>
        <li id="adminnavbar" class="dropdown">
            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">管理员 <span class="caret"></span></a>
            <ul role="menu" class="dropdown-menu">
                <li><a href="access.php">权限管理</a></li>
                <li><a href="data.php">导入数据</a></li>

            </ul>
        </li>
        <?php }?>
        <li  class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-bell"></i>  <span class="label label-primary"><?php echo $noreadMes[0]+$noreadNotice[0] ?></span>
            </a>
            <ul class="dropdown-menu dropdown-alerts">

                <li>
                    <a href="message.php">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> 你有<?php echo $noreadMes[0] ?>条新信息
                            <span class="pull-right text-muted small"><?php echo $noreadMes[1] ?>&nbsp;hours ago</span>
                        </div>
                    </a>
                </li>

                <li class="divider"></li>
                <li>
                    <a href="notice.php">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 你有<?php echo $noreadNotice[0] ?>条新通知
                            <span class="pull-right text-muted small"><?php echo $noreadNotice[1] ?>&nbsp;hours ago</span>
                        </div>
                    </a>
                </li>


                <li class="divider"></li>
                <li>
                    <div class="text-center link-block">
                        <a href="settings.php">
                            <strong>进入设置中心</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>

            </ul>
        </li>

        <li>
            <a href="../controller/Login/logout.php">
                <i class="fa fa-sign-out"></i>
            </a>
        </li>

    </ul>
</div>