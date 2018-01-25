<?php
namespace Admin\Controller;
use Think\Controller;
class ContactController extends CommonController{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if($_POST){
			if($_POST['common']['id']){
				if(!$_POST['common']['company_name']){
					$this->assign("jumpUrl",U('Contact/index'));
					$this->error('公司名称不能为空！');
				}else{
					
					D("Contact")->editContact($_POST['common']);
					
					if($_POST['linkman']){
						$this->insert_link($_POST['linkman'],$_POST['mobilephone']);
					}
					if($_POST['old_linkman']){
						$this->edit_link($_POST['old_linkman'],$_POST['old_mobilephone']);
					}
					$this->assign("jumpUrl",U('Contact/index'));
					$this->success('修改成功！');
				}
			}else{
				if(!$_POST['common']['company_name']){
					$this->assign("jumpUrl",U('Contact/index'));
					$this->error('公司名称不能为空！');
				}else{
					D("Contact")->addContact($_POST['common']);
					$this->insert_link($_POST['linkman'],$_POST['mobilephone']);
					$this->assign("jumpUrl",U('Contact/index'));
					$this->success('添加成功！');
				}
			}
		}else{
			if($company=D("Contact")->getContact()){
				$this->assign("company",$company);
			}else{
				$this->assign("company",array());
			}

			if($links=D("Contact")->getLinks()){
				$this->assign("links",$links);
			}else{
				$this->assign("links",array());
			}

			$this->display();
			
		}
	}
	
	public function link_del(){
		$result = array();
        $id = I('get.id',0,'intval');
        $result = D("Contact")->delLink($id);
        print_r(json_encode($result));
	}

	public function insert_link($linkman,$mobilephone){
		foreach ($linkman as $k => $v) {
			$insert_arr = array();
			$insert_arr['linkman']=$v;
			$insert_arr['mobilephone']=$mobilephone[$k];
			D("Contact")->addLink($insert_arr);
		}
	}

	public function edit_link($linkman,$mobilephone){
		foreach ($linkman as $k => $v) {
			$insert_arr = array();
			$insert_arr['id']=$k;
			$insert_arr['linkman']=$v;
			$insert_arr['mobilephone']=$mobilephone[$k];
			D("Contact")->editLink($insert_arr);
		}
	}

}
?>