<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends CommonController{

	public function index(){

		if($_POST['username'] && $_POST['old_password'] && $_POST['new_password'] && $_POST['confirm_password']){
			
			if($_POST['new_password'] != $_POST['confirm_password']){
				$this->assign("jumpUrl",U('System/index'));
				$this->error('两次输入密码不一样，请重新输入！');
			}

			$where['username']=$_POST['username'];
			$where['password']=md5($_POST['old_password']);

			if($admin=D("System")->getAdmin($where)){

				$edit_info["username"]=$_POST['username'];
				$edit_info["password"]=md5($_POST['new_password']);
				$edit_info['id']=$admin['id'];
				
				if(D("System")->editAdmin($edit_info)){
					$this->assign("jumpUrl",U('System/index'));
					$this->success('修改成功！');
				}else{
					$this->assign("jumpUrl",U('System/index'));
					$this->error('修改失败！');
				}
			}else{
				$this->assign("jumpUrl",U('System/index'));
				$this->error('账户或原密码错误！');
			}
		}else{
			$username=$_SESSION['user'];
			$this->assign("username",$username);
			$this->display();
		}
		
	}

}
?>