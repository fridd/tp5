<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
use Org\Util\Rbac;
class PublicController extends Controller{
	//显示登录页面
	public function login(){
        
        //公司信息
        $company=M("Contact")->where("id=1")->find();
        $this->assign("company",$company);
        
        if($_COOKIE['username'] && $_COOKIE['password']){
            $username=$_COOKIE['username'];
            $password=$_COOKIE['password'];
        }else{
            $username="";
            $password="";
        }
        $this->assign("username",$username);
        $this->assign("password",$password);

		$this->display();
	}
	//验证码显示
    public function verify(){
		$config = array(    
		    'fontSize'    =>    50,    // 验证码字体大小    
		    'length'      =>    3,     // 验证码位数    
		    'useNoise'    =>    false, // 关闭验证码杂点
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
    }
	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
	function check_verify($code, $id = ''){
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}
	//验证是否账号密码
    function checklogin(){
		
        //此处多余可自行改为Model自动验证
        if(empty($_POST['username'])) {
            $this->error('帐号错误！');
        }elseif (empty($_POST['password'])){
            $this->error('密码必须！');
        }elseif (empty($_POST['verify'])){
            $this->error('验证码必须！');
        }
        $map=array();
        $map['username']=$_POST['username'];
        //$map['status']=array('gt',0);
        if(!$this->check_verify($_POST['verify'], $id = '')) {
            $this->error('验证码错误！');
        }
        
        //import('ORG.Util.RBAC');
        //C('USER_AUTH_MODEL','User');
        //验证账号密码
		
		
        $authInfo=Rbac::authenticate($map);
        if(empty($authInfo)){
            $this->error('账号不存在或者被禁用!');
        }else{
            if($authInfo['password']!=md5($_POST['password'])){
                $this->error('账号密码错误!');
            }else{
                    
            $_SESSION[C('USER_AUTH_KEY')]=$authInfo['id'];//记录认证标记，必须有。其他信息根据情况取用。
            //$_SESSION['email']=$authInfo['email'];
            //$_SESSION['nickname']=$authInfo['nickname'];
            $_SESSION['user']=$authInfo['username'];
            //$_SESSION['last_login_date']=$authInfo['last_login_date'];
            //$_SESSION['last_login_ip']=$authInfo['last_login_ip'];
            //判断是否为超级管理员
            if($authInfo['username']==C('RBAC_SUPERADMIN')){
                $_SESSION[C('ADMIN_AUTH_KEY')]=true;
            }
           //以下操作为记录本次登录信息
            //$user=M('User');
            //$lastdate=date('Y-m-d H:i:s');
            //$data=array();
            //$data['id']=$authInfo['id'];
            //$data['last_login_date']=$lastdate;
            //$data['last_login_ip']=$_SERVER["REMOTE_ADDR"];
            //$user->save($data);
            Rbac::saveAccessList();//用于检测用户权限的方法,并保存到Session中
			//dump($_POST['username']);exit;
			//dump($_SESSION);exit;
			//$this->assign('username',$_POST['username']);

            if($_POST['online']){
                setcookie("username",$_POST['username'],time()+3600*24*7);  
                setcookie("password",$_POST['password'],time()+3600*24*7);
            }else{
                setcookie("username",$_POST['username'],time()-1);  
                setcookie("password",$_POST['password'],time()-1);
            }

            session('username',$_POST['username']);
            
            D("Public")->addSystemLog($_POST['username']);

            $this->assign('jumpUrl',U('Index/index'));
            $this->success("登录成功！");
            }
        }
    }
    //退出登录操作
    function logout(){
        if(!empty($_SESSION[C('USER_AUTH_KEY')])){
            unset($_SESSION[C('USER_AUTH_KEY')]);
            $_SESSION=array();
            session_destroy();
            $this->assign('jumpUrl',U('Public/login'));
            $this->success('登出成功！');
        }else{
            $this->error('已经登出了！');
        }
    }
}