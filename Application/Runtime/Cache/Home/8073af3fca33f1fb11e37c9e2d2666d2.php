<?php if (!defined('THINK_PATH')) exit();?><html>

  <head>
    <link rel="stylesheet" type="text/css" href="/BLOG/Public/simditor-1.0.5/styles/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="/BLOG/Public/simditor-1.0.5/styles/simditor.css" />
	<link rel="stylesheet" href="/BLOG/Public/assets/css/amazeuii.min.css"/>
    <script type="text/javascript" src="/BLOG/Public/simditor-1.0.5/scripts/js/jquery.min.js"></script>
    <script type="text/javascript" src="/BLOG/Public/simditor-1.0.5/scripts/js/module.js"></script>
    <script type="text/javascript" src="/BLOG/Public/simditor-1.0.5/scripts/js/uploader.js"></script>
    <script type="text/javascript" src="/BLOG/Public/simditor-1.0.5/scripts/js/simditor.js"></script>
  </head>

  <body>
<header class="am-topbar">
  <h1 class="am-topbar-brand">
    <a href="#">blog</a>
  </h1>
  

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
          data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
      class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li <?php if($current == $vo['id']): ?>class='am-active'<?php endif; ?>><a href="/BLOG/index.php/Home/index">首页</a></li>
      
    <?php if(is_array($cateres)): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($current == $vo['id']): ?>class='am-active'<?php endif; ?> ><a href="/BLOG/index.php/Home/Cate/index/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 
    <li><a href="/BLOG/index.php/Home/Article/add">写文章</a></li>
    </ul>

    <form class="am-topbar-form am-topbar-left am-form-inline am-topbar-right" role="search" action="/BLOG/index.php/Home/index/search" method="post" >
      <div class="am-form-group">
        <input type="text" class="am-form-field am-input-sm" name="title" value="<?php echo ($title); ?>" placeholder="搜索文章">
      </div>
      <button type="submit" class="am-btn am-btn-default am-btn-sm">搜索</button>
    </form>
     <h1 class="am-topbar-brand">
    <a href="/BLOG/index.php/Home/User/login">登录</a>
  </h1>
   <h1 class="am-topbar-brand">
    <a href="/BLOG/index.php/Home/User/register">注册</a>
  </h1>
  <h1 class="am-topbar-brand">
    <a href="/BLOG/index.php/Home/User/login">登出</a>
  </h1>
  </div>
</header>
  <form action="" method="post" enctype="multipart/form-data" >
    <p><input type="text" name="title" placeholder="title" value=""  class="am-form-field am-round"></p>
    <p><input type="text" name="auther" placeholder="auther" value=""  class="am-form-field am-round"></p>
    <p><input type="text" name="summary" placeholder="summary" value=""  class="am-form-field am-round"></p>
    <input type="file" id="pic" name="pic" size="50" value=""> 
     <tr>
                                <th><i class="require-red">*</i>所属栏目：</th>
                                <td>
                                  <select name="cateid" >
                                      <option value="" >请选择分类</option>
                                        <?php if(is_array($cateres)): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                  </select>
                                </td>
                            </tr>                      
    <textarea id="editor" name="content" placeholder="这里输入内容" autofocus value="" class="am-form-field am-round"></textarea>
    <div align="center">
    <input type="submit" name="submit" value="发布文章" class="am-btn am-btn-primary">
  </form>
  </div>
  </body>

  <script type="text/javascript">
    var editor = new Simditor({
      textarea: $('#editor')
    });
  </script>

</html>