<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="keywords" content="relationships,entertainment,human,sport,health,run,walk,competitions">
    <meta name="description" content="This page is about the sport management，sport competition and social intercourse.">

    <title>Sports+| Register</title>

    <link href='../_static/css/bootstrap.min.css' rel="stylesheet">

    <!-- Animation CSS -->
    <link href='../_static/css/animate.css' rel="stylesheet">
    <link href='../_static/font-awesome/css/font-awesome.css' rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href='../_static/css/style.css' rel="stylesheet">
    <link href='../_static/css/plugins/iCheck/custom.css' rel="stylesheet">
</head>
<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">S+</h1>

            </div>
            <h3>欢迎加入Sports＋</h3>
            <p>现在注册账户</p>
            <form class="m-t" role="form" action="../controller/Login/regist.php" method="post">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="用户名" required="">
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="电子邮箱" required="">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="密码" required="">
                </div>
                <div class="form-group">
                    <input name="passwordAgain" type="password" class="form-control" placeholder="确认密码" required="">
                </div>
                <div class="form-group">
                        <div  class="checkbox "><label>
                                <input name="check"  type="checkbox"><i></i>我同意网站条款</label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">注册</button>

                <p class="text-muted text-center"><small>已有账号?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">现在登录</a>
            </form>
             </div>
    </div>


    <!-- Mainly scripts -->
    <script src='../_static/js/jquery-2.1.1.js'></script>
    <script src='../_static/js/bootstrap.min.js'></script>

    <script src='../_static/js/plugins/iCheck/icheck.min.js'></script>


    <script>
        $(document).ready(function(){

            var email,name;
            email =getQueryString("email");
            name=getQueryString("name");
           $("input[name='email']").val(email);
            $("input[name='username']").val(name);
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });


        function getQueryString(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]); return null;
        }
    </script>
</body>


</html>
