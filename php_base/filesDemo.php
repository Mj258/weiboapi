<?php


class filesDemo {
$dirname="phpMyAdmin";

deldir($dirname);

    function deldir($dirname){
        if(file_exists($dirname)) {
            $dir=opendir($dirname);

            while($filename=readdir($dir)){
                if($filename!="." && $filename!=".."){
                    $file=$dirname."/".$filename;

                    if(is_dir($file)){

                        deldir($file); //使用递归删除子目录
                    }else{
                        echo '删除文件<b>'.$file.'</b>成功<br>';
                        unlink($file);
                    }
                }
            }
            closedir($dir);
            echo '删除目录<b>'.$dirname.'</b>成功<br>';
            rmdir($dirname);
        }
    }
}