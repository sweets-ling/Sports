
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports+| Sleep</title>

    <link  href='../_static/css/plugins/chosen/chosen.css' rel="stylesheet">

    <link  href='../_static/css/plugins/iCheck/custom.css' rel="stylesheet">
    <link  href='../_static/css/plugins/colorpicker/bootstrap-colorpicker.min.css' rel="stylesheet">
    <link  href='../_static/css/plugins/cropper/cropper.min.css' rel="stylesheet">

    <link  href='../_static/css/plugins/switchery/switchery.css' rel="stylesheet">
    <link  href='../_static/css/plugins/jasny/jasny-bootstrap.min.css' rel="stylesheet">
    <link  href='../_static/plugins/nouslider/jquery.nouislider.css' rel="stylesheet">
    <link  href='../_static/css/plugins/datapicker/datepicker3.css' rel="stylesheet">

    <link  href='../_static/css/plugins/ionRangeSlider/ion.rangeSlider.css' rel="stylesheet">
    <link  href='../_static/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css' rel="stylesheet">
    <link  href='../_static/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css' rel="stylesheet">
    <link  href='../_static/css/plugins/clockpicker/clockpicker.css' rel="stylesheet">
    <link  href='../_static/css/plugins/daterangepicker/daterangepicker-bs3.css' rel="stylesheet">
    <link  href='../_static/css/plugins/select2/select2.min.css' rel="stylesheet">
    <link  href='../_static/css/plugins/chartist/chartist.min.css' rel="stylesheet">

    <link href='../_static/css/bootstrap.min.css' rel="stylesheet">

    <!-- Animation CSS -->
    <link href='../_static/css/animate.css' rel="stylesheet">
    <link href='../_static/font-awesome/css/font-awesome.css' rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href='../_static/css/style.css' rel="stylesheet">

</head>
<?php
@session_start();
if(!isset($_SESSION['userid'])){

    echo "<script>alert('未登录!将返回登录界面....');</script>";
    echo "<meta http-equiv='Refresh' content='0;URL=login.php'>";
}
else {

    include_once('../model/User.php');
    $userid = $_SESSION['userid'];
    $dbaddr = "sqlite:../mydatabase.sqlite";
    include_once('../model/Sport.php');
    $friend= new Sport($userid,$dbaddr);
    $date=$_REQUEST['date'];
    if($date==null){
        $mySleep=$friend->getSleep(date('Y-m-d'));
        $date=date('Y-m-d');
    }else {
        $mySleep = $friend->getSleep($date);

    }
    $date1=date("m/d/Y", strtotime($date));
    $sleepGraph=$friend->getSleepGraph($date);
    $sleepTable=$friend->getSleepTable();
   // var_export($result);
    session_write_close();
}
?>
<body>

    <div id="wrapper">
        <?php include "navbarTop.php" ?>

    <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>身体是本钱</h2>
                    <ol class="breadcrumb">

                        <li >
                            <a href="sports.php">  运动</a>
                        </li>
                        <li class="active">
                            <a href="body.php">身体</a>
                        </li>
                        <li >
                           <a ><strong style="color: #19aa8d">睡眠</strong></a>
                        </li>
                    </ol>
                </div>
            </div>


    
        <div class="wrapper wrapper-content animated fadeInRight main">


<div class="col-xs-12 col-md-8 article-content">
                        <div class="card">
                        <div class="card-block">


                <div class="col-md-4">

            

                    <div class="datacircle lazur-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-cloud  fa-5x"></i>
                            <hr/>
                               <h3 class="font-bold no-margins">
                                 睡眠有效率
                            </h3>
                            <h1 class="m-xs"><?php echo $mySleep['sleep_complete']?>%</h1>

                         
                        </div>
                    </div>


                    </div>

                       <div class="col-md-8 text-right">
                       <br/>
                       <div class="row">
            <div class="col-md-7"></div>
                <div class="col-md-4">
              <form id="dateform" method="post" action="../controller/Sports/getSleep.php" class="form-horizontal">
                <div class="form-group" id="data_1">
                         <div class="input-group date" >
                                    <span class="input-group-addon"><i class="fa fa-calendar" "></i></span>
                             <input type="text" name="date" class="form-control" value="<?php echo $date1?>" onchange="getSleep()">
                                </div>
                            </div>
    </form>
</div>
 </div>
                       <br/><br/>
                      
                             <div class="col-md-3">
                           

                           <label>睡眠时间</label>
                       </div>
                         <div class="col-md-9">
                           <div class="progress progress-striped active">

                                <div style="width:<?php $v1=floatval($mySleep['light_minutes']/$mySleep['total_minutes']*100);echo floatval($mySleep['light_minutes']/$mySleep['total_minutes']*100);?>%"
                                     class="progress-bar progress-bar-warning"
                                     data-toggle="tooltip"
                                     data-placement="bottom" title="浅睡眠：<?php echo $mySleep["light_minutes"]?> 分钟（ <?php echo $v1?> %）"
                                >
                                </div>
                                <div style="width:<?php echo floatval(100-$v1)?>%"
                                     data-toggle="tooltip"
                                     data-placement="bottom" title="<?php echo $sportdata["steps"]?> 深睡眠：<?php echo $mySleep["deep_minutes"]?> 分钟（<?php echo floatval(100-$v1)?>  %）"
                                     class="progress-bar progress-bar-success">
                                </div>
                            </div>
                             <br>
                            <div>睡眠质量：<strong style="color: #19aa8d;">
                                    <?php if($mySleep['sleep_complete']>80){
                                        echo '你的睡眠质量很好，继续保持哦';
                                    }else if($mySleep['sleep_complete']>60){
                                        echo '良好，保持早睡早起的习惯哦';
                                    }else {
                                        echo '你需要早点睡觉，tips：可以使用睡眠香薰帮助睡眠哦';
                                    }?>

                                </strong></div>
                         </div>
                       

    </div>



<div class="ibox float-e-margins">
<blockquote>
    <p class="text-primary">我的睡眠曲线图</p>
</blockquote>


   <div id="chart1" style="width:100%;height:400px;">

                    </div>



<div class="ibox float-e-margins">

    <blockquote>
        <p class="text-primary">我的睡眠数据</p>
    </blockquote>

    <div class="ibox-content">
            <div class="row">
                <div class="col-sm-9 m-b-xs">
                    <div data-toggle="buttons" class="btn-group">
                        <label class="btn btn-sm btn-white  active" onclick="getDayData()"> <input type="radio" id="option1" name="options" > 一日 </label>
                        <label class="btn btn-sm btn-white" onclick="getWeekData()"> <input type="radio" id="option2" name="options" > 一周 </label>
                        <label class="btn btn-sm btn-white"  onclick="getMonthData()"> <input type="radio" id="option3" name="options" > 一月</label>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table  id="table3" class="table table-striped" hidden>
                    <thead>
                    <tr class="text-center">
                        <th>时间</th>
                        <th>睡眠总时间</th>
                        <th>浅睡眠时间</th>
                        <th>深睡眠时间</th>
                        <th>睡眠完成度</th>
                    </tr>
                    </thead>
                    <tbody 🆔id="display2">

                    <?php $count=0;foreach($sleepTable as $item){
                        $count++;
                        if($count>30){
                            break;
                        }
                        ?>


                        <tr class="text-center">
                            <td><?php echo $item['date']?></td>
                            <td><?php echo $item['total_minutes']?>min</td>
                            <td><?php echo $item['light_minutes']?>min</td>
                            <td><?php echo $item['deep_minutes']?>min</td>

                            <?php if($item['sleep_complete']>80){?>
                                <td class="success"> <?php echo $item['sleep_complete']?>%</td>
                            <?php   }else if($item['sleep_complete']>60){?>
                                <td class="warning"> <?php echo $item['sleep_complete']?>%</td>
                            <?php }else {?>
                                <td class="danger"> <?php echo $item['sleep_complete']?>%</td>
                            <?php }?>

                        </tr>
                    <?php }?>

                    </tbody>
                </table>

                <table  id="table2" class="table table-striped" hidden>
                    <thead>
                    <tr class="text-center">
                        <th>时间</th>
                        <th>睡眠总时间</th>
                        <th>浅睡眠时间</th>
                        <th>深睡眠时间</th>
                        <th>睡眠完成度</th>
                    </tr>
                    </thead>
                    <tbody 🆔id="display2">

                    <?php $count=0;foreach($sleepTable as $item){
                        $count++;
                        if($count>7){
                            break;
                        }
                        ?>


                    <tr class="text-center">
                        <td><?php echo $item['date']?></td>
                        <td><?php echo $item['total_minutes']?>min</td>
                        <td><?php echo $item['light_minutes']?>min</td>
                        <td><?php echo $item['deep_minutes']?>min</td>

                        <?php if($item['sleep_complete']>80){?>
                        <td class="success"> <?php echo $item['sleep_complete']?>%</td>
                     <?php   }else if($item['sleep_complete']>60){?>
                        <td class="warning"> <?php echo $item['sleep_complete']?>%</td>
                       <?php }else {?>
                        <td class="danger"> <?php echo $item['sleep_complete']?>%</td>
                    <?php }?>

                    </tr>
                    <?php }?>

                    </tbody>
                </table>

                <table id="table1" class="table table-striped">
                    <thead>
                    <tr>
                        <th>时间</th>
                        <th>睡眠数据</th>
                        <th>睡眠状态</th>
                    </tr>
                    </thead>
                    <tbody 🆔id="display1">
                    <?php for($i=0;$i<72;$i++){
                        ?>


                        <tr >
                            <td><?php echo $sleepGraph['time'][$i]?></td>
                            <td><?php echo $sleepGraph['value'][$i]?></td>


                            <?php if($sleepGraph['value'][$i]>10){?>
                                <td class="success">深睡</td>
                            <?php   }else if($sleepGraph['data'][$i]>0){?>
                                <td class="warning"> 浅睡</td>
                            <?php }else {?>
                                <td class="danger">无睡眠</td>
                            <?php }?>

                        </tr>
                    <?php }?>

                    </tbody>
                </table>
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

    <script src="../_static/js/echarts.js"></script>
    <script>
        $(document).ready(function(){
            var chart=document.getElementById('chart1');
            var myChart = echarts.init(chart);

            var time=[];
            var data=[];

            $.ajax({
                type: "POST",
                url: '../controller/Sports/getSleepDayChart.php',
                data:  { date: <?php echo $date?>},
                datatype: "json",
                success: function (message) {
                    var obj = eval( "(" + message + ")" );//转换后的JSON对象


                    for( var i=0;i<obj.time.length;i++){

                        time.push(obj.time[i]);
                        data.push(obj.value[i]);

                    }

                    option = {

                        title: {
                            text: '睡眠每二十分钟数据',

                        },
                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            data:['睡眠指标']
                        },
                        toolbox: {
                            show: true,
                            feature: {
                                dataZoom: {},
                                dataView: {readOnly: false},
                                magicType: {type: ['line', 'bar']},
                                restore: {},
                                saveAsImage: {}
                            }
                        },
                        xAxis:  {
                            type: 'category',
                            boundaryGap: false,
                            data: time
                        },
                        yAxis: {
                            type: 'value',
                            axisLabel: {
                                formatter: '{value} '
                            }
                        },
                        series: [
                            {
                                name:'睡眠指标',
                                type:'line',
                                data:data,
                                color: '#23c6c8',
                                markPoint: {
                                    data: [
                                        {type: 'max', name: '最大值'},
                                        {type: 'min', name: '最小值'}
                                    ]
                                },
                                markLine: {
                                    data: [
                                        {type: 'average', name: '平均值'}
                                    ]
                                },
                                markLine : {
                                    data : [
                                        [{
                                            name : '进入深睡眠',
                                            value : 9.9,
                                            xAxis : 0,
                                            yAxis : 9.9,
                                        }, {
                                            xAxis : 71,
                                            yAxis : 9.9
                                        }
                                        ]
                                    ]
                                }
                            }
                        ]
                    };

                    myChart.setOption(option);










                }
            });



            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $(function () { $("[data-toggle='tooltip']").tooltip(); });


            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

        $(".dial").knob();











        });

        function getSleep(){
            $('#dateform').submit();

        }

        function getDayData(){
            $('#table1').removeAttr('hidden');
            $('#table2').attr('hidden','true');
            $('#table3').attr('hidden','true');
        }
        function getWeekData(){
            $('#table2').removeAttr('hidden');
            $('#table1').attr('hidden','true');
            $('#table3').attr('hidden','true');
        }
        function getMonthData(){
            $('#table3').removeAttr('hidden');
            $('#table1').attr('hidden','true');
            $('#table2').attr('hidden','true');
        }
    </script>

</body>



</html>



