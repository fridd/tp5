<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends CommonController {

	public function __construct(){
		parent::__construct();
		$this->assign("action","index");
	}

    public function index(){

    	//获取轮播图
    	$banners = D("Index")->getBanners();
    	$this->assign("banners",$banners);

    	//获取分类、文章
    	$where['id'] = array("in","1,3,4");
    	$articles = D("Index")->getArticles($where);
    	$this->assign("articles",$articles);

        $this->display();
    }

	public function head(){
        $this->display();
    }

    public function header(){
    	$this->display();
    }

	public function footer(){
        $this->display();
    }

	public function left(){
        $this->display();
    }

	//分页
	public function setPage($where=array()){
		$News = M('News'); // 实例化News对象
		$count = $News->where($where)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(2)
		$Page->setConfig('header','<span class="total_row">共 %TOTAL_ROW% 条记录</span> | <span class="total_page">共 %TOTAL_PAGE% 页</span>');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','尾页');
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		
		$show = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $News->where($where)->order("concat(update_date,'-',channel_type) DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
		//echo M()->getLastSql();
		//将article_name进行转换
		foreach($list as $k => $v){
			$select_article=M("Channel")->where("id=".$v['channel_type'])->find();
			$list[$k]['channel_type']=$select_article['channel_name'];
			$article_arr=explode(' ',$v['update_date']);
			$list[$k]['update_date']=$article_arr[0];
		}
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
	}
	

}