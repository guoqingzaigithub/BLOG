<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	$article=D('article');
    	$count=$article->count();
    	$Page  = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$show = $Page->show();// 分页显示输出
    	$list = $article->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('page',$show);// 赋值分页输出
    	$this->assign('list',$list);// 赋值数据集
       $this->display();
    }
    public function search(){
      $article=D('article');
      if(IS_POST){
        $data['title']=array('LIKE',"%{$_POST['title']}%");
        $list=$article->where($data)->order('id desc')->select();
      }
      $title=I('title');
      $this->assign('title',$title);
      $this->assign('list',$list);
      $this->display('index');
    }
}