<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    protected $_validate = array(
     array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
     array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
   );


 public function login(){
    	$password= $this->password;
    	$info= $this->where(array('username'=>$this->username))->find();
    	if($info){
    		if($info['password']==md5($password)){
    			session('id',$info['id']);
    			session('username',$info['username']);
    			return ture;
    		}else{
    			return false;
    		}
    	}else{
    		return false;
    	}
    }





}