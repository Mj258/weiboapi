<?php


class cUrlDemo {

    function connact(){
        $ch = curl_init();
    }
    function close(){
        // 关闭cURL资源，并且释放系统资源
        curl_close($ch);
    }
//    $ch = curl_init();

    // 设置URL和相应的选项
//    curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
//    curl_setopt($ch, CURLOPT_HEADER, 0);

    // 抓取URL并把它传递给浏览器
//    curl_exec($ch);

    // 关闭cURL资源，并且释放系统资源
//    curl_close($ch);
    function open(){
        // 设置URL和相应的选项
        curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // 抓取URL并把它传递给浏览器
        curl_exec($ch);
    }

}