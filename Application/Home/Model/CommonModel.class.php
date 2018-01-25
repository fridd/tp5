<?php

namespace Home\Model;
use Think\Model;
class CommonModel extends Model{

	public $tableName = "Contact";

	public function __construct(){
		parent::__construct();
	}

	public function getCompanyInfo(){
		return $company = M($this->tableName)->find();
	}

    //获取一级、二级分类
    public function getCategories(){
    	$result = M("Category")->where("pid=0")->select();
    	foreach ($result as $k => $v) {
    		$where['pid'] = $v['id'];
    		$result[$k]['children'] = M("Category")->order("list_order ASC")->where($where)->select();
    	}
    	return $result;
    }

}

?>