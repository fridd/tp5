<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	public function index(){
		$menu_arr=array(
			'文章分类'=>array(
			    '分类列表'=>U('Category/category_list'),
			    '分类添加'=>U('Category/category_add'),
			),
		    '文章管理'=>array(
			    '文章列表'=>U('Article/article_list'),
			    '文章添加'=>U('Article/article_add')
			),
			'图片轮播'=>array(
			    '图片列表'=>U('Banner/banner_list'),
			    '图片添加'=>U('Banner/banner_add')
			),
			'招聘管理'=>array(
			    '招聘列表'=>U('Recruit/recruit_list'),
			    '招聘添加'=>U('Recruit/recruit_add'),
			),
			'联系我们'=>array(
				'联系我们'=>U('Contact/index')
			),
			'系统设置'=>array(
			    '修改密码'=>U('System/index')
			),
		);
		$this->assign('menu_arr',$menu_arr);
		$this->display();
	}
	public function center(){
		$login_info=array();
		$login_info['times']=M("System_log")->count();
		$login_info['last_login']=M("System_log")->order("login_time DESC")->limit(1,1)->find();
		$login_info['last_login']['login_time']=date('Y-m-d H:i:s',$login_info['last_login']['login_time']);

		$this->assign("login_info",$login_info);
		$this->display();
	}
}