<?php
namespace Home\Controller;
use Think\Controller;
class CateController extends CommonController {
    public function index(){
    	$article=D('article');
    	$count=$article->where(array('cateid'=>I('id')))->count();
    	$Page  = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$show = $Page->show();// 分页显示输出
    	$list = $article->where(array('cateid'=>I('id')))->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('page',$show);// 赋值分页输出
    	$this->assign('list',$list);// 赋值数据集
        $this->current();
        $this->display();
    }
    public function current(){
    	$current=I('id');
    	$this->assign('current',$current);
    }



}