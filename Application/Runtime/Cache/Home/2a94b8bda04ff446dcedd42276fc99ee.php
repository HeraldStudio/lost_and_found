<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>失物招领平台</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="Public/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="Public/css/application.css" rel="stylesheet" media="screen">
    <link href="Public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="Public/js/html5shiv.js"></script>
      <script src="Public/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  	<div id="myHead">
		<div id="myTitle">
			<div id="myTitle1"><strong>失物招领</strong></div>
			<div id="myTitle2">您口袋的小补丁</div>
		</div>
    <img src="Public/img/herald.png" id="heraldLogoTop">

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
            <li class="toolButton"><button type="button" class="btn btn-default navbar-btn" id="achievements">成绩展示</button></li>
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
                <li class="divider"></li>
                <li class="disabled" id="manageButton"><a href="#">管 理<span class="glyphicon glyphicon-tower"></span></a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="toolButton"><button type="button" class="btn btn-default navbar-btn" id="filterBtn">信息筛选 <span class="glyphicon glyphicon-search"></span></button></li>
          </ul>

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
            <h4 class="modal-title" id="myModalLabel">信息筛选</h4>
          </div>
          <div class="modal-body">
          <!--窗口主体-->

            <div class="panel panel-default">
              <div class="panel-heading">类型筛选</div>
              <div class="panel-body">
                  <div class="filterBox">
                    <label class="checkbox-inline filterBoxCheck">
                      <input type="checkbox" id="stationery"> 书本文具
                    </label>
                    <label class="checkbox-inline filterBoxCheck">
                      <input type="checkbox" id="electronic"> 电子产品
                    </label>
                    <label class="checkbox-inline filterBoxCheck">
                      <input type="checkbox" id="card"> 卡片证件
                    </label>
                  </div>
                  <div class="filterBox">
                    <label class="checkbox-inline filterBoxCheck">
                      <input type="checkbox" id="money"> 钱包钱币
                    </label>
                    <label class="checkbox-inline filterBoxCheck">
                      <input type="checkbox" id="keys"> 钥匙挂件
                    </label>
                    <label class="checkbox-inline filterBoxCheck">
                      <input type="checkbox" id="others"> 其它等等
                    </label>
                  </div>
              </div>
            </div>

           <div class="panel panel-default">
            <div class="panel-heading">时间筛选</div>
            <div class="panel-body">

            <div class="form-group">
                <label for="dtp_input1" class="control-label filterTimeLabel">起始时间：</label>
                <div class="input-group date form_datetime" data-date="2014-3-8 13:49:00" data-date-format="yyyy-mm-dd hh:ii:ss" id="beginTime"  data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" />
            </div>


            <div class="form-group">
                <label for="dtp_input2" class="control-label filterTimeLabel">结束时间：</label>
                <div class="input-group date form_datetime" data-date="2014-3-8 13:49:00" data-date-format="yyyy-mm-dd hh:ii:ss" id="endTime" data-link-field="dtp_input2">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input2" value="" />
            </div>

            </div>
          </div>

           <div class="panel panel-default">
            <div class="panel-heading">名称匹配</div>
            <div class="panel-body">           
              <input type="text" class="form-control" id="searchInput" placeholder="输入您要找的物品的名称">
            </div>
          </div>


          <!--窗口主体-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default"  id="closeFilter2">取消</button>
            <button type="button" class="btn btn-primary" id="filterOK">确定</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

 <!-- picks Modal -->
  <div class="modal fade" id="picks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">发布招领信息</h4>
        </div>
        <!--窗口主体-->
        <div class="modal-body">
            <form class="form-horizontal" id="picksForm" role="form" enctype="multipart/form-data" target="tarframe" method="post" name="myfile">
              <div class="form-group">
                <label for="pc_thing_name" class="col-sm-3 control-label">物品名称：</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="pc_thing_name" placeholder="物品名称">
                </div>
              </div>
                
                   <div class="form-group">
                <label for="type" class="col-sm-3 control-label">类型：</label>
                <div class="col-xs-6">
              <select class="form-control" id="pc_type">
                 <option id="inlineCheckbox1" value="stationery"> 书本文具</option>
                <option  id="inlineCheckbox2" value="electronic"> 电子产品</option>
                <option  id="inlineCheckbox3" value="card"> 卡片证件</option>
                <option  id="inlineCheckbox4" value="money"> 钱包钱币</option>
                <option  id="inlineCheckbox5" value="keys"> 钥匙挂件</option>
                <option  id="inlineCheckbox6" value="others"> 其它等等</option>
              </select>
            </div>
            </div>
              <div class="form-group">
                    <label for="pc_place" class="col-sm-3 control-label">地点：</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="pc_place" placeholder="地点">
                </div>
              </div>

              <div class="form-group">
                    <label for="pc_datetime" class="col-sm-3 control-label">时间:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="pc_datetime"  placeholder="时间">
                </div>
              </div>

              <div class="form-group">
                    <label for="ls_contact" class="col-sm-3 control-label">联系方式：</label>
                <div class="col-sm-6">
                    <input type="tel" class="form-control" id="pc_contact" placeholder="联系方式">
                </div>
              </div>

              <div class="form-group">
                    <label for="place" class="col-sm-3 control-label">上传图片：</label>
                <div class="col-sm-6">
              
            <label class="radio inline">
              <input type="radio" value="0" checked="checked" name="pc_has_picture" >
              否
              </label>
            <label class="radio inline">
              <input type="radio" value="1" name="pc_has_picture">
              是
            </label>
            <label>
            <input type="file" class="Input_file" id="pc_picture" name="pc_picture" >
            </label>
                </div>
              </div>

              <div class="form-group">
                <label for="pc_thing_des" class="col-sm-3 control-label">备注：</label>
                <div class="col-sm-6">
                <textarea class="form-control" rows="3" id="pc_thing_describe"></textarea>
              </div>
              </div>
                    </form>
                    <iframe src=""  width="0" height="0" style="display:none;" name="tarframe">
                    </iframe>
                    <p id="ls_Tip">  Tips:时间不确定可以写相近的日期~</p>
                  </div>
          <!--窗口主体-->     
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          <button type="button" class="btn btn-primary" id="pc_send">确认</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

   <!-- loses Modal -->
  <div class="modal fade" id="loses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">发布寻物信息</h4>
        </div>
        <!--窗口主体-->
        <div class="modal-body">
           <form class="form-horizontal" id="losesForm" role="form" enctype="multipart/form-data" target="tariframe" method="post" name="myfile">
              <div class="form-group">
                <label for="pc_things_name" class="col-sm-3 control-label">物品名称：</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="ls_thing_name" placeholder="物品名称">
                </div>
              </div>
                
               <div class="form-group">
                <label for="type" class="col-sm-3 control-label">类型：</label>
                <div class="col-xs-6">
              <select class="form-control" id="ls_type">
                 <option id="inlineCheckbox1" value="stationery"> 书本文具</option>
                <option  id="inlineCheckbox2" value="electronic"> 电子产品</option>
                <option  id="inlineCheckbox3" value="card"> 卡片证件</option>
                <option  id="inlineCheckbox4" value="money"> 钱包钱币</option>
                <option  id="inlineCheckbox5" value="keys"> 钥匙挂件</option>
                <option  id="inlineCheckbox6" value="others"> 其它等等</option>
              </select>
            </div>
            </div>
              <div class="form-group">
                    <label for="ls_place" class="col-sm-3 control-label">地点：</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="ls_place" placeholder="地点">
                </div>
              </div>

              <div class="form-group">
                    <label for="pc_datetime" class="col-sm-3 control-label">时间:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="ls_datetime"  placeholder="时间">
                </div>
              </div>

              <div class="form-group">
                    <label for="ls_contact" class="col-sm-3 control-label">联系方式：</label>
                <div class="col-sm-6">
                    <input type="tel" class="form-control" id="ls_contact" placeholder="联系方式">
                </div>
              </div>

              <div class="form-group">
                    <label for="place" class="col-sm-3 control-label">上传图片：</label>
                <div class="col-sm-6">
              
            <label class="radio inline">
              <input type="radio" value="0" checked="checked" name="ls_has_picture">
              否
              </label>
            <label class="radio inline">
              <input type="radio" value="1" name="ls_has_picture">
              是
            </label>
            <label>
            <input type="file" class="Input_file" id="ls_picture" name="ls_picture">
            </label>
                </div>
              </div>

              <div class="form-group">
                <label for="ls_thing_des" class="col-sm-3 control-label">备注：</label>
                <div class="col-sm-6">
                <textarea class="form-control" rows="3" id="ls_thing_describe"></textarea>
              </div>
              </div>
                    </form>
                    <iframe src=""  width="0" height="0" style="display:none;" name="tariframe">
                    </iframe>
                    <p id="ls_Tip">  Tips:时间不确定可以写相近的日期~</p>
                  </div>
          <!--窗口主体-->     
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          <button type="button" class="btn btn-primary" id="ls_send">确认</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

    <div id="tip">
      当前范围
      <div id="tipInner">全部信息</div>
    </div>
    <img id="pin" src="Public/img/pin.png"/>

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
    <div class="vBar2" id="ourHonor2">信息筛选</div>

    <!-- Modal detail -->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true" id="closeDetail">&times;</button>
            <h4 class="modal-title" id="myModalLabel">详细信息</h4>
          </div>
          <div class="modal-body" id="detail-content">
          <!--窗口主体-->
    

          <!--窗口主体-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default"  id="closeDetail2">关闭</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <div id="con-border">
      <div id="secondHead">
        <img src="Public/img/herald.png" id="heraldLogo">
        <div id="secondTitle"><h2>东南大学先声网 - 网络先驱的声音</h2></div>
      </div>


      <div id="container">
          <div id="content-inner"></div>
          <div class="clear"></div>
          <div id="addmore" class="btn btn-default">加载更多</div>
      </div>
    </div>

    <div id="commentBox">
        <textarea type="area" rows="3" cols="10" class="form-control" id="commentContent" placeholder="评论"></textarea>
        <button class="btn btn-default btn-sm" id="hide"> 隐藏 </button>
        <button class="btn btn-primary btn-sm" id="submit"> 发表 </button>
    </div>

    <div id="foot">
      <h5> Copyright © 2001-2014 Herald.seu.edu.cn</h5>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="Public/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Public/js/bootstrap.js"></script>
    <script src="Public/js/bootstrap-datetimepicker.min.js"></script>
    <script src="Public/js/bootstrap-datetimepicker.fr.js"></script>
    <script src="Public/js/animate.js"></script>
    <script src="Public/js/login.js"></script>
    <script src="Public/js/function.js"></script>
    <script src="Public/js/formhandle.js"></script>
    <script src="Public/js/placeholder.js"></script>
    <script src="Public/js/ajaxfileupload.js"></script>
  </body>
</html>