<?php

return array(
	//'配置项'=>'配置值'
	'USER_AUTH_ON'	       =>  true,      		       //开启认证
    'USER_AUTH_TYPE'       =>  1,           		   //用户认证使用SESSION标记
    'USER_AUTH_KEY'	       =>  'authId',			   //设置认证SESSION的标记名称
	'RBAC_SUPERADMIN'      =>  'admin',
    'ADMIN_AUTH_KEY'       =>  'superadmin',		   //管理员用户标记
    'USER_AUTH_MODEL'      =>  'Admin',		           //验证用户的表模型u_admin  管理员表zx_admin
    'AUTH_PWD_ENCODER'     =>  'md5',				   //用户认证密码加密方式
    'USER_AUTH_GATEWAY'    =>  '',                     //默认的认证网关
    'NOT_AUTH_MODULE'      =>  '',                     //默认不需要认证的模块'A,B,C'
    'REQUIRE_AUTH_MODULE'  =>  '',                     //默认需要认证的模块
    'NOT_AUTH_ACTION'      =>  '',                     //默认不需要认证的动作
    'REQUIRE_AUTH_ACTION'  =>  '',               	   //默认需要认证的动作
    'GUEST_AUTH_ON'        =>  false,            	   //是否开启游客授权访问
    'GUEST_AUTH_ID'        =>  0,                	   //游客标记    
	'TMPL_TEMPLATE_SUFFIX' =>  '.php',                 //默认模板文件后缀
	'DEFAULT_CONTROLLER'    =>  'Public',              // 默认控制器名称
    'DEFAULT_ACTION'        =>  'login',               // 默认操作名称
);