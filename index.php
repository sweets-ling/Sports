
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="lpt">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports+｜ Cover</title>

    <!-- Bootstrap core CSS -->
    <link href='_static/css/bootstrap.min.css' rel="stylesheet">

    <!-- Animation CSS -->
    <link href='_static/css/animate.css' rel="stylesheet">
    <link href='_static/font-awesome/css/font-awesome.min.css' rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href='_static/css/style.css' rel="stylesheet">

</head>
<body id="page-top" class="landing-page">
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                if(!isset($_SESSION['userid'])){
                    ?>

                <a class="navbar-brand" href="view/login.php">个人中心</a>
               <?php  }else{
                    ?>
                <a class="navbar-brand" href="view/homepage.php">个人中心</a>
               <?php } ?>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="#page-top">首页</a></li>
                    <li><a class="page-scroll" href="#features">介绍</a></li>
                    <li><a class="page-scroll" href="#contact">联系我们</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <br/>
                    <h1>Sports+<br/>
                        <br/>

                        自律 给我自由<br/>


                        <p>&nbsp;&nbsp;&nbsp;&nbsp;现在开始，进入我的自律之旅！</p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="http://rollerfun.net" role="button">发现更多</a>

                        </p>
                </div>
                <div class="carousel-image wow zoomIn">

                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1>Sports+<br/>
                        <br/>

                        自律 给我自由<br/>


                        <p>&nbsp;&nbsp;&nbsp;&nbsp;现在开始，进入我的自律之旅！</p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="rollerfun.net" role="button">发现更多</a>

                        </p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section id="features" class="container services">
    <div class="row">
        <div class="col-sm-3">
            <h2>运动数据</h2>
            <p>与你的可穿戴设备进行配对，可以自动记录你的运动数据</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>图表分析</h2>
            <p>根据你的历史数据对你的运动进行分析</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>身体数据</h2>
            <p>获得你的心率和身体状态数据并为你做出分析</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>专业建议</h2>
            <p>专业的教练医生将来为你的健康提出建议</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
    </div>
</section>

<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>联系我们</h1>
                <p>南京大学软件学院2014级令佩棠</p>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy">南京大学, Inc.</span></strong><br/>
                    鼓楼区鼓楼校区<br/>
                    栖霞区仙林校区<br/>
                    <abbr title="Phone">电话:</abbr> 156-5170-6281
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                    此应用是2016年面向web的计算课程大作业，基于restful的方式注入数据，模拟可穿戴设备的数据采集
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:141250073@smail.nju.edu.cn" class="btn btn-primary">发送邮件</a>
                <p class="m-t-sm">
                    在以下平台关注我
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; 2016 by lpt</strong><br/>面向web的计算大作业</p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->

<script src='_static/js/jquery-2.1.1.js'></script>
<script src='_static/js/bootstrap.min.js'></script>
<script src='_static/js/plugins/metisMenu/jquery.metisMenu.js'></script>
<script src='_static/js/plugins/slimscroll/jquery.slimscroll.min.js'></script>

<!-- Custom and plugin javascript -->
<script src='_static/js/inspinia.js'></script>
<script src='_static/js/plugins/pace/pace.min.js'></script>
<script src='_static/js/plugins/wow/wow.min.js'></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
            header = document.querySelector( '.navbar-default' ),
            didScroll = false,
            changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
