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
    $list=$message->getMessageList($id);
    $detail=$message->getMessageDetail($id,$toname);
    session_write_close();
}
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports+| Message</title>


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
                           <strong class="text－center" style="color: #19aa8d">我的私信</strong></a>
                           
                        </li>
                        <li >
                         <a href="notice.php">我的通知</a>
                       
                        </li>
                    </ol>
                </div>
            </div>   

            <div class="row main ">



                <div class="col-xs-12 col-md-8 ">
                        <div class="card">
                        <div class="card-block">


                     <blockquote>
    <p class="text-primary">私信详情</p>
</blockquote>


                <div class="chat-activity-list"  >


                    <div class="chat-activity-list" style="overflow: auto;height:300px">

                    <?PHP $count=1;
                    foreach ($detail as $x) {
                    if($x['sender_id']!=$id) {
                    ?>
                            <div class="chat-element">

                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?php echo $x['sender_image']?>">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy"></small>
                                    <strong><?php
                                                echo $x['sender_name'];
                    ?> </strong>
                                    <p class="m-b-xs">
                                    <h3> <?php echo $x['message_content']?>  </h3>            </p>
                                    <small class="text-muted"><?php echo $x['send_time']?></small>
                                </div>
                            </div>

                                <?php }else{?>

                        <div class="chat-element right">
                            <a href="#" class="pull-right">
                                <img alt="image" class="img-circle" src="<?php echo $x['sender_image']?>">
                            </a>
                            <div class="media-body text-right ">
                                <small class="pull-left"></i></small>
                                <strong>
                                    我</strong>
                                <p class="m-b-xs">
                                <h3> <?php echo $x['message_content']?>  </h3>            </p>
                                <small class="text-muted"><?php echo $x['send_time']?></small>

                            </div>
                        </div>


                    <?php   }?>
                    <?php }?>
                        <div ><a id="msg_end" name="1" href="#1">&nbsp</a></div>

                    </div>



                    <div class="chat-form">
                        <form role="form" action="../controller/Message/addMessage.php?sender=<?php echo $id?>&receiver=<?php echo $toname?>" method="post">
                            <div class="form-group">
                                <textarea name="text" class="form-control" placeholder="Message"></textarea>
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
                                        <?PHP $count=0;
                                        foreach ($list as $item) {
                                        $count++;
                                        ?>
                                        <div class="chat-user" >

                                            <img onclick="jump_to(<?php echo $item['friend_id']?>)"   class="chat-avatar img-circle" src="<?php echo $item['friend_image']?>" alt="" >
                                            <div onclick="jump_to(<?php echo $item['friend_id']?>)"   class="chat-user-name ">
                                                <a onclick="jump_to(<?php echo $item['friend_id']?>)"  ><?php echo $item['friend_name']?></a>
                                            </div>
                                            <div class="row">
                                                <a class="pull-right" onclick="deleteDia(<?php echo $item['friend_id']?>)" ><h6>删除-</h6></a>
                                                <a class="pull-right " onclick="jump_to(<?php echo $item['friend_id']?>)" ><h6>回复|</h6></a>
                                                <a class="pull-right "><h6>共<?php echo $item['message_count']?>条对话|</h6></a>
                                                <a><h6>-<?php echo $item['send_time']?></h6></a>
                                            </div>
                                        </div>
                                        
                                  <?php } ?>


                                    </div>

                             
                            </div>


                    </div>
                    <!-- END User widget -->
                   
                
                   
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
    <script src='../_static/js/demo/morris-demo.js'></script>

</body>

</html>
<script>
    $('#msg_end')[0].click();
</script>
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


