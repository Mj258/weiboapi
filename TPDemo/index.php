<?php
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
//定义项目名称
define('APP_NAME', 'App');
//定义项目路径
define('APP_PATH', './App/');
//开启调试模式
define('APP_DEBUG', true);

//加载框架入文件
require 'ThinkPHP/ThinkPHP.php';
