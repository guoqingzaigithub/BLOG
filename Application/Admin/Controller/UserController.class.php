<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
        public function lst(){
         $user=D('user');
       $count= $user->count();// 查询满足要求的总记录数
       $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(2)
       $show = $Page->show();// 分页显示输出
       $list = $user->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
       $this->assign('list',$list);// 赋值数据集
       $this->assign('page',$show);// 赋值分页输出
       $this->display();
    }
      
    public function del(){
         $user=D('user');
         if($user->delete(I('id'))){
            $this->success('删除用户成功！' ,U('lst'));
         }else{
            $this->error('删除用户失败');
         }
    }
}