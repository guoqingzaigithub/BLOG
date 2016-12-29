<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function login(){
        $login=D('user');
    	if(IS_POST){
            if($login->create($_POST,4)){
                if($login->login()){
                    $this->success('登陆成功',U('index/welcome'));
                }else{
                    $this->error('用户名或密码错误');
                }
            }else{
                $this->error($login->getError());
            }



            return; 
        }
        $this->display('login');
     }

     public function register(){
        $user=D('user');
         if(IS_POST){
            $data['username']=I('username');
            $data['password']=md5(I('password'));
            if($user->create($data)){
                if($user->add()){
                    $this->success('添加用户成功！',U('index/welcome'));
                }else{
                    $this->error('添加用户失败！');
                }
            }else{
                $this->error($user->getError());
            }      
            return; 
        }
        $this->display('register');
      
    }

        

}
