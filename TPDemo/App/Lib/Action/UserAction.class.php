<?php

class UserAction extends Action {

    public function index(){
        $m = new Model('users');
        $arr = $m->select();
        var_dump($arr);
        $this->assign('list',$arr);
        $this->display();
    }
    public function add(){
        $m = new Model('users');
    }
    public function del(){
        $m = new Model('users');
        $id = $_GET['id'];
        $count = $m->delete($id);
        if($count>0){
            $this->success('success');
        }else{
            $this->error('error');
        }

    }
    public function search(){
        if(isset($_POST['username'])){
            $where['username'] =array('like',"%{$_POST['username']}%") ;
        }
        if(isset($_POST['sex']) && $_POST['sex']!=null){
            $where['sex']=array('eq',$_POST['sex']);
        }
        $m=M('User');
        $arr=$m->where($where)->select();
        $this->assign('data',$arr);
        $this->display('index');
    }
}