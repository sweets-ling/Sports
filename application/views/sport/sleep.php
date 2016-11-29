
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sports+| Sleep</title>



    <link  href='<?=base_url().'_static/css/plugins/chosen/chosen.css'?>' rel="stylesheet">

    <link  href='<?=base_url().'_static/css/plugins/iCheck/custom.css'?>' rel="stylesheet">
    <link  href='<?=base_url().'_static/css/plugins/colorpicker/bootstrap-colorpicker.min.css'?>' rel="stylesheet">
    <link  href='<?=base_url().'_static/css/plugins/cropper/cropper.min.css'?>' rel="stylesheet">

    <link  href='<?=base_url().'_static/css/plugins/switchery/switchery.css'?>' rel="stylesheet">
    <link  href='<?=base_url().'_static/css/plugins/jasny/jasny-bootstrap.min.css'?>' rel="stylesheet">
    <link  href='<?=base_url().'_static/plugins/nouslider/jquery.nouislider.css'?>' rel="stylesheet">
    <link  href='<?=base_url().'_static/css/plugins/datapicker/datepicker3.css'?>' rel="stylesheet">

    <link  href='<?=base_url().'_static/css/plugins/ionRangeSlider/ion.rangeSlider.css'?>' rel="stylesheet">
    <link  href='<?=base_url().'_static/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css'?>' rel="stylesheet">
    <link  href='<?=base_url().'_static/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css'?>' rel="stylesheet">
    <link  href='<?=base_url().'_static/css/plugins/clockpicker/clockpicker.css'?>' rel="stylesheet">
    <link  href='<?=base_url().'_static/css/plugins/daterangepicker/daterangepicker-bs3.css'?>' rel="stylesheet">
    <link  href='<?=base_url().'_static/css/plugins/select2/select2.min.css'?>' rel="stylesheet">



    <link  href='<?=base_url().'_static/css/plugins/chartist/chartist.min.css'?>' rel="stylesheet">

    <link href='<?=base_url().'_static/css/bootstrap.min.css'?>' rel="stylesheet">

    <!-- Animation CSS -->
    <link href='<?=base_url().'_static/css/animate.css'?>' rel="stylesheet">
    <link href='<?=base_url().'_static/font-awesome/css/font-awesome.css'?>' rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href='<?=base_url().'_static/css/style.css'?>' rel="stylesheet">

</head>

<body>

    <div id="wrapper">
            <div class="row border-bottom">
       
        <div class="navbar-header">
            <form role="search" class="navbar-form-custom" action="../other/search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="搜索活动与用户..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>

       <ul class="nav navbar-top-links navbar-right">

               <li>
                   <a href="../login/cover.php"> <span class="m-r-sm text-muted welcome-message">Sport＋</span></a>
                </li>
                    <li >
                        <a aria-expanded="false" role="button" href="../other/index.html">个人主页</a>
                    </li>
                    <li class="dropdown active">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 健康<span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="sports.html">我的运动</a></li>
                            <li><a href="body.html">身体数据</a></li>
                            <li><a href="sleep.html">睡眠状况</a></li>
                            <li><a href="suggest_user.html">健康建议</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">活动 <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="../activity/activity.html">发现活动</a></li>
                            <li><a href="../activity/activity.html">我的活动</a></li>
                         
                        </ul>
                    </li> 
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">圈子 <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="../other/contacts.html">我的好友</a></li>
                            <li><a href="../other/interest.html">兴趣组</a></li>
                         
                        </ul>
                    </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="../message/message.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> 你有16条新信息
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../message/notice.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 个❤新关注
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        
                      
                        <li class="divider"></li>
                    
                        <li>
                            <div class="text-center link-block">
                                <a href="../other/settings.html">
                                    <strong>进入设置中心</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="../login/login.php">
                        <i class="fa fa-sign-out"></i> 
                    </a>
                </li>
            
            </ul>


        </div>

    <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>身体是本钱</h2>
                    <ol class="breadcrumb">
                        <li>
                      <a href="../other/index.html">首页</a>
                        </li>
                        <li >
                            <a href="sports.html">运动</a>
                        </li>
                        <li class="active">
                            <a href="body.html">身体</a>
                        </li>
                        <li >
                            <a href="sleep.html"><strong>睡眠</strong></a>
                        </li><li>
                            <a href="suggest_user.html">建议</a>
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
                            <h1 class="m-xs">79%</h1>

                         
                        </div>
                    </div>


                    </div>

                       <div class="col-md-8 text-right">
                       <br/>
                       <div class="row">
<div class="col-md-7"></div>
<div class="col-md-5">
    <div class="form-group" id="data_1">
                                                               <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                                </div>
                            </div>


</div>
 </div>

                       <br/><br/>
                      
                             <div class="col-md-3">
                           

                           <label>睡眠时间</label>

                       </div>
                         <div class="col-md-9">
                           <div class="progress progress-striped active">
                              
                                <div style="width: 5%" class="progress-bar progress-bar-warning">
                                    <span class="sr-only">35% Complete (warning)</span>
                                </div>
                                <div style="width: 15%" class="progress-bar progress-bar-navy">
                                    <span class="sr-only">10% Complete (danger)</span>
                                </div>
                                 <div style="width: 30%" class="progress-bar progress-bar-success">
                                    <span class="sr-only">10% Complete (danger)</span>
                                </div>
                                  <div style="width: 15%" class="progress-bar progress-bar-navy">
                                    <span class="sr-only">10% Complete (danger)</span>
                                </div>
                                 <div style="width: 35%" class="progress-bar progress-bar-warning">
                                    <span class="sr-only">10% Complete (danger)</span>
                                </div>
                              
                            </div>
                            <div>加入提示信息，何时开始睡眠，何时醒来，有效睡眠时间为多少小时！</div>



                         </div>
                       

    </div>



<div class="ibox float-e-margins">
<blockquote>
    <p class="text-primary">我的睡眠</p>
</blockquote>


   <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>睡眠曲线图
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <div id="ct-chart1" class="ct-perfect-fourth"></div>
                        </div>
                    </div>

                  
              



<div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>详细数据</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-9 m-b-xs">
                    <div data-toggle="buttons" class="btn-group">
                        <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> Day </label>
                        <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> Week </label>
                        <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> Month </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>#</th>
                        <th>Project </th>
                        <th>Name </th>
                        <th>Phone </th>
                        <th>Company </th>
                        <th>Completed </th>
                        <th>Task</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Project <small>This is example of project</small></td>
                        <td>Patrick Smith</td>
                        <td>0800 051213</td>
                        <td>Inceptos Hymenaeos Ltd</td>
                        <td><span class="pie">0.52/1.561</span></td>
                        <td>20%</td>
                        <td>Jul 14, 2013</td>
                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Alpha project</td>
                        <td>Alice Jackson</td>
                        <td>0500 780909</td>
                        <td>Nec Euismod In Company</td>
                        <td><span class="pie">6,9</span></td>
                        <td>40%</td>
                        <td>Jul 16, 2013</td>
                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Betha project</td>
                        <td>John Smith</td>
                        <td>0800 1111</td>
                        <td>Erat Volutpat</td>
                        <td><span class="pie">3,1</span></td>
                        <td>75%</td>
                        <td>Jul 18, 2013</td>
                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                    </tr>
      
  
  
                    </tbody>
                </table>
            </div>

        </div>
        </div>

                      
                       
                    </div>

   

            

</div>
</div>
                </div>
                <div class="col-xs-12 col-md-4 shot-sidebar text-center">
                    <!-- User widget -->
                    <div class="sidebar-block">

                        <div class="text-center">
                                                            <a href="javascript:void(0);">
                                   <img alt="image" class="img-circle" src="../../img/landing/avatar4.jpg" />
                                </a>                   <br/>       



                                  <a href="javascript:void(0);" class="username">  <h4><strong>令佩糖</strong></h4></a>

                                <p><i class="fa fa-map-marker"></i> 地址</p>
                                <h5>
                                    PHP工程师
                                </h5>
                                <p>
                                   一个喜欢用毛笔写代码的吃货  
                                </p>
                                <div class="row m-t-lg">
                                    <div class="col-md-4">
                                        <span class="fa fa-heart"></span>
                                        <h5><strong>169</strong> 活动</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="fa fa-star"></span>
                                        <h5><strong>28</strong> 关注</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="fa fa-child"></span>
                                        <h5><strong>240</strong> 粉丝</h5>
                                    </div>
                                </div>
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i>发私信</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> 星标好友</button>
                                        </div>
                                    </div>
                                </div>
                        
                        </div>
                    </div>
                    <!-- END User widget -->
                   
                    <!-- Details -->
                    <div class="sidebar-block">
                        <h3>Sports+ 排行榜</h3>
                        <ul class="list-group clear-list m-t ">
                            <li class="list-group-item fist-item  ">
                                <span class="pull-right">
                                   12930步
                                </span>
                                <span class="label label-success pull-left">1</span>liy

                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    8800步
                                </span>
                                <span class="label label-info pull-left">2</span> 王子
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                   6790步
                                </span>
                                <span class="label label-primary pull-left">3</span> 噔噔
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    4570步
                                </span>
                                <span class="label label-default pull-left">4</span> 我
                            </li>
                           
                        </ul>

                    </div>
                    <!-- END Details -->

                    <!-- Details -->
                    <div class="sidebar-block">
                        <h3>好友排行榜</h3>
                        <ul class="list-group clear-list m-t ">
                            <li class="list-group-item fist-item  ">
                                <span class="pull-right">
                                   12930步
                                </span>
                                <span class="label label-success pull-left">1</span>liy

                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    8800步
                                </span>
                                <span class="label label-info pull-left">2</span> 王子
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                   6790步
                                </span>
                                <span class="label label-primary pull-left">3</span> 噔噔
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    4570步
                                </span>
                                <span class="label label-default pull-left">4</span> 我
                            </li>
                           
                        </ul>

                    </div>
                    <!-- END Details -->
                   
                </div>
        </div>


            </div>
     
        </div>

    </div>






























    <!-- Mainly scripts -->
    <script src='<?=base_url().'_static/js/jquery-2.1.1.js'?>'></script>
    <script src='<?=base_url().'_static/js/bootstrap.min.js'?>'></script>
    <script src='<?=base_url().'_static/js/plugins/metisMenu/jquery.metisMenu.js'?>'></script>
    <script src='<?=base_url().'_static/js/plugins/slimscroll/jquery.slimscroll.min.js'?>'></script>

    <!-- Custom and plugin javascript -->
    <script src='<?=base_url().'_static/js/inspinia.js'?>'></script>
    <script src='<?=base_url().'_static/js/plugins/pace/pace.min.js'?>'></script>



    <!-- Chartist -->
    <script src='<?=base_url().'_static/js/plugins/chartist/chartist.min.js'?>'></script>



    <!-- Date range use moment.js same as full calendar plugin -->
    <script src='<?=base_url().'_static/js/plugins/fullcalendar/moment.min.js'?>'></script>

    <!-- Date range picker -->
    <script src='<?=base_url().'_static/js/plugins/daterangepicker/daterangepicker.js'?>'></script>

    <!-- IonRangeSlider -->
    <script src='<?=base_url().'_static/js/plugins/ionRangeSlider/ion.rangeSlider.min.js'?>'></script>








    <script>
        $(document).ready(function(){


            // Simple line

            new Chartist.Line('#ct-chart1', {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                series: [
                    [12, 9, 7, 8, 5],
                    [2, 1, 3.5, 7, 3],
                    [1, 3, 4, 5, 6]
                ]
            }, {
                fullWidth: true,
                chartPadding: {
                    right: 40
                }
            });


            // Line scatter diagram

            var times = function(n) {
                return Array.apply(null, new Array(n));
            };

            var data = times(26).map(Math.random).reduce(function(data, rnd, index) {
                data.labels.push(index + 1);
                data.series.forEach(function(series) {
                    series.push(Math.random() * 100)
                });

                return data;
            }, {
                labels: [],
                series: times(4).map(function() { return new Array() })
            });

            var options = {
                showLine: false,
                axisX: {
                    labelInterpolationFnc: function(value, index) {
                        return index % 13 === 0 ? 'W' + value : null;
                    }
                }
            };

            new Chartist.Line('#ct-chart2', data, options);


            // Stocked bar chart

            new Chartist.Bar('#ct-chart3', {
                labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                series: [
                    [800000, 1200000, 1400000, 1300000],
                    [200000, 400000, 500000, 300000],
                    [100000, 200000, 400000, 600000]
                ]
            }, {
                stackBars: true,
                axisY: {
                    labelInterpolationFnc: function(value) {
                        return (value / 1000) + 'k';
                    }
                }
            }).on('draw', function(data) {
                        if(data.type === 'bar') {
                            data.element.attr({
                                style: 'stroke-width: 30px'
                            });
                        }
                    });


            // Stocked horizontal bar

            new Chartist.Bar('#ct-chart4', {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                series: [
                    [5, 4, 3, 7, 5, 10, 3],
                    [3, 2, 9, 5, 4, 6, 4]
                ]
            }, {
                seriesBarDistance: 10,
                reverseData: true,
                horizontalBars: true,
                axisY: {
                    offset: 70
                }
            });


            // Simple pie chart

            var data = {
                series: [5, 3, 4]
            };

            var sum = function(a, b) { return a + b };

            new Chartist.Pie('#ct-chart5', data, {
                labelInterpolationFnc: function(value) {
                    return Math.round(value / data.series.reduce(sum) * 100) + '%';
                }
            });

            // Gauge chart

            new Chartist.Pie('#ct-chart6', {
                series: [20, 10, 30, 40]
            }, {
                donut: true,
                donutWidth: 60,
                startAngle: 270,
                total: 200,
                showLabel: false
            });

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

































   

    <script>
        $(document).ready(function(){

          

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 200,
            type: 'single',
            step: 0.01,
            postfix: " KG",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_3").ionRangeSlider({
            min: 0,
            max: 3,
            from: 1.5,
            postfix: "m",
            prettify: false,
            hasGrid: true
        });

       
        });


    </script>

</body>

</html>
