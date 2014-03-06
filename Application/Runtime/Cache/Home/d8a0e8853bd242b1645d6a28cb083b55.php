<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
  <title>失物招领个人中心</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../../../Public/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../../Public/css/manage.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../../Public/js/html5shiv.js"></script>
      <script src="../../../Public/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <div id="container">    

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

      <ul class="nav navbar-nav navbar-right">
        <li>
          <a>
            <?php echo ($username); ?> <span class="glyphicon glyphicon-user"></span>
          </a>
        </li>
      </ul>

      </div><!-- /.navbar-collapse -->
    </nav>

<?php
 if(!$logStatus){ ?>

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
      </tr>
      <tr>
        <td>1</td>
        <td>丢失</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>未找回</td>
        <td><button type="lose" infoid="1" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-ok"></span> 已找回</button></td>
        <td><button type="lose" infoid="2" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> 删除</button></td>
      </tr>
      <tr>
        <td>1</td>
        <td>捡到</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>已归还</td>
        <td>已确认</td>
        <td><button type="pick" infoid="2" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> 删除</button></td>
      </tr>
     <tr>
        <td>1</td>
        <td>捡到</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>未归还</td>
        <td><button type="pick" infoid="1" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-ok"></span> 已归还</button></td>
        <td><button type="pick" infoid="2" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> 删除</button></td>
      </tr>
    </table>

<?php
}?>




  </div>

  <div id="foot">
    <h5> Copyright © 2001-2014 Herald.seu.edu.cn</h5>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../../Public/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../Public/js/bootstrap.js"></script>
    <script src="../../../Public/js/manage.js"></script>
  </body>
</html>