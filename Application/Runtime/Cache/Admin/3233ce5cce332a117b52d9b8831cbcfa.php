<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/BLOG/Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/BLOG/Application/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="http://localhost/BLOG/Application/Admin/Public/js/libs/modernizr.min.js"></script>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/BLOG/index.php/Admin/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">文章管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post" action="/BLOG/index.php/Admin/Article/sort" >
                <div class="result-title">
                    <div class="result-list">
                        <a href="/BLOG/index.php/Admin/Article/add"><i class="icon-font"></i>新增文章</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>

                            <th width="4%">ID</th>
                            <th align="center">文章标题</th>
                             <th width="10%">作者</th>
                            <th width="15%">缩略图</th>
                            <th width="10%">所属栏目</th>
                            <th width="10%">操作</th>
                        </tr>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            </td>
                            <td width="5%"><?php echo ($vo["id"]); ?></td>
                            <td title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?>                 
                             <td><?php echo ($vo["auther"]); ?></td>

                             <td >
                             <?php if($vo['pic'] != '' ): ?><img src="/BLOG<?php echo ($vo["pic"]); ?>" height="50">
                             <?php else: ?>
                             暂无缩略图<?php endif; ?>

                            </td>
                            <td title="<?php echo ($vo["url"]); ?>"><?php echo ($vo["catename"]); ?>
                            </td>
                             
                            <td width="5%">
                                <a class="link-update" href="/BLOG/index.php/Admin/Article/edit/id/<?php echo ($vo["id"]); ?>">修改</a>
                                <a class="link-del" onclick="return confirm('你要删除该文章吗？');" href="/BLOG/index.php/Admin/Article/del/id/<?php echo ($vo["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                 <div class="list-page"><?php echo ($page); ?></div> 
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>