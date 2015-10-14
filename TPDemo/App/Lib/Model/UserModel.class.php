<?php

class UserModel extends Model {

    public function getTopUser(){
        //添加自己的业务逻辑
        // ...
    }

    private $tabName = null;
    function __construnct($tabName){
        $this->tabName=$tabName;
    }
    function select(){
        $arr = array();
        $sql = "select * from users";
        $result = mysql_query($sql);
        if($result && mysql_num_rows($result)>0){
            while($res=mysql_fetch_assoc($result)){
                $arr[] = $res;
            }
        }
        return $arr;
    }

}