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

    <link href="../_static/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="../_static/css/plugins/dropzone/dropzone.css" rel="stylesheet">



</head>

<body>
<div id="wrapper">
    <div id="wrapper">
        <?php include "navbarTop.php" ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>管理员模式</h2>
                <ol class="breadcrumb">
                    <li class="active">

                        <a href="access.php">设置权限</a>
                    </li>
                    <li class="active">
                        <strong style="color: #19aa8d">导入数据</strong>
                    </li>

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
                                <p class="text-primary">选择JSON文档</p>
                            </blockquote>
                            <div class="ibox-content text-center">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ibox float-e-margins">
                                            <form action="../controller/Sports/importData.php" method='post' enctype="multipart/form-data">
                                              <div class="form-group">
                                                  <input type="file" name="file" />
                                              </div>
                                                <div class="form-group row"><h3 class="col-sm-2 control-label">数据类型</h3>
                                                    <div class="col-sm-6">
                                                        <select name="type" type="text" class="form-control">
                                                            <option value="-1">-------请选择数据类型-------</option>
                                                            <option value="0">运动数据</option>
                                                            <option value="1">睡眠数据</option>
                                                        </select>     </div>
                                                    <div class="col-sm-4">
                                                        <button type="submit" class="btn btn-primary pull-right">导入数据集</button>
                                                    </div>

                                                </div>

                                            </form>
                                                <form id="my-awesome-dropzone" class="dropzone" action="../controller/Sports/importData.php" method='post' enctype="multipart/form-data" hidden>
                                                    <div class="dropzone-previews"></div>
                                                    <div class="form-group row"><h3 class="col-sm-2 control-label">数据类型</h3>
                                                        <div class="col-sm-6">
                                                            <select name="type" type="text" class="form-control">
                                                                <option value="-1">-------请选择数据类型-------</option>
                                                                <option value="0">运动数据</option>
                                                                <option value="1">运动详细数据</option>
                                                                <option value="2">运动类型数据</option>
                                                                <option value="3">身体数据</option>
                                                                <option value="4">睡眠数据</option>
                                                            </select>     </div>
                                                        <div class="col-sm-4">
                                                            <button type="submit" class="btn btn-primary pull-right">导入数据集</button>
                                                        </div>

                                                    </div>

                                                </form>
                                                <div>
                                                    <div class="m text-right"><small>请选择格式正确的xml文档进行导入数据，数据集定义详情见api文档<br><a href="http://open.codoon.com/page/index" target="_blank">http://open.codoon.com/page/index</a></small> </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
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



    <script src="../_static/js/plugins/metisMenu/jquery.metisMenu.js"></script>


    <!-- DROPZONE -->
    <script src="../_static/js/plugins/dropzone/dropzone.js"></script>


    <script>
        $(document).ready(function(){

            Dropzone.options.myAwesomeDropzone = {
                url:"../controller/Sports/importData.php",
                autoProcessQueue:false,
                uploadMultiple: false,
                parallelUploads: 100,
                maxFiles: 100,

                // Dropzone settings
                init: function() {
                    var myDropzone = this;

                    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    });
                    this.on("sendingmultiple", function() {
                    });
                    this.on("successmultiple", function(files, response) {
                    });
                    this.on("errormultiple", function(files, response) {
                    });
                }

            }




        });
    </script>


</body>

</html>





