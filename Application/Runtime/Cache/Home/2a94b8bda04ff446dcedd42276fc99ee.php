<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>失物招领平台</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="Application/Home/View/Index/support/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="Application/Home/View/Index/support/css/application.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="Application/Home/View/Index/support/js/html5shiv.js"></script>
      <script src="Application/Home/View/Index/support/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  	<div id="myHead">
		<img id="headImg" src="Application/Home/View/Index/support/img/return-back.png"/>
		<div id="myTitle">
			<div id="myTitle1"><strong>失物招领</strong></div>
			<div id="myTitle2">您口袋的小补丁</div>
		</div>

		<div id="nav">
			<nav class="navbar navbar-default" id="navbar" role="navigation">
			  <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			      <span class="sr-only">Toggle navigation</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand"><strong>失物招领</strong></a>
			  </div>

			  <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    <ul class="nav navbar-nav" id="tool">
			    	<li class="toolButton"><button type="button" class="btn btn-primary navbar-btn">全部信息</button></li>
  					<li class="toolButton"><button type="button" class="btn btn-primary navbar-btn">有人捡到</button></li>
  					<li class="toolButton"><button type="button" class="btn btn-primary navbar-btn">有人丢失</button></li>
            <li class="toolButton"><button type="button" class="btn btn-warning navbar-btn">我捡到了...</button></li>
            <li class="toolButton"><button type="button" class="btn btn-warning navbar-btn">我弄丢了...</button></li>
			    </ul>
          <ul class="nav navbar-nav">
            <li class="toolButton"><button type="button" class="btn btn-success navbar-btn" data-toggle="modal" data-target="#filter">类型筛选</button></li>
            <li class="toolButton"><button type="button" class="btn btn-info navbar-btn">成绩展示</button></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="account">
                账户<span class="glyphicon glyphicon-user"></span><b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li id="loginButton"><a href="#">登 陆<span class="glyphicon glyphicon-log-in"></span></a></li>
                <li class="divider"></li>
                <li id="logoutButton" class="disabled"><a href="#">退 出<span class="glyphicon glyphicon-log-out"></span></a></li>
              </ul>
            </li>
          </ul>

          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
            <input type="text" class="form-control" id="searchInput" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </form>

			  </div><!-- /.navbar-collapse -->
			</nav>
		</div>
  	</div>

    <!-- Modal login-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true" id="closeLogin2">&times;</button>
            <h4 class="modal-title" id="myModalLabel">用户登陆</h4>
          </div>
          <div class="modal-body">
          <!--窗口主体-->
            <form class="form-horizontal" id="loginForm" role="form">
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">用户名：</label>
                <div class="loginInput">
                  <input type="username" class="form-control" id="username" placeholder="用户名">
                </div>
              </div>

              <div class="form-group">
                <label for="passward" class="col-sm-2 control-label">密码：</label>
                <div class="loginInput">
                  <input type="password" class="form-control" id="password" placeholder="密码">
                </div>
              </div>
            </form>

            <p id="loginTip">用户名为一卡通号码，密码为个人中心统一认证密码</p>
            <div id="logInfo" class="alert">&nbsp</div>
          <!--窗口主体-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default"  id="closeLogin">关闭</button>
            <button type="button" class="btn btn-primary" id="login">登陆</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal filter -->
    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true" id="closeFilter">&times;</button>
            <h4 class="modal-title" id="myModalLabel">类型筛选</h4>
          </div>
          <div class="modal-body">
          <!--窗口主体-->
          <div class="filterBox">
            <label class="checkbox-inline filterBoxCheck">
              <input type="checkbox" checked> 书本文具
            </label>
            <label class="checkbox-inline filterBoxCheck">
              <input type="checkbox" checked> 电子产品
            </label>
            <label class="checkbox-inline filterBoxCheck">
              <input type="checkbox" checked> 卡片证件
            </label>
          </div>
          <div class="filterBox">
            <label class="checkbox-inline filterBoxCheck">
              <input type="checkbox" checked> 钱包钱币
            </label>
            <label class="checkbox-inline filterBoxCheck">
              <input type="checkbox" checked> 钥匙挂件
            </label>
            <label class="checkbox-inline filterBoxCheck">
              <input type="checkbox" checked> 其它等等
            </label>
          </div>
          <!--窗口主体-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default"  id="closeFilter2">取消</button>
            <button type="button" class="btn btn-primary">确定</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  	<div id="tip">
  		失物招领
  		<div id="tipInner">全部信息</div>
  	</div>
  	<img id="pin" src="Application/Home/View/Index/support/img/pin.png"/>

    <div class="vBar" id="allInf"></div>
  	<div class="vBar" id="someonePick"></div>
  	<div class="vBar" id="someoneLose"></div>
  	<div class="vBar" id="ILose"></div>
  	<div class="vBar" id="IPick"></div>
  	<div class="vBar" id="ourHonor"></div>

  	<div class="vBar2" id="allInf2">全部信息</div>
  	<div class="vBar2" id="someonePick2">有人捡到</div>
  	<div class="vBar2" id="someoneLose2">有人丢失</div>
  	<div class="vBar2" id="ILose2">我捡到了...</div>
  	<div class="vBar2" id="IPick2">我弄丢了...</div>
  	<div class="vBar2" id="ourHonor2" data-toggle="modal" data-target="#filter">类型筛选</div>

    <div id="secondHead"></div>

    <div id="container">
        <div id="content-inner"></div>
        <div class="clear"></div>
        <div id="addmore" class="btn btn-default">加载更多</div>
    </div>
    


    <div id="foot">
      <h5> CopyRight © 2001-2014 Herald.seu.edu.cn</h5>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="Application/Home/View/Index/support/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Application/Home/View/Index/support/js/bootstrap.js"></script>
    <script src="Application/Home/View/Index/support/js/animate.js"></script>
    <script src="Application/Home/View/Index/support/js/login.js"></script>
    <script src="Application/Home/View/Index/support/js/function.js"></script>
  </body>
</html>