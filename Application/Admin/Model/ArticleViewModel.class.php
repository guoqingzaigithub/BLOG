<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class ArticleViewModel extends ViewModel{
    protected $viewFields = array(
     	  'Article'=>array('id','title','auther','pic','_type'=>'LEFT'),
     	  'Cate'=>array('catename','_on'=>'Article.cateid=Cate.id'),


   );
}