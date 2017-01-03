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

                         <a href="settings.php">个人信息</a>
                     </li>
                     <li class="active">

                         <strong style="color: #19aa8d">编辑头像</strong>
                     </li>
<!--                     <li class="active">-->
<!--                         <a href="update_password.php">修改密码</a>-->
<!---->
<!--                     </li>-->
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
                                <p class="text-primary">编辑头像</p>
                            </blockquote>



                            <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="../controller/Login/saveSetting.php">

                               


                                <div class="form-group"><label class="col-lg-2 control-label">上传头像</label>
                                    <div class="col-lg-10 ">
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="image-crop">
                                                <img style="width:5%" src="<?php echo $user->getImgurl() ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            </div>
                                        <div class="col-lg-4">

                                            <div class="img-preview img-preview-sm"></div>



                                        </div>

</div>
                                        <br/>
                                        <div class=" btn-group">
                                            <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                                <input type="file" accept="image/*" name="file" id="inputImage" class="hide">
                                                选择图片
                                            </label>
                                            <label title="Donload image" id="download" class="btn btn-default">上传</label>
                                        </div>


                                    </div>
                                </div>
                                

                               
                               
                                <div class="hr-line-dashed"></div>

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

                       alert("头像上传成功");
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
