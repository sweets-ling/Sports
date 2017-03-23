<!DOCTYPE html>
<html>
<?php
$keyword=$_REQUEST['top-search'];
include('../model/Activity.php');
include('../model/User.php');
$activity=new Activity("sqlite:../../mydatabase.sqlite");

$id = $_SESSION['userid'];
$dbaddr = "sqlite:../mydatabase.sqlite";
$user=new User($id,$dbaddr);
$resActivity=$activity->searchActivity($keyword);
$resUser=$user->searchUser($keyword);

?>




<head>


    <title>Sports+| Search</title>
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports+| Contacts</title>


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

        <div class="row wrapper border-bottom white-bg page-heading text－center">
            <div class="col-lg-9 ">
                <h2 class="text－center">搜索！</h2>
                <ol class="breadcrumb text－center">

                    <li>
                        <a>查看我的搜索结果</a>

                    </li>
                </ol>
            </div>
        </div>

        <div class="row main">
            <div class="col-xs-12 col-md-8 article-content">
                <div class="card">
                    <div class="row main">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">\
                                    <h2>
                                        <?php echo 5 ?> 个结果: <span class="text-navy"><?php echo $keyword ?></span>
                                    </h2>
                                    <small>响应时间 (0.23 秒)</small>

                                    <div class="search-form">
                                        <form action="search_results.php" method="get">
                                            <div class="input-group">
                                                <input type="text" placeholder="Admin Theme" name="top-search" class="form-control input-lg">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-lg btn-primary" type="submit">
                                                        搜索
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="search-result">
                                        <h3><a href="#">搜索结果1</a></h3>
                                        <a href="#" class="search-link">www.condong.com</a>
                                        <p>
                                            这是一个搜索结果的事例
                                        </p>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="search-result">
                                        <h3><a href="#">WrapBootstrap - Bootstrap Themes & Templates</a></h3>
                                        <a href="#" class="search-link">https://wrapbootstrap.com/‎</a>
                                        <p>
                                            WrapBootstrap is a marketplace for premium Bootstrap themes and templates. Impress your clients and visitors while using a single, rock-solid foundation.
                                        </p>
                                    </div>

                                    <div class="hr-line-dashed"></div>

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
    <script src="../../js/jquery-2.1.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../../js/inspinia.js"></script>
    <script src="../../js/plugins/pace/pace.min.js"></script>


</body>

</html>
