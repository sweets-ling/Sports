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
session_write_close();
}
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports+| NewSport</title>

    <link href="../_static/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_static/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../_static/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../_static/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="../_static/css/animate.css" rel="stylesheet">
    <link href="../_static/css/style.css" rel="stylesheet">
    <link href="../_static/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="../_static/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <style>
        .wizard > .content > .body { position: relative; }
    </style>
</head>
<body>

    <div id="wrapper">


        <?php include "navbarTop.php" ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>发现好玩</h2>
                <ol class="breadcrumb">

                    <li class="active">
                        <a href="activity.php">探索活动</a>
                    </li>
                    <li >
                        <a ><strong class="text－center" style="color: #19aa8d">创建＋</strong></a>
                    </li>
                    <li >
                        <a href="myActivity.php">我的</a>
                    </li>
                </ol>
            </div>
        </div>
<div class="row main">
        <div class="col-xs-12 col-md-8 article-content">
            <div class="card">
                <div class="card-block">

                            <blockquote>
                                <p class="text-primary">开始新建活动</p>
                            </blockquote>


                        <div class="ibox-content">


                            <form method="post" class="form-horizontal" action="../controller/Activity/newActivity.php">
                                <div class="form-group" hidden="hidden"><label class="col-sm-4 control-label">活动名称 *</label>
                                    <div class="col-sm-6">
                                        <input id="userName" name="uid" type="text" value='<?php echo $uid?>' placeholder="请填写活动名称" class="form-control required">
                                    </div>

                                </div>

                                    <div class="form-group"><label class="col-sm-4 control-label">活动名称 *</label>
                                        <div class="col-sm-6">
                                            <input id="userName" name="name" type="text" placeholder="请填写活动名称" class="form-control required">
                                        </div>
                                   
                                      </div>

                                    <div class="form-group"><label class="col-sm-4 control-label">活动类型 *</label>
                                        <div class="col-sm-6">
                                            <select name="type" type="text" class="form-control">
                                                <option value="-1">-------请选择活动类型-------</option>
                                                <option value="0">单人活动</option>
                                                <option value="1">双人活动</option>
                                                <option value="2">多人活动</option>
                                                <option value="3">团队活动</option>
                                                <option value="4">计时活动</option>

                                            </select>     </div>

                                    </div>

                                <div class="form-group"><label class="col-sm-4 control-label">活动描述 *</label>
                                    <div class="col-sm-6">
                                        <textarea name="description" class="form-control required" placeholder="请填写活动描述"></textarea>
                                    </div>

                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-4 control-label">选择时间</label>
                                    <div class="col-sm-6">
                                        <i class="fa fa-calendar"></i><span>选择时间范围</span>  <input class="form-control" type="text" name="daterange" value="12/04/2016 - 12/04/2016" />
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-4 control-label">限制参与</label>
                                    <div class="col-sm-6">
                                        <div class="i-checks"><label> <input type="radio" value="0" name="a"> <i></i> 所有用户 </label></div>
                                        <div class="i-checks"><label> <input type="radio" checked="" value="1" name="a"> <i></i> 仅好友（发送系统通知） </label></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <button class="btn btn-white" type="submit">取消</button>
                                        <button class="btn btn-primary" type="submit">确认</button>
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



    <!-- Mainly scripts -->
    <script src="../_static/js/jquery-2.1.1.js"></script>
    <script src="../_static/js/bootstrap.min.js"></script>
    <script src="../_static/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../_static/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../_static/js/inspinia.js"></script>
    <script src="../_static/js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="../_static/js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="../_static/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="../_static/js/plugins/datapicker/bootstrap-datepicker.js"></script>
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
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });

        $('input[name="daterange"]').daterangepicker();

    </script>

</body>

</html>
