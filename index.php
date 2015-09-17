<?php

//$homepage = file_get_contents('http://www.mtn-sh.com/');
//echo $homepage;
//
//function dirfiles($dirname,&$dirnum,&$filenums){
//    $dir = opendir($dirname);
//    readdir($dir)."<br>";
//    readdir($dir)."<br>";
//    while($filename = readdir($dir)){
//        $newfile = $dirname."/".$filename;
//        if(is_dir($newfile)){
////            dirfiles($newfile,&$dirnum,&$filenums);
//            $dirnum++;
//        }else{
//            $filenums++;
//        }
//        closedir($dir);
//    }
//
//    $filenums = 0;
//    $dirnum = 0;
//    dirfiles('e:/workspace',&$dirnum,&$filenums);
//}

//    $user = array("22", "333","mingjun","taidii.com","mtn-sh");
    $user = array(1,"name"=>"mingjun",'sex'=>"man","grade"=>55);
//    for($i=0;$i<count($user);$i++){
//        echo "\$user[{$i}]"."-------".$user[$i]."<br>";
//    }
    foreach($user as $k=>$u){
        echo $k."======>".$u."<br>";
    }
?>



