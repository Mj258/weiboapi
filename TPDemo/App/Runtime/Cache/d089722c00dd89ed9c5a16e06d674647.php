<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo ($web_title); ?></title>
    <link rel="stylesheet" href="__CSS__/bootstrap.css">
    <link rel="stylesheet" href="__CSS__/bootstrap-responsive.css">
</head>
<body>
<div class="container">
    <header>

        <ul class="nav nav-tabs">
            <li class="active">
                <a href="<?php echo U('/');?>">首页</a>
            </li>
            <li><a href="__APP__/Login">WEB技术</a></li>
            <li><a href="__APP__/User">Network技术</a></li>
        </ul>

    </header>
</div>

<div class="container">
    <h1>User Demo</h1>
</div>

<footer>
    <div class="container">
        <row><a href="http://mtn-sh.com">mtn-sh</a></row>
    </div>
</footer>
<script TYPE="text/javascript" SRC="__JS__/jquery-2.1.4.js"></script>
<script TYPE="text/javascript" src="__JS__/bootstrap.js"></script>
</body>
</html>