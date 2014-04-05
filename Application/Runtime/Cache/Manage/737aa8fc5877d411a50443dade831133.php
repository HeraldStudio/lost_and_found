<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
  <title>失物招领个人中心</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/1/7/6/lost_and_found/Public/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="/1/7/6/lost_and_found/Public/css/manage.css" rel="stylesheet" media="screen">
    <link href="/1/7/6/lost_and_found/Public/css/Bootstrap-Responsive.min.css" rel="stylesheet" media="screen">
    <link href="/1/7/6/lost_and_found/Public/css/application.css" rel="stylesheet" media="screen">
  

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../../Public/js/html5shiv.js"></script>
      <script src="../../../Public/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


  	<div id="global" >
      <div id="head">
       </div>
 </div>

 <div id="sechead">
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
          <li><a href="/1/7/6/lost_and_found/index.php/manage/index/index">个人中心</a></li>
          <li><a href="http://herald.seu.edu.cn" target="_blank">先声首页</a></li>
          <li><a href="http://herald.seu.edu.cn/herald_league/" target="_blank">活动平台</a></li>
          <li><a href="http://herald.seu.edu.cn/window/" target="_blank">东大之窗</a></li>
          <li><a href="http://herald.seu.edu.cn/about/" target="_blank">关于我们</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
   </div>


    <div id="container"> 
    <div><?php echo ($i["username"]); ?></div> 
    <?php
 if($logstatus){ ?>
    <div id="logWindow">
      <div id="logHead">
        <h2>个人中心登录</h2>
      </div>
      <form class="form-horizontal" id="loginForm" role="form">
        <div class="form-group">
          <label for="username" class="col-sm-3 control-label">用户名：</label>
          <div class="loginInput">
            <input type="username" class="form-control" id="username" placeholder="用户名">
          </div>
        </div>
        <div class="form-group">
          <label for="passward" class="col-sm-3 control-label">密码：</label>
          <div class="loginInput">
            <input type="password" class="form-control" id="password" placeholder="密码">
          </div>
        </div>
      </form>
      <div id="pleaseLogin" class="alert alert-danger">您尚未登录，请您先登录</div>
      <button class="btn btn-default" id="login">登&nbsp&nbsp&nbsp&nbsp录</button>
    </div>

<?php
}else{ ?>
       
    <div class="pro-header">
      <h2>欢迎您登陆个人管理中心</h2>
      <p>在这里，您可以查看，修改自己发布的信息</p>
      <div class="line"></div>
      <div class="thumbnail" id="pickinfo">
        <span class="glyphicon glyphicon-music"></span>
        <h2>招领信息<h2>
      </div>
       <div class="thumbnail" id="loseinfo">
         <span class="glyphicon glyphicon-headphones"></span>
        <div><h2>寻物信息<h2></div> 
       </div>
    </div>
    <div id="add"></div>


   </div>

   <div id="remark"><div>
  <?php
 }?>
</div>
    <div id="foot">
      <h5> Copyright © 2001-2014 Herald.seu.edu.cn</h5>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/1/7/6/lost_and_found/Public/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/1/7/6/lost_and_found/Public/js/bootstrap.js"></script>
    <script src="/1/7/6/lost_and_found/Public/js/manage.js"></script>

  </body>
</html>