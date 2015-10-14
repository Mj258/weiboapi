<?php
/**
 * Created by PhpStorm.
 * User: Mingjun
 * Date: 2015/10/13
 * Time: 19:20
 */

class LoginAction extends Action {
    public function index(){
        $web_title = "Login";
        $this->assign("web_title",$web_title);
        $this->display();
    }
    public function do_login(){
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];
        $code = $_POST['yzm'];
        if($_SESSION['verify'] != md5($code)) {
            $this->error('验证码错误！');
        }

    }
}