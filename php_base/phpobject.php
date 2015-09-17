<?php
/**
 * Created by PhpStorm.
 * User: Mingjun
 * Date: 2015/9/16
 * Time: 8:35
 */

class phpobject {
    private $name;
    private $age;
    function __construct($name="jomy",$age=18) {

        $this ->$name = $name;
        $this ->$age = $age;
        echo $name." is ".$age;
    }
//    public function init(){
//        $this
//    }
    function left(){
        echo 'left';
    }
    static function right(){
        echo 'right';
    }
}

 $p1 = new phpobject();
echo "<br>";
 $p1->left();
echo "<br>";
$p1::right();

interface test{
    function a();
    function b();
}
class AB implements test{
    function a(){
        echo "aaa";
    }
    function b(){
        echo "bbb";
    }
}

echo "<br>";
$ft = new AB();
$ft->a();