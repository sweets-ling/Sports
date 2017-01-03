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
        $sportdata=$friend->getSport(date('Y-m-d'));
        $date=date('Y-m-d');
    }else {
        $sportdata = $friend->getSport($date);

    }
    $date1=date("m/d/Y", strtotime($date));

  $data=$friend->getSportGraph();
    session_write_close();
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports+| Sleep</title>
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

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
<body>
<div id="wrapper">
    <?php include "navbarTop.php" ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>身体是本钱</h2>
            <ol class="breadcrumb">

                <li >
                    <a ><strong style="color: #19aa8d">运动</strong></a>
                </li>
                <li class="active">
                    <a href="body.php">身体</a>
                </li>
                <li >
                    <a href="sleep.php">睡眠</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="row main">
        <div class="col-xs-12 col-md-8 article-content">
            <div class="card">
                <div class="card-block">


                    <div class="col-md-4">



                        <div class="datacircle red-bg p-lg text-center">
                            <div class="m-b-md">
                                <i class="fa fa-trophy  fa-5x"></i>
                                <hr/>
                                <h3 class="font-bold no-margins">
                                    今日运动已消耗
                                </h3>
                                <h1 class="m-xs"><?php echo $sportdata["calories"]?>KJ</h1>


                            </div>
                        </div>


                    </div>

                    <div class="col-md-8 text-right">
                        <br/><br/><br/><br/>
                        <div class="col-md-3">


                            <label>运动时长</label>

                        </div>
                        <div class="col-md-9">
                            <div class="progress progress-striped">
                                <div style="width: <?php echo $sportdata["minutes"]/400*100?>%" aria-valuemax="500" aria-valuemin="0" aria-valuenow="<?php echo $sportdata["minutes"]?>"
                                     role="progressbar" class="progress-bar progress-bar-warning" data-toggle="tooltip"
                                     data-placement="right" title="<?php echo $sportdata["minutes"]?> 分钟">
                                    <span class="sr-only"><?php echo $sportdata["minutes"]?></span>
                                </div>
                            </div>



                        </div>
                        <br/>
                        <div class="col-md-3">


                            <label>运动距离</label>

                        </div>
                        <div class="col-md-9">
                            <div class="progress progress-striped">
                                <div style="width:  <?php echo $sportdata["meters"]/4000*100?>%" aria-valuemax="4000" aria-valuemin="0"
                                     aria-valuenow=" <?php echo $sportdata["meters"]?>"
                                     role="progressbar" class="progress-bar progress-bar-success"  data-toggle="tooltip"
                                     data-placement="right" title="<?php echo $sportdata["meters"]?> km">
                                    <span class="sr-only"> <?php echo $sportdata["meters"]?></span>
                                </div>
                            </div>



                        </div>
                        <br/>
                        <div class="col-md-3">


                            <label>运动步数</label>

                        </div>
                        <div class="col-md-9">
                            <div class="progress progress-striped">
                                <div style="width:  <?php echo $sportdata["steps"]/10000*100?>%"
                                     aria-valuemax="10000" aria-valuemin="0" aria-valuenow="<?php echo $sportdata["meters"]?>"
                                     role="progressbar" class="progress-bar progress-bar-danger" data-toggle="tooltip"
                                     data-placement="right" title="<?php echo $sportdata["steps"]?> 步">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>



                        </div>


                    </div>


                    <div class="ibox float-e-margins">

                    <blockquote>
                        <p class="text-primary">我的运动分析图</p>
                    </blockquote>


                    <div id="chart1" style="width:100%;height:400px;">

                    </div>

                    <div class="col-md-8">
                        <div id="chart" class="ct-perfect-fourth" style="width: 100%;height:400px;"></div>
                    </div>

                    <div class="col-md-4">
                        <br>
                        <br>
                        <strong>推荐今日运动</strong>

                        <ul class="sortable-list connectList agile-list">
                            <li class="warning-element">
                                有氧操
                                <div class="agile-detail">

                                    <i class="fa fa-clock-o"></i> 30min
                                </div>
                            </li>

                            <li class="info-element">
                                Hit 高强度间歇训练
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-primary">New</a>

                                    <i class="fa fa-clock-o"></i> 20min
                                </div>
                            </li>
                            <li class="danger-element">
                                跑步等户外有氧运动
                                <div class="agile-detail">

                                    <i class="fa fa-clock-o"></i> 1 hour
                                </div>
                            </li>


                        </ul>



                    </div>

                    </div>


                        <div class="ibox float-e-margins">
                    <blockquote>
                        <p class="text-primary">我的运动数据</p>
                    </blockquote>
                        </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-9 m-b-xs">
                                <div data-toggle="buttons" class="btn-group">
<!--                                    <label class="btn btn-sm btn-white  active" onclick="getDayData()"> <input type="radio" id="option1" name="options" > 一日 </label>-->
                                    <label class="btn btn-sm btn-white active" onclick="getWeekData()"> <input type="radio" id="option2" name="options" > 一周 </label>
                                    <label class="btn btn-sm btn-white"  onclick="getMonthData()"> <input type="radio" id="option3" name="options" > 一月</label>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table  id="table3" class="table table-striped" hidden>
                                <thead>
                                <tr class="text-center">
                                    <th>时间</th>
                                    <th>消耗卡路里</th>
                                    <th>运动距离</th>
                                    <th>运动步数</th>
                                    <th>运动时长</th>
                                </tr>
                                </thead>
                                <tbody 🆔id="display2">

                                <?php $count=0;foreach($data as $item){
                                    $count++;
                                    if($count>30){
                                        break;
                                    }
                                    ?>


                                    <tr >
                                        <td><?php echo $item['date']?></td>
                                        <td><?php echo $item['calories']?>卡</td>
                                        <td><?php echo $item['meters']?>km</td>
                                        <td><?php echo $item['steps']?>步</td>
                                        <td><?php echo $item['minutes']?>min</td>


                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>

                            <table  id="table2" class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>时间</th>
                                    <th>消耗卡路里</th>
                                    <th>运动距离</th>
                                    <th>运动步数</th>
                                    <th>运动时长</th>
                                </tr>
                                </thead>
                                <tbody 🆔id="display2">

                                <?php $count=0;foreach($data as $item){
                                    $count++;
                                    if($count>7){
                                        break;
                                    }
                                    ?>


                                    <tr>
                                        <td><?php echo $item['date']?></td>
                                        <td><?php echo $item['calories']?>卡</td>
                                        <td><?php echo $item['meters']?>km</td>
                                        <td><?php echo $item['steps']?>步</td>
                                        <td><?php echo $item['minutes']?>min</td>



                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>



                                </tbody>
                            </table>




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
<script src='../_static/js/plugins/ionRangeSlider/ion.rangeSlider.min.js'></script>



<!-- Chartist -->
<script src='../_static/js/plugins/chartist/chartist.min.js'></script>


<script>
    $(document).ready(function(){

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });


    });
</script>
<!-- Date range use moment.js same as full calendar plugin -->
<script src='../_static/js/plugins/fullcalendar/moment.min.js'></script>

<!-- Date range picker -->
<script src='../_static/js/plugins/daterangepicker/daterangepicker.js'></script>

<!-- IonRangeSlider -->
<script src='../_static/js/plugins/ionRangeSlider/ion.rangeSlider.min.js'></script>


<script>
    $(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

</body>



<script src="../_static/js/echarts.js" type="text/javascript"></script>
<script>
    var myChart = echarts.init(document.getElementById('chart'));





    var data=[];


    $.ajax({
        type: "POST",
        url: '../controller/Sports/getSportsTypeGraph.php',
        datatype: "json",
        success: function (message) {
            var obj = eval("(" + message + ")");//转换后的JSON对象

            for (var i = 0; i < obj.length; i++) {
                data.push({value:obj[i].count,name:obj[i].type});
            }

            option = {
                backgroundColor: '#ffffff',

                title: {
                    text: '运动类型图',
                    left: 'center',
                    top: 20,
                    textStyle: {
                        color: '#000000'
                    }
                },

                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },

                visualMap: {
                    show: false,
                    min: 80,
                    max: 600,
                    inRange: {
                        colorLightness: [0, 1]
                    }
                },
                series: [
                    {
                        name: '运动类型',
                        type: 'pie',
                        radius: '55%',
                        center: ['50%', '50%'],
                        data: data.sort(function (a, b) {
                            return a.value - b.value
                        }),
                        roseType: 'angle',
                        label: {
                            normal: {
                                textStyle: {
                                    color: '#1ab394'
                                }
                            }
                        },
                        labelLine: {
                            normal: {
                                lineStyle: {
                                    color: '#1ab394'
                                },
                                smooth: 0.2,
                                length: 10,
                                length2: 20
                            }
                        },
                        itemStyle: {
                            normal: {
                                color: '#1ab394',
                                shadowBlur: 200,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            myChart.setOption(option);

        }
    });






    var myChart2 = echarts.init(document.getElementById('chart1'));





    var time=[];
    var cal=[];
    var meters=[];
    var steps=[];
    var minutes=[];

    $.ajax({
        type: "POST",
        url: '../controller/Sports/getSportsGraph.php',
        datatype: "json",
        success: function (message) {
                var obj = eval("(" + message + ")");//转换后的JSON对象
                //alert(message);

                for (var i = obj.length-1; i >=0; i--) {
                    time.push(obj[i].date);
                    cal.push(obj[i].calories);
                    meters.push(obj[i].meters);
                    steps.push(obj[i].steps);
                    minutes.push(obj[i].minutes);

                }

                var colors = ['#5793f3', '#d14a61', '#675bba'];

                option2 = {
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
                        data: ['卡路里', '运动距离', '运动步数','运动时间']
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
                            name: '卡路里',
                            position: 'right',
                            offset: 50,
                            axisLine: {
                                lineStyle: {
                                    color: colors[1]
                                }
                            },
                            axisLabel: {
                                formatter: '{value} 卡'
                            }
                        },
                        {
                            type: 'value',
                            name: '运动距离',
                            position: 'right',
                            offset: 100,
                            axisLine: {
                                lineStyle: {
                                    color: colors[1]
                                }
                            },
                            axisLabel: {
                                formatter: '{value} km'
                            }
                        },
                        {
                            type: 'value',
                            name: '运动步数',
                            position: 'right',
                            axisLine: {
                                lineStyle: {
                                    color: colors[0]
                                }
                            },
                            axisLabel: {
                                formatter: '{value} 步'
                            }
                        },

                        {
                            type: 'value',
                            name: '运动时间',
                            position: 'left',
                            axisLine: {
                                lineStyle: {
                                    color: colors[2]
                                }
                            },
                            axisLabel: {
                                formatter: '{value} 分钟'
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
                            name: '卡路里',
                            type: 'bar',
                            data: cal,
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
                            name: '运动距离',
                            type: 'bar',
                            data: meters,
                            yAxisIndex: 1,
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
                            name: '运动步数',
                            type: 'line',
                            yAxisIndex: 2,
                            data: steps,
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
                            name: '运动时间',
                            type: 'line',
                            yAxisIndex: 3,
                            data: minutes,
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
            myChart2.setOption(option2);

        }
    });




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

</html>
