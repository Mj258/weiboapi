<?php
/**
 * Created by PhpStorm.
 * User: Mingjun
 * Date: 2015/9/17
 * Time: 9:48
 */

class demo11 {
    function run(){
        echo substr("adbcdwrerer",2,2);
    }
}

//$d = new demo11();
//$d->run();


/*
 * 正则表达式
 * preg_
 *
 *
 *
 */
$con = preg_quote(file_get_contents('http://www.baidu.com/'));
$href = "<a rel='ddd.s' href='addd.g'>";
//print_r($con);
//$con = trim($con);
$img = "/\<img\s*src=\".*?\"\/\>/iU";
$mag = "/\<link\s*rel=\".*?\"\s*href=\"*?\"\/\>/iU";
$script = "/\<script>(.*)<\/script>/iU";
$title = "/<title>(.*)<\/title>/Ui";
$ig = preg_match_all($title,$con);
//
//echo "<br>";
//print_r($ig);

$url = "http://www.baidu.com";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
$data = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$mar = preg_match_all($script, $data);
echo $mar;
//print_r($data);
