<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sports+| Login</title>

    <link href='<?=base_url().'_static/css/bootstrap.min.css'?>' rel="stylesheet">

    <!-- Animation CSS -->
    <link href='<?=base_url().'_static/css/animate.css'?>' rel="stylesheet">
    <link href='<?=base_url().'_static/font-awesome/css/font-awesome.css'?>' rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href='<?=base_url().'_static/css/style.css'?>' rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name text－left">S+</h1>

            </div>
            <h3>欢迎加入sports＋</h3>
            <p>
            </p>
            <p>现在登录</p>
           //<?php //echo validation_errors(); ?>
            <?php echo form_open('Login/login', 'class="m-t" role="form"'); ?>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="电子邮箱" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="密码" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登录</button>

                <a href="forgot_password.html"><small>忘记密码?</small></a>
                <p class="text-muted text-center"><small>还没有账户?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">注册</a>
            </form>
            
        </div>
    </div>



    <!-- Mainly scripts -->

    <script src='<?=base_url().'_static/js/jquery-2.1.1.js'?>'></script>
    <script src='<?=base_url().'_static/js/bootstrap.min.js'?>'></script>


</body>

</html>
