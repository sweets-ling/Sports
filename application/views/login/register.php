<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sports+| Register</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">S+</h1>

            </div>
            <h3>欢迎加入Sports＋</h3>
            <p>现在注册账户</p>
            <form class="m-t" role="form" action="login.php">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="用户名" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="电子邮箱" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码" required="">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i>我同意网站条款</label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">注册</button>

                <p class="text-muted text-center"><small>已有账号?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">现在登录</a>
            </form>
             </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../../js/jquery-2.1.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>