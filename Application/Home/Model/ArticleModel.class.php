<?php
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model{
  
    protected $_validate = array(
     array('cateid','require','所属栏目不得为空！', 1, 'regex',3 ), 
     array('title','require','标题不得为空！', 1, 'regex',3 ), 
     array('content','require','文章内容不得为空！', 1, 'regex',3 ), 
     array('summary','require','文章简介不得为空！', 1, 'regex',3 ), 


   );
}