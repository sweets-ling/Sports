<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>404 Error</title>
    <style type="text/css">

        ::selection { background-color: #E13300; color: white; }
        ::-moz-selection { background-color: #E13300; color: white; }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }

        p {
            margin: 12px 15px 12px 15px;
        }
    </style>



</head>
<body class="gray-bg">


<div class="middle-box text-center animated fadeInDown">
    <h1>404</h1>
    <h3 class="font-bold">Page Not Found</h3>

    <div class="error-desc">
        <h3><?php echo $heading; ?></h3>
        <?php echo $message; ?>
        Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.
        <form class="form-inline m-t" role="form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search for page">
            </div>
            <button type="submit" class="btn btn-primary">搜索</button>
        </form>
    </div>
</div>


<!-- Mainly scripts -->
<script src='<?=base_url().'_static/js/jquery-2.1.1.js'?>'></script>
<script src='<?=base_url().'_static/js/bootstrap.min.js'?>'></script>

</body>

</html>