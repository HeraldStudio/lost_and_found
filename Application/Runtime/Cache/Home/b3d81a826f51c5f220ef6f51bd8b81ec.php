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
     
     <table class="table table-hover">
      <tr class="success">
        <th id="id"><strong>信息</strong></th>
        <th id="type"><strong>类型</strong></th>
        <th><strong>名称</strong></th>
        <th><strong>地点</strong></th>
        <th><strong>时间</strong></th>
        <th id="status"><strong>状态</strong></th>
        <th id="confirm"><strong>确认</strong></th>
        <th id="delete"><strong>删除</strong></th>
      </tr>
      <tr>
        <?php if(is_array($lsinfo)): foreach($lsinfo as $key=>$l): ?><td >丢失</td>
        <td><?php echo ($l["type"]); ?></td>
        <td><?php echo ($l["thing_name"]); ?></td>
        <td><?php echo ($l["place"]); ?></td>
        <td><?php echo ($l["datetime"]); ?></td>
        <td>
      <?php
 if($l['if_find']==0){ ?>
      未归还
      <?php
 }else{ ?>
      已归还
      <?php
 } ?>
    </td>
        <td><button type="lose" infoid="1" class="btn btn-sm btn-default" id="confirm"><span class="glyphicon glyphicon-ok"></span> <a href="<?php echo U('Home/LoseInfo/confirm',array('lose_id'=>$l['lose_id']));?>">
          <?php
 if($l['if_find']==0){ ?>
      等待确认
      <?php
 }else{ ?>
      已归还
      <?php
 } ?></a> </button></td>
        <td ><button type="lose" infoid="2" class="btn btn-sm btn-danger" ><span class="glyphicon glyphicon-remove"></span><a href="<?php echo U('Home/LoseInfo/delete',array('lose_id'=>$l['lose_id']));?>">删除</a></button></td>
      </tr><?php endforeach; endif; ?>
    <tr>
      <td colspan='8' align='right'>
        <?php echo ($page); ?>
      </td>
    </tr>
  </table>

<!--   
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
}?> -->
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