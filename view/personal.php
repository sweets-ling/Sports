<?php
@session_start();
if(!isset($_SESSION['userid'])){

    echo "<script>alert('未登录!将返回登录界面....');</script>";
    echo "<meta http-equiv='Refresh' content='0;URL=login.php'>";
}
else {
    include_once('../model/User.php');
    $id = $_SESSION['userid'];
    $getId=$_REQUEST['homeid'];
    $dbaddr = "sqlite:../mydatabase.sqlite";
   if($getId!=null){
       $account = new User($getId, $dbaddr);
   }else{
       $account = new User($id, $dbaddr);
   }


    $nickname = $account->getUserName();
    $money = $account->getMoney();
    $description = $account->getDescription();
    $level=$account->getLevel();
    $location=$account->getLocation();
    $imgurl=$account->getImgurl();
    $activityAnd=$account->getActAndFriend();

    include_once('../model/Sport.php');
    $sport = new Sport($id, $dbaddr);
    $rankmy=$sport->getRankMySelf();
    $rankall=$sport->getRankAll();
    $_SESSION['level'] = $level;
    session_write_close();
}
?>
<div class="col-xs-12 col-md-4 shot-sidebar text-center">
    <!-- User widget -->
    <div class="sidebar-block">

        <div class="text-center">

               <a href="settings.php"><img alt="image" class="img-circle" style="width: 40.7%" src="<?php echo $imgurl?>" /></a>
            <br/>



          <h4><strong><?PHP echo $nickname ?></strong></h4>

            <p><i class="fa fa-map-marker"></i> <?php echo $location?></p>

            <br>
            <h3>
               爱好 <?php echo $account->getHobby()?>
            </h3>
            <p>
             <?php echo $description?>
            </p>
            <div class="row m-t-lg">
                <div class="col-md-4">
                    <span class="fa fa-heart"></span>
                    <h5><strong> <?php echo $activityAnd[0]?></strong> 活动</h5>
                </div>
                <div class="col-md-4">
                    <span class="fa fa-star"></span>
                    <h5><strong><?php echo $activityAnd[1]?></strong>关注</h5>
                </div>
                <div class="col-md-4">
                    <span class="fa fa-child"></span>
                    <h5><strong><?php echo $activityAnd[2]?></strong>粉丝</h5>
                </div>
            </div>
            <br/>



            <?php if($getId!=null){?>
                <div class="user-button">

                    <div class="row">
                        <div class="col-md-6">
                         <a href="message.php?toname=<?php echo $getId?>">   <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i>发私信</button></a>
                        </div>
                        <div class="col-md-6">
                            <button onclick="addFriend(<?php echo $getId?>)" type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-star"></i> 加关注</button>
                        </div>
                    </div>
                </div>
           <?php }else{

            }?>


        </div>
    </div>
    <!-- END User widget -->

    <!-- Details -->
    <div class="sidebar-block">
        <ul class="list-group clear-list m-t ">
            <li class="list-group-item fist-item  ">
                                <span class="pull-right">
<?php echo $rankmy[1] ?>步
</span>
                <span class="label label-success pull-left"><?php echo $rankmy[0] ?></span>我的排名

            </li>
            <br/>
            <h3>Sports+排行榜</h3>
            <?PHP $count=0;
            foreach ($rankall as $item) {
                $count++;
                 ?>

                <li class="list-group-item  ">
                                <span class="pull-right">
                                        <?php echo($item['steps'])?>步
                                    </span>
                    <?php if($count==1){?>
                    <span class="  pull-left"  style="background-image:url('../_static/img/css.png');
background-position: 21px -92px; width:20px">&nbsp;</span><?php echo $item['name'];
                 }else if($count==2){?>
                    <span class="  pull-left"  style="background-image:url('../_static/img/css.png');
background-position: 21px -110px; width:22px">&nbsp;</span><?php echo $item['name'];
                } else if($count==3){?>
                    <span class=" pull-left"  style="background-image:url('../_static/img/css.png');
background-position: 21px -131px; width:20px">&nbsp;</span><?php echo $item['name'];
                     } else{?>
                    <span class="label label-primary pull-left"><?php echo $count ?></span><?php echo $item['name'];
                    } ?>
                </li>
                <?PHP
            }?>

        </ul>

    </div>
    <!-- END Details -->

<!--    <!-- Details -->
<!--    <div class="sidebar-block">-->
<!--        <h3>好友排行榜</h3>-->
<!--        <ul class="list-group clear-list m-t ">-->
<!--            <li class="list-group-item fist-item  ">-->
<!--                                <span class="pull-right">-->
<!--12930步-->
<!--</span>-->
<!--                <span class="label label-success pull-left">1</span>liy-->
<!---->
<!--            </li>-->
<!--            <li class="list-group-item">-->
<!--                                <span class="pull-right">-->
<!--8800步-->
<!--</span>-->
<!--                <span class="label label-info pull-left">2</span> 王子-->
<!--            </li>-->
<!--            <li class="list-group-item">-->
<!--                                <span class="pull-right">-->
<!--6790步-->
<!--</span>-->
<!--                <span class="label label-primary pull-left">3</span> 噔噔-->
<!--            </li>-->
<!--            <li class="list-group-item">-->
<!--                                <span class="pull-right">-->
<!--4570步-->
<!--</span>-->
<!--                <span class="label label-default pull-left">4</span> 我-->
<!--            </li>-->
<!---->
<!--        </ul>-->
<!---->
<!--    </div>-->
<!--    <!-- END Details -->
</div>
</div>
<script>
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
</script>