<?php

namespace Home\Model;

class RecruitModel extends CommonModel{

	public $tableName = "Recruit";

	public function __construct(){
		parent::__construct();
	}

	public function getRecruits($num=10,$where=array()){
		$Recruit = M($this->tableName); // 实例化对象
		$count = $Recruit->where($where)->count();// 查询满足要求的总记录数
		if(!$num){
			$num = $count;
		}
		$Page = new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$Page->setConfig('header','<span class="total_row">共 %TOTAL_ROW% 条记录</span> | <span class="total_page">共 %TOTAL_PAGE% 页</span>');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','尾页');
		$Page->setConfig('theme','%LINK_PAGE%');

		$show = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Recruit->where($where)->order("public_date DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach ($list as $k => $v) {
			$list[$k]['public_date'] = date("Y-m-d",$v['public_date']);
			$list[$k]['responsibility'] = msubstr(strip_tags($v['responsibility']),0,200);
		}

		if($count <= $num){
			$show = "";
		}

		return array($list,$show);
	}

	public function getRecruit($where){
		$recruit = M("Recruit")->where($where)->find();
		$recruit['public_date'] = date("Y-m-d",$recruit['public_date']);
		return $recruit;
	}


	public function getRecord($id,$ip){
		$where['obj_id'] = $id;
		$where['type'] = 2;
		$where['ip'] = $ip;
		if($result = M("Hits_log")->where($where)->order("time DESC")->limit(1)->find()){
			return $result;
		}else{
			return false;
		}
	}

	public function recordHit($data){
		$hit = M("Hits_log");
		$hit->create($data);
		if($hit->add()){
			$where['id'] = $data['obj_id'];
			M($this->tableName)->where($where)->setInc('hits'); // 浏览数加1
		}
	}

}


?>