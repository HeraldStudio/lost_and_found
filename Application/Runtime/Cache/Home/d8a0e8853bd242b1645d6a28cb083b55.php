<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
  <title>失物招领个人中心</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../../../Public/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../../Public/css/manage.css" rel="stylesheet" media="screen">
    <link href="../../../Public/css/Bootstrap-Responsive.min.css" rel="stylesheet" media="screen">
    <link href="../../../Public/css/application.css" rel="stylesheet" media="screen">
  

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../../Public/js/html5shiv.js"></script>
      <script src="../../../Public/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  

  <div id="myHead">
      <a href="http://herald.seu.edu.cn"><img id="headImg" src="../../../Public/img/return-back.png"></a>
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
            <li class="toolButton"><button type="button" class="btn btn-default navbar-btn" id="allInfo">全部信息</button></li>
            <li class="toolButton"><button type="button" class="btn btn-default navbar-btn" id="othersPick">有人捡到</button></li>
            <li class="toolButton"><button type="button" class="btn btn-default navbar-btn" id="othersLose">有人丢失</button></li>
            <li class="toolButton"><button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#picks">我捡到了</button></li>
            <li class="toolButton"><button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#loses">我弄丢了</button></li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="toolButton"><button type="button" class="btn btn-default navbar-btn" id="filterBtn">类型筛选</button></li>
            <li class="toolButton"><button type="button" class="btn btn-default navbar-btn" id="achievements">成绩展示</button></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="account"><?php echo ($username); ?><span class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li id="loginButton" class="disabled"><a href="#">登 陆<span class="glyphicon glyphicon-log-in"></span></a></li>
                <li class="divider"></li>
                <li id="logoutButton" class=""><a href="#">退 出<span class="glyphicon glyphicon-log-out"></span></a></li>
                <li class="divider"></li>
                <li class="" id="manageButton"><a href="#">管 理<span class="glyphicon glyphicon-tower"></span></a></li>
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


        <div id="secondHead">
      <img src="../../../Public/img/herald.png" id="heraldLogo">
      <div id="secondTitle"><h2>东南大学先声网 - 网络先驱的声音</h2></div>
    </div>




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
             <div class="lost_img"></div>
          <a href="#">浏览发布信息</a>
        </li>
          <li>
             <div class="find_img"></div>
            <a href="#">留言回复</a>
          </li>
          <li>
             <div class="info_img"></div>
            <a href="#">站内信</a>
          </li>
          <li>
             <div class="message_img"></div>
            <a href="#">联系我们</a></li>
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

  </div>
      </div>


  
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