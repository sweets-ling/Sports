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
    $uid = $_SESSION['userid'];
    $user=new User($uid,"sqlite:../mydatabase.sqlite");
    session_write_close();
}
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports+| Settings</title>

    <link href="../_static/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_static/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../_static/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="../_static/css/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="../_static/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../_static/css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="../_static/css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="../_static/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="../_static/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="../_static/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="../_static/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="../_static/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="../_static/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="../_static/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="../_static/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="../_static/css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="../_static/css/animate.css" rel="stylesheet">
    <link href="../_static/css/style.css" rel="stylesheet">


</head>

<body>
    <div id="wrapper">
     <div id="wrapper">
         <?php include "navbarTop.php" ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>设置中心</h2>
                    <ol class="breadcrumb">
                        <li class="active">
                            <strong style="color: #19aa8d">个人信息</strong>
                        </li>
                        <li class="active">
                            <a href="img.php">编辑头像</a>
                        </li>
<!--                        <li class="active">-->
<!--                         <a href="update_password.php">修改密码</a>-->
<!--                            -->
<!--                        </li>-->
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">


         
            <div class="row main">
                <div  class="col-xs-12 col-md-8 ">
                    <div class="card">
                        <div class="card-block">
                            <blockquote>
                                <p class="text-primary">编辑个人信息</p>
                            </blockquote>



                            <div class="ibox-content text-center">
                            <form method="post" class="form-horizontal text-center" action="../controller/Login/saveSetting.php">
                                <div class="form-group"><label class="col-sm-4 control-label" >昵称</label>

                                    <div class="col-sm-6"><input type="text"  name="name" class="form-control" value="<?php echo $user->getUserName()?>" placeholder="请输入用户昵称"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-4 control-label">性别</label>
                                    <div class="col-sm-6"><select name="sex"type="text" class="form-control" value="<?php echo $user->getSex()?>">
                                        <option value="男">男</option>
                                            <option value="女">女</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-4 control-label">地址</label>

                                    <div class="col-lg-6"><input type="text"   name="location" value="<?php echo $user->getLocation()?>" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-4 control-label">爱好</label>

                                    <div class="col-lg-6"><input type="text"  name="hobby" value="<?php echo $user->getHobby()?>" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-4 control-label">个人描述</label>

                                    <div class="col-sm-6"><textarea type="text" name="description" class="form-control"><?php echo $user->getDescription()?></textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-3">
                                        <button class="btn btn-white" ><a href="settings.php">取消</a></button>
                                        <button class="btn btn-primary" type="submit"> 确认</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

                <?php include "personal.php"?>
        </div>


        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="../_static/js/jquery-2.1.1.js"></script>
    <script src="../_static/js/bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../_static/js/inspinia.js"></script>
    <script src="../_static/js/plugins/pace/pace.min.js"></script>
    <script src="../_static/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="../_static/js/plugins/chosen/chosen.jquery.js"></script>

    <!-- JSKnob -->
    <script src="../_static/js/plugins/jsKnob/jquery.knob.js"></script>

    <!-- Input Mask-->
    <script src="../_static/js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- Data picker -->
    <script src="../_static/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- NouSlider -->
    <script src="../_static/js/plugins/nouslider/jquery.nouislider.min.js"></script>

    <!-- Switchery -->
    <script src="../_static/js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="../_static/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="../_static/js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="../_static/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="../_static/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="../_static/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="../_static/js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="../_static/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="../_static/js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="../_static/js/plugins/select2/select2.full.min.js"></script>

    <script>
        $(document).ready(function(){

            var $image = $(".image-crop > img")
            $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                        files = this.files,
                        file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function() {
                $.ajax({
                    type: "POST",
                    url: '../controller/Login/saveimg.php',
                    data:  { img : $image.cropper("getDataURL")},
                    //contentType: "application/json; charset=utf-8",
                    datatype: "json",
                    success: function (message) {
                        window.open($image.cropper("getDataURL"));
                        alert($image.cropper("getDataURL"));
                       alert(message);
                    }
                });

            });

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            });




        });

        $(".dial").knob();



    </script>
</body>

</html>
