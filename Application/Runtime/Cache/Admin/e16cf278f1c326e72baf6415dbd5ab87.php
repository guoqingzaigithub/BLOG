<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/BLOG/Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/BLOG/Application/Admin/Public/css/main.css"/> 
    <script type="text/javascript" src="http://localhost/BLOG/Application/Admin/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="http://localhost/BLOG/Application/Admin/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="http://localhost/BLOG/Application/Admin/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="http://localhost/BLOG/Application/Admin/Public/ueditor/ueditor-cn/zh-cn.js"></script>

</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">      
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="http://localhost/BLOG/index.php/Admin">首页</a></li>
                <li><a href="http://localhost/BLOG/Home/index/index" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员:<?php echo $_SESSION['username']; ?></a></li>
                <li><a href="/BLOG/index.php/Admin/Admin/edit/id/<?php echo $_SESSION['id']; ?>">修改密码</a></li>
                <li><a href="/BLOG/index.php/Admin/Admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
   <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/BLOG/index.php/Admin/Article/lst"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="/BLOG/index.php/Admin/Cate/lst"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="/BLOG/index.php/Admin/Link/lst"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="/BLOG/index.php/Admin/Admin/lst"><i class="icon-font">&#xe052;</i>管理员管理</a></li>
                        <li><a href="/BLOG/index.php/Admin/User/lst"><i class="icon-font">&#xe052;</i>用户管理</a></li>

                    </ul>
                </li>
               
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/BLOG/index.php/Admin/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/BLOG/index.php/Admin/article/lst">文章管理</a><span class="crumb-step">&gt;</span><span>新增文章</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data" >
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>文章名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text">
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>文章作者：</th>
                                <td>
                                    <input class="common-text required" id="auther" name="auther" size="50" value="" type="text">
                                </td>
                             </tr>   
                                 <tr>
                                <th>文章描述：</th>
                                <td>
                                    <textarea style="width:450px; height:100px;" name="summary" ></textarea>
                                </td>
                            </tr>
                                <tr>
                                <th>缩略图：</th>
                                <td>
                                    <input type="file" id="pic" name="pic" size="50" value=""> 
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>所属栏目：</th>
                                <td>
                                  <select name="cateid" >
                                      <option value="" >请选择分类</option>
                                        <?php if(is_array($cateres)): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                  </select>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>内容：</th>
                                <td>
                                  <textarea id="content" name="content" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content',{initialFrameWidth:1500,initialFrameHeight:400,});
    


</script>
</body>
</html>