<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{

	public function __construct(){

		parent::__construct();

        $company = D("Common")->getCompanyInfo();
        $this->assign("company",$company);

        //获取一级、级分类
        $commonCategories = D("Common")->getCategories();
        $this->assign("commonCategories",$commonCategories);

		
	}
}
