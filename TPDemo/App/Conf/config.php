<?php
$config1 = array(
	//'配置项'=>'配置值'
    'DEFAULT_MODULE'     => 'Index', //默认模块


    'URL_CASE_INSENSITIVE'  => True,
    'URL_MODEL'          => '2', //URL模式
    'URL_HTML_SUFFIX'=>'html|shtml|xml',//限制伪静态的后缀
    'SHOW_PAGE_TRACE'=>true,//开启页面Trace

//    'URL_PATHINFO_DEPR'  =>'/',
//    'TMPL_L_DELIM'      => '{',
//    'TMPL_R_DELIM'      => '}',

    'TMPL_PARSE_STRING'  =>array(
        '__PUBLIC__' => __ROOT__.'/Common', // 更改默认的__PUBLIC__ 替换规则
       '__CSS__' => __ROOT__.'/Public/Css',
        '__JS__' => __ROOT__.'/Public/JS/', // 增加新的JS类库路径替换规则
        '__UPLOAD__' => __ROOT__.'/Uploads', // 增加新的上传路径替换规则
    ),


//默认模板主题名称
//    'DEFAULT_THEME'      => 'theme',

//自动侦测模板主题
//    'TMPL_DETECT_THEME'  => 'false',
//模板主题列表
//    'THEME_LIST'         => 'MY,YOUR',
// 数据库
//    'DB_TYPE'           => 'mysql',
//    'DB_HOST'           => 'localhost',
//    'DB_NAME'           => '2',
//    'DB_USER'           => 'root',
//    'DB_PWD'           => 'root',
//    'DB_PORT'          => '',
    'DB_PREFIX'        => 'wp_',
    'DB_CHARSET'       => 'utf8',

//    //db_dsn 链接数据库 这个优先
    'DB_DSN'           => 'mysql://root:root@localhost:3306/2'

);
//$config2 = __ROOT__."/Common/config.php";
//return $config1;
//$config2 = include(__ROOT__ ."/Common/config.php");
//echo $config2;
//print_r($config2);
return $config1;
//$config2 = file_exists($config2) ? include "$config2" : array();
//return array_merge($config1, $config2);
?>