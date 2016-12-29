<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function index(){
    	$arts=D('article')->find(I('id'));
    	$this->assign('arts',$arts);
    	$this->catename($arts['cateid']);
    	$this->other(I('id'));
       $this->display();
    }
    public function catename($cateid){
    	$cates=D('cate')->find($cateid);
    	$this->assign('catename',$cates['catename']);
    }

    public function add(){
      $article=D('article');
        if(IS_POST){
            $data['title']=I('title');
            $data['auther']=I('auther');
            $data['content']=I('content');
            $data['summary']=I('summary');
            $data['cateid']=I('cateid');
            $data['time']=time();
            if($_FILES['pic']['tmp_name'] !='' ){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728 ;// 设置附件上传大小
                $upload->exts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './'; // 设置附件上传根目录
                $upload->savePath  = './Public/Uploads/'; // 设置附件上传目录
                $info =  $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                      $this->error($upload->getError());
                  }else{
                    $data['pic']= $info['savepath'].$info['savename'];
                  }
           }
            if($article->create($data)){
                if($article->add()){
                    $this->success('添加文章成功！',U('index/index'));
                }else{
                    $this->error('添加文章失败！');
                }
            }else{
                $this->error($article->getError());
            }      
            return; 
        }
        $careres=D('cate')->select();
        $this->assign('cateres',$careres);
        $this->display('write');
      }
    

    public function other($id){
    	//上一篇下一篇
    	$pres= D('article')->where('id<'.$id)->order('id desc')->find();
    	$nexts= D('article')->where('id>'.$id)->order('id asc')->find();
    	$this->assign('pres',$pres);
    	$this->assign('nexts',$nexts);
    }

     
}