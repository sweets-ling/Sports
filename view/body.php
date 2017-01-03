
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports＋| Body</title>

    <link  href='../../_static/css/plugins/chosen/chosen.css' rel="stylesheet">

    <link  href='../_static/css/plugins/iCheck/custom.css' rel="stylesheet">
    <link  href='../_static/css/plugins/colorpicker/bootstrap-colorpicker.min.css' rel="stylesheet">
    <link  href='../_static/css/plugins/cropper/cropper.min.css' rel="stylesheet">

    <link  href='../_static/css/plugins/switchery/switchery.css' rel="stylesheet">
    <link  href='../_static/css/plugins/jasny/jasny-bootstrap.min.css'  rel="stylesheet">
    <link  href='../_static/plugins/nouslider/jquery.nouislider.css'  rel="stylesheet">
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
        $myBody=$friend->getBody(date('Y-m-d'));
        $date=date('Y-m-d');
       // echo $date;
    }else {
        $myBody = $friend->getBody($date);

    }
    $date1=date("m/d/Y", strtotime($date));
    $bodyTable=$friend->getBodyTable();
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
                            <a href="sports.php">   运动</a>
                        </li>
                        <li class="active">
                          <a ><strong style="color: #19aa8d">身体</strong></a>
                        </li>
                        <li >
                            <a href="sleep.php">睡眠</a>
                        </li>
                    </ol>
                </div>
    </div>
        <div class="wrapper wrapper-content animated fadeInRight main">


<div class="col-xs-12 col-md-8 article-content">
                        <div class="card">
                        <div class="card-block">


                <div class="col-md-4">

            

                    <div class="datacircle navy-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-child  fa-5x"></i>
                            <hr/>
                               <h3 class="font-bold no-margins">
                                BMI
                            </h3>
                            <h1 class="m-xs"><?php if(($myBody['height'])==0){ echo "无数据";} else{$num=floatval(floatval($myBody['weight'])/floatval(($myBody['height'])*($myBody['height'])));
                                echo sprintf("%.2f", $num);}?></h1>

                         
                        </div>
                    </div>


                    </div>

                       <div class="col-md-8 text-right">
                       <br/>

                       <div class="row">
<div class="col-md-7"></div>
<div class="col-md-4">
    <form id="dateform" method="post" action="../controller/Sports/getBody.php" class="form-horizontal">
        <div class="form-group" id="data_1">
            <div class="input-group date" >
                <span class="input-group-addon"><i class="fa fa-calendar" "></i></span>
                <input type="text" name="date" class="form-control" value="<?php echo $date1?>" onchange="getBody()">
            </div>
        </div>
    </form>


</div>
 </div>

                       <br/><br/>
                      
                             <div class="col-md-3">
                           

                           <label>BMI</label>

                       </div>
                         <div class="col-md-9">
                           <div class="progress progress-striped active">
                                <div style="width: 15%" class="progress-bar progress-bar-success"
                                     data-toggle="tooltip"
                                     data-placement="bottom" title="偏瘦（<18.5）"
                                >
                                    <span class="sr-only">20% Complete (success)</span>
                                </div>
                                <div style="width: 35%" class="progress-bar progress-bar-navy"
                                     data-toggle="tooltip"
                                     data-placement="bottom" title="健康（<24）"
                                >
                                    <span class="sr-only">35% Complete (warning)</span>
                                </div>
                                <div style="width: 25%" class="progress-bar progress-bar-warning"
                                     data-toggle="tooltip"
                                     data-placement="bottom" title="超重（<28）"
                                >
                                    <span class="sr-only">10% Complete (danger)</span>
                                </div>
                                <div style="width: 25%" class="progress-bar progress-bar-danger"   data-toggle="tooltip"
                                     data-placement="bottom" title="肥胖"
                                >
                                    <span class="sr-only">45% Complete (danger)</span>
                                </div>
                            </div>
                             <br>
                            <div style="color:#19aa8d">
                                <?php if(($myBody['height'])==0){
                                    echo "无数据";
                                } else{
                                    $num=floatval(floatval($myBody['weight'])/floatval(($myBody['height'])*($myBody['height'])));
                                    if(sprintf("%.2f", $num)<18.5){
                                        echo '偏瘦！';
                                    }else if(sprintf("%.2f", $num)<24){
                                        echo '健康！';
                                    }else if(sprintf("%.2f", $num)<28){
                                        echo '超重！';
                                    }else{
                                        echo '肥胖！';
                                    }}?>
                            </div>
                         </div>
                       

    </div>



<div class="ibox float-e-margins">
<blockquote>
    <p class="text-primary">我的体重心率图</p>
</blockquote>


    <div id="chart1" style="width:100%;height:400px;">

    </div>

    <blockquote>
        <p class="text-primary">更新身高体重数据</p>
    </blockquote>

    <form action="../controller/Sports/updateHeight.php" method="post">

                    <div class="col-md-8">
                    

                        <input name='height' id="ionrange_4"/>
                        <br/>
                           <input name='weight' id="ionrange_3"/>
                        <br/>


                    </div>
                    
                     <div class="col-md-4" >
                           
                     <br/><br/>
                         <strong class="text-center">最近瘦了吗！</strong><br>

                         <strong class="text-center">快来更新你的身高体重数据</strong>
                                        
 <br/>
                     
                     <br/> <br/>
                     <div class="col-md-4"></div>
                     <div class="col-md-6">
                         <input id='uid' name="uid",value="<?php echo $userid?>" hidden/>
                         <button type="submit" class="margin－bottom btn btn-primary btn-sm btn-block" ">
                         <i class="fa fa-child"></i>更新</button></div>
                     </div>
    </form>
<div class="ibox float-e-margins">
    <blockquote>
        <p class="text-primary">我的身体数据</p>
    </blockquote>

    <div class="ibox-content">
            <div class="row">
                <div class="col-sm-9 m-b-xs">
                    <div data-toggle="buttons" class="btn-group">
<!--                        <label class="btn btn-sm btn-white  active" onclick="getDayData()"> <input type="radio" id="option1" name="options" > 一日 </label>-->
                        <label class="btn btn-sm btn-white active" onclick="getWeekData()"> <input type="radio" id="option2" name="options" > 一周 </label>
                        <label class="btn btn-sm btn-white"  onclick="getMonthData()"> <input type="radio" id="option3" name="options" > 一月</label>
                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <table  id="table2" class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>时间</th>
                        <th>身高</th>
                        <th>体重</th>
                        <th>心率</th>
                    </tr>
                    </thead>
                    <tbody 🆔id="display2">

                    <?php $count=0;foreach($bodyTable as $item){
                        $count++;
                        if($count>7){
                            break;
                        }
                        ?>


                        <tr >
                            <td><?php echo $item['update_time']?></td>
                            <td><?php echo $item['height']?></td>
                            <td><?php echo $item['weight']?></td>
                            <td><?php echo $item['heart']?></td>

                        </tr>
                    <?php }?>

                    </tbody>
                </table>

                <table  id="table3" class="table table-striped" hidden>
                    <thead>
                    <tr class="text-center">
                        <th>时间</th>
                        <th>身高</th>
                        <th>体重</th>
                        <th>心率</th>
                    </tr>
                    </thead>
                    <tbody 🆔id="display2">

                    <?php $count=0;foreach($bodyTable as $item){
                        $count++;
                        if($count>30){
                            break;
                        }
                        ?>


                        <tr >
                            <td><?php echo $item['update_time']?></td>
                            <td><?php echo $item['height']?></td>
                            <td><?php echo $item['weight']?></td>
                            <td><?php echo $item['heart']?></td>

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





        });
    </script>
    <!-- Date range use moment.js same as full calendar plugin -->
    <script src='../_static/js/plugins/fullcalendar/moment.min.js'></script>

    <!-- Date range picker -->
    <script src='../_static/js/plugins/daterangepicker/daterangepicker.js'></script>

    <!-- IonRangeSlider -->
    <script src='../_static/js/plugins/ionRangeSlider/ion.rangeSlider.min.js'></script>



    <script src="../_static/js/echarts.js"></script>

    <script>
        $(document).ready(function(){

            var time=[];
            var height=[];
            var weight=[];
            var heart=[];


            $.ajax({
                type: "POST",
                url: '../controller/Sports/getBodyGraph.php',
                data: {date: <?php echo $date?>},
                datatype: "json",
                success: function (message) {
                    var obj = eval("(" + message + ")");//转换后的JSON对象
                    //alert(message);

                    for (var i = obj.length-1; i >=0; i--) {

                        time.push(obj[i].update_time);
                       height.push(obj[i].height);
                        weight.push(obj[i].weight);
                        heart.push(obj[i].heart);

                    }

                    var colors = ['#5793f3', '#d14a61', '#675bba'];

                    option = {
                        color: colors,

                        tooltip: {
                            trigger: 'axis'
                        },
                        grid: {
                            right: '20%'
                        },
                        toolbox: {
                            feature: {
                                dataView: {show: true, readOnly: false},
                                restore: {show: true},
                                saveAsImage: {show: true}
                            }
                        },
                        legend: {
                            data: ['身高', '体重', '心率']
                        },
                        xAxis: [
                            {
                                type: 'category',
                                axisTick: {
                                    alignWithLabel: true
                                },
                                data: time

                            }
                        ],
                        yAxis: [
                            {
                                type: 'value',
                                name: '身高',
                                position: 'right',
                                offset: 80,
                                axisLine: {
                                    lineStyle: {
                                        color: colors[1]
                                    }
                                },
                                axisLabel: {
                                    formatter: '{value} m'
                                }
                            },
                            {
                                type: 'value',
                                name: '体重',
                                position: 'right',
                                axisLine: {
                                    lineStyle: {
                                        color: colors[0]
                                    }
                                },
                                axisLabel: {
                                    formatter: '{value} kg'
                                }
                            },

                            {
                                type: 'value',
                                name: '心率',
                                position: 'left',
                                axisLine: {
                                    lineStyle: {
                                        color: colors[2]
                                    }
                                },
                                axisLabel: {
                                    formatter: '{value} premin'
                                }
                            }
                        ],
                        dataZoom: [
                            {   // 这个dataZoom组件，默认控制x轴。
                                type: 'slider', // 这个 dataZoom 组件是 slider 型 dataZoom 组件
                                start: 90,      // 左边在 10% 的位置。
                                end: 100         // 右边在 60% 的位置。
                            }
                        ],

                        series: [
                            {
                                name: '身高',
                                type: 'bar',
                                data: height,
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
                                }
                            },
                            {
                                name: '体重',
                                type: 'line',
                                yAxisIndex: 1,
                                data: weight,
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
                                }
                            },
                            {
                                name: '心率',
                                type: 'line',
                                yAxisIndex: 2,
                                data: heart,
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
                                }
                            }
                        ]
                    };

                    // 使用刚指定的配置项和数据显示图表。

                    var chart = document.getElementById('chart1');
                    var myChart = echarts.init(chart);
                    myChart.setOption(option);

                }
            });


        $("#ionrange_3").ionRangeSlider({
            min: 0.4,
            max: 2,
            from: 1.5,
            step: 0.01,
            postfix: "m",
            prettify: false,
            hasGrid: true
        });

            $("#ionrange_4").ionRangeSlider({
                min: 0,
                max: 100,
                from: 50,
                step: 0.01,
                postfix: " kg",
                prettify: false,
                hasGrid: true
            });


            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });


        });

        function getBody(){
            $('#dateform').submit();

        }
        function updateHeight(){
var dx=$('#ionrange_3').val();
            alert(dx);
            $.ajax({
                type: "POST",
                url: '../controller/Sports/updateHeight.php',
                data: {height:$('#ionrange_3').value,weight: $("#ionrange_4").value,uid:<?php echo $userid?>},
                //contentType: "application/json; charset=utf-8",
                datatype: "json",
                success: function (message) {

                        window.location.reload();


                }
            });

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

    <script>
        $(function () { $("[data-toggle='tooltip']").tooltip(); });
    </script>

</body>

</html>
