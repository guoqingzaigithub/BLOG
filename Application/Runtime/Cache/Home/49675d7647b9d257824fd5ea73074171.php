<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Sidebar | Amaze UI Example</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="/BLOG/Public/assets/css/amazeui.min.css"/>
  <style>
    @media only screen and (min-width: 641px) {
      .am-offcanvas {
        display: block;
        position: static;
        background: none;
      }

      .am-offcanvas-bar {
        position: static;
        width: auto;
        background: none;
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
      .am-offcanvas-bar:after {
        content: none;
      }

    }

    @media only screen and (max-width: 640px) {
      .am-offcanvas-bar .am-nav>li>a {
        color:#ccc;
        border-radius: 0;
        border-top: 1px solid rgba(0,0,0,.3);
        box-shadow: inset 0 1px 0 rgba(255,255,255,.05)
      }

      .am-offcanvas-bar .am-nav>li>a:hover {
        background: #404040;
        color: #fff
      }

      .am-offcanvas-bar .am-nav>li.am-nav-header {
        color: #777;
        background: #404040;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.05);
        text-shadow: 0 1px 0 rgba(0,0,0,.5);
        border-top: 1px solid rgba(0,0,0,.3);
        font-weight: 400;
        font-size: 75%
      }

      .am-offcanvas-bar .am-nav>li.am-active>a {
        background: #1a1a1a;
        color: #fff;
        box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
      }

      .am-offcanvas-bar .am-nav>li+li {
        margin-top: 0;
      }
    }

    .my-head {
      margin-top: 40px;
      text-align: center;
    }

    .my-button {
      position: fixed;
      top: 0;
      right: 0;
      border-radius: 0;
    }
    .my-sidebar {
      padding-right: 0;
      border-right: 1px solid #eeeeee;
    }

    .my-footer {
      border-top: 1px solid #eeeeee;
      padding: 10px 0;
      margin-top: 10px;
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

    </ul>

    <form class="am-topbar-form am-topbar-left am-form-inline am-topbar-right" role="search">
      <div class="am-form-group">
        <input type="text" class="am-form-field am-input-sm" placeholder="搜索文章">
      </div>
      <button type="submit" class="am-btn am-btn-default am-btn-sm">搜索</button>
    </form>

  </div>
</header>
<header class="am-g my-head">
  <div class="am-u-sm-12 am-article">
    <h1 class="am-article-title"><?php echo ($arts["title"]); ?></h1>
    <p class="am-article-meta"><a href="/BLOG/index.php"><?php echo ($catename); ?></a> &nbsp;&nbsp; 日期：<?php echo (date("Y-m-d",$arts["time"])); ?> &nbsp;&nbsp;  &nbsp;&nbsp;作者：<?php echo ($arts["auther"]); ?></p>
  </div>
</header>
<hr class="am-article-divider"/>
<div class="am-g am-g-fixed">
  <div class="am-u-md-9 am-u-md-push-3">
    <div class="am-g">
      <div class="am-u-sm-11 am-u-sm-centered">
        <div class="am-cf am-article">
          <?php echo htmlspecialchars_decode($arts['content']); ?>
        </div>
        <hr/>
        <div>
<?php if($pres): ?><strong>上一篇：</strong>
<a class="prev-post icon-right" href="__MOUDLE__/Article/index/id/<?php echo ($pres["id"]); ?>"><?php echo ($pres["title"]); ?></a>
<?php else: ?>
<strong>上一篇：没有了</strong><?php endif; ?>
</div>
<div style="margin:10px 0;">

<?php if($nexts): ?><strong>下一篇</strong>
<a class="next-post" href="__MOUDLE__/Article/index/id/<?php echo ($nexts["id"]); ?>">
<?php echo ($nexts["title"]); ?></a> 
<?php else: ?>
<strong>上一篇：没有了</strong><?php endif; ?>
</div>
        <ul class="am-comments-list">
          <!-- comment -->
        </ul>
      </div>
    </div>
  </div>
  <div class="am-u-md-3 am-u-md-pull-9 my-sidebar">
    <div class="am-offcanvas" id="sidebar">
      <div class="am-offcanvas-bar">
        <ul class="am-nav">
          <li><?php echo ($arts["title"]); ?></li>
          <li class="am-nav-header">最新发表</li>
          <?php if(is_array($artres)): $i = 0; $__LIST__ = $artres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/BLOG/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
  </div>
  <a href="#sidebar" class="am-btn am-btn-sm am-btn-success am-icon-bars am-show-sm-only my-button" data-am-offcanvas><span class="am-sr-only">侧栏导航</span></a>
</div>

<footer class="my-footer">
  <p>sidebar template<br><small>© Copyright XXX. by the AmazeUI Team.</small></p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
</body>
</html>