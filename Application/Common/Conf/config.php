<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE' => 'mysql', // 数据库类型
	'DB_HOST' => 'localhost', // 服务器地址
	'DB_NAME' => 'lost_and_found', // 数据库名
	'DB_USER' => 'root', // 用户名
	'DB_PWD' => '', // 密码
	'DB_PORT' => '3306', // 端口
	'DB_PREFIX' => '', // 数据库表前缀
	//'DB_DSN' => '', // 数据库连接DSN 用于PDO方式
	'MODULE_ALLOW_LIST' =>array('Home','Manage'),//项目分组
	'DEFAULT_MODULE' =>'Home',//默认分组
);