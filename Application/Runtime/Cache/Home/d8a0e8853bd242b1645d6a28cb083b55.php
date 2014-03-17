<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
  <title>失物招领个人中心</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/6/lost_and_found/Public/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="/6/lost_and_found/Public/css/manage.css" rel="stylesheet" media="screen">
    <link href="/6/lost_and_found/Public/css/Bootstrap-Responsive.min.css" rel="stylesheet" media="screen">
    <link href="/6/lost_and_found/Public/css/application.css" rel="stylesheet" media="screen">
  

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../../Public/js/html5shiv.js"></script>
      <script src="../../../Public/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  






  <div id="container">    

    <div id="ctn-head">
      <h1 class="ctn-font">
        <div class="home_img"></div>
        <span>用户个人管理中心</span>
      </h1>
    </div>

    <div id="left">
      <div id="menu">
          <ul>
          <li>
             <div class="find_img"></div>
          <a href="<?php echo U('Home/PickInfo/index');?>">浏览招领信息</a>
        </li>
          <li>
             <div class="lost_img"></div>
            <a href="<?php echo U('Home/LoseInfo/index');?>">浏览寻物信息</a>
          </li>
          <li>
             <div class="message_img"></div>
            <a href="<?php echo U('Home/Message/index');?>">留言回复</a></li>
          </ul>
          </div>
     </div>

     <div id="right"> 
    <nav class="navbar navbar-default" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><strong>失物招领个人中心</strong></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav" id="headnav">
          <li><a href="http://herald.seu.edu.cn" target="_blank">先声首页</a></li>
          <li><a href="#">失物招领</a></li>
          <li><a href="http://herald.seu.edu.cn/herald_league/" target="_blank">活动平台</a></li>
          <li><a href="http://herald.seu.edu.cn/window/" target="_blank">东大之窗</a></li>
          <li><a href="http://herald.seu.edu.cn/about/" target="_blank">关于我们</a></li>
          <li><a href="#" target="blank">二手市场</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
<h3 align="center">O(∩_∩)O 欢迎来到管理页面</h3>  
</div>
</div>
  <div id="foot">
    <h5> Copyright © 2001-2014 Herald.seu.edu.cn</h5>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="__Public__/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/6/lost_and_found/Public/js/bootstrap.js"></script>
    <script src="/6/lost_and_found/Public/js/manage.js"></script>

  </body>
</html>