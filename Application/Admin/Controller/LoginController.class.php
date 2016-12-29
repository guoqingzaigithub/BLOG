<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
        $admin=D('admin');
        if(IS_POST){
            if($admin->create($_POST,4)){
                if($admin->login()){
                    $this->success('登陆成功！跳转中……',U('index/index'));
                }else{
                    $this->error('用户名或密码错误！');
                }
            }else{
                $this->error($admin->getError());
            }
            return;
        }
        if(session('id')){
            $this->error('您已登陆',U('index/index'));
        }else{
            $this->display('login');
        }
    }

    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 30;
        $Verify->length   = 3;
        $Verify->useNoise = false;
        $Verify->entry();
    }
}