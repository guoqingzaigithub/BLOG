<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Cate</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="/BLOG/Public/assets/css/amazeui.min.css"/>
  <style>
    @media only screen and (min-width: 1200px) {
      .blog-g-fixed {
        max-width: 1200px;
      }
    }

    @media only screen and (min-width: 641px) {
      .blog-sidebar {
        font-size: 1.4rem;
      }
    }

    .blog-main {
      padding: 20px 0;
    }

    .blog-title {
      margin: 10px 0 20px 0;
    }

    .blog-meta {
      font-size: 14px;
      margin: 10px 0 20px 0;
      color: #222;
    }

    .blog-meta a {
      color: #27ae60;
    }

    .blog-pagination a {
      font-size: 1.4rem;
    }

    .blog-team li {
      padding: 4px;
    }

    .blog-team img {
      margin-bottom: 0;
    }

    .blog-content img,
    .blog-team img {
      max-width: 100%;
      height: auto;
    }

    .blog-footer {
      padding: 10px 0;
      text-align: center;
    }
  </style>
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
    <!--
     <h1 class="am-topbar-brand">
    <a href="/BLOG/index.php/Home/User/login">登录</a>
  </h1>
   <h1 class="am-topbar-brand">
    <a href="/BLOG/index.php/Home/User/register">注册</a>
  </h1>
  -->
  <h1 class="am-topbar-brand">
  您好<?php echo $_SESSION['username']; ?>
  </h1>

  <h1 class="am-topbar-brand">
    <a href="/BLOG/index.php/Home/User/login">退出</a>
  </h1>
  </div>
</header>

<div class="am-g am-g-fixed blog-g-fixed">
  <div class="am-u-md-8">
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><article class="blog-main">
      <h3 class="am-article-title blog-title">
        <a href="/BLOG/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a>
      </h3>
      <h4><?php echo (date("Y-m-d",$vo["time"])); ?></h4>
      <div class="am-g blog-content">
        <div class="am-u-lg-7">
          <p><?php echo ($vo["summary"]); ?></p>
        </div>
        <div class="am-u-lg-5">
          <p><img src="/BLOG<?php echo ($vo["pic"]); ?>"></p>
        </div>
      </div>
    </article>

    <hr class="am-article-divider blog-hr"><?php endforeach; endif; else: echo "" ;endif; ?>

    <hr class="am-article-divider blog-hr">
    <ul class="am-pagination blog-pagination">
     <div align="center" ><?php echo ($page); ?></div> 
    </ul>
  </div>

  <div class="am-u-md-4 blog-sidebar">
    <div class="am-panel-group">
      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">关于我</div>
        <div class="am-panel-bd">
          <p>前所未有的中文云端字型服务，让您在 web 平台上自由使用高品质中文字体，跨平台、可搜寻，而且超美。云端字型是我们的事业，推广字型学知识是我们的志业。从字体出发，关心设计与我们的生活，justfont blog
            正是為此而生。</p>
          <a class="am-btn am-btn-success am-btn-sm" href="#">查看更多 →</a>
        </div>
      </section>
      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">文章目录</div>
        <ul class="am-list blog-list">
        <?php if(is_array($artres)): $i = 0; $__LIST__ = $artres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/BLOG/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 
        </ul>
      </section>

      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">友情链接</div>
        <div class="am-panel-bd">
          <ul class="am-avg-sm-4 blog-team">
          <?php if(is_array($linkres)): $i = 0; $__LIST__ = $linkres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img class="am-thumbnail"
                     src="" alt=""/><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?> 
           
          </ul>
        </div>
      </section>
    </div>
  </div>

</div>

<footer class="blog-footer">
  <p>blog template<br/>
    <small>© Copyright XXX. by the AmazeUI Team.</small>
  </p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/BLOG/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/BLOG/Public/assets/js/amazeui.min.js"></script>

</body>
</html>