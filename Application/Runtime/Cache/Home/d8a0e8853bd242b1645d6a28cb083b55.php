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
          <li><a href="http://herald.seu.edu.cn" target="_blank">先声首页</a></li>
          <li id="loseinfo">失物信息</li>
          <li><a href="#">招领信息</a></li>
          <li><a href="http://herald.seu.edu.cn/about/" target="_blank">关于我们</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
   </div>


   <div id="container">

      <table class="table table-hover">
      <tr class="success">
        <th id="id"><strong>#</strong></th>
        <th id="type"><strong>类型</strong></th>
        <th><strong>名称</strong></th>
        <th><strong>地点</strong></th>
        <th><strong>时间</strong></th>
        <th id="status"><strong>状态</strong></th>
        <th id="confirm"><strong>确认</strong></th>
        <th id="delete"><strong>删除</strong></th>
        <th id="delete"><strong>查看留言</strong></th>
      </tr>
    </table>
    <div id="add"></div>


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