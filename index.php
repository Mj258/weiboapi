<?php

$homepage = file_get_contents('http://www.mtn-sh.com/');
echo $homepage;

function show($var){
        if(empty($var)){
            echo 'Null';
        }elseif(is_array($var)&&(is_object($var))){
            print_r($var);
        }else{
            echo "text";
        }
    }

?>