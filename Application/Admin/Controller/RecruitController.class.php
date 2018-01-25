<?php
namespace Admin\Controller;
use Think\Controller;
class RecruitController extends CommonController{

	public function __construct(){
		parent::__construct();
	}

	public function recruit_list(){
		if($_GET['num']){
            $num = I("get.num",0,"intval");
        }else{
            $num=10;
        }
		$recruits = D("Recruit")->getRecruits($num,array());
		$this->assign("list",$recruits[0]);
        $this->assign("page",$recruits[1]);
		$this->display();
	}
	
	public function recruit_add(){
		if($_POST){
			$_POST['public_date']=strtotime($_POST['public_date']);
			D("Recruit")->addRecruit($_POST);
			$this->assign("jumpUrl",U('Recruit/recruit_list'));
			$this->success('添加成功！');
		}else{
			$company=M("Contact")->field("address")->where("id=1")->find();
			$this->assign("company",$company);
			$this->display();
		}
	}

	public function recruit_edit(){
		if($_POST){
			$_POST['public_date']=strtotime($_POST['public_date']);
			D("Recruit")->editRecruit($_POST);
			$this->assign("jumpUrl",U('Recruit/recruit_list'));
			$this->success('修改成功！');
		}else{
			$where['id'] = I("get.id",0,"intval");
			$this_recruit = D("Recruit")->getRecruit($where);
			$this_recruit['public_date']=date('Y-m-d',$this_recruit['public_date']);
			$this->assign('this_recruit',$this_recruit);
			$this->display();
		}
	}

	public function recruit_del(){
		$result = array();
        $id = I('get.id',0,'intval');
        $result = D("Recruit")->delRecruit($id);
        print_r(json_encode($result));
	}

	public function recruit_search(){
		if($_GET['num']){
            $num = I("get.num",0,"intval");
        }else{
            $num=10;
        }
		$where['position']=array('like','%'.$_POST['position'].'%');
		$recruits = D("Recruit")->getRecruits($num,$where);
		$this->assign("list",$recruits[0]);
        $this->assign("page",$recruits[1]);
		$this->display();
	}
	
	//批量删除
	public function batch_del(){
		if($_GET['id']){
			$id_str = I('get.id');
            $id_str = trim($id_str,',');
            $id_arr = explode(',', $id_str);
            foreach ($id_arr as $key => $val) {
                $result = D("Recruit")->delRecruit($val);
                if($result['info']){
                    $success_delete[] = $val;
                }else{
                    $failed_delete[] = $val;
                }
            }
            if(!empty($success_delete)){
                $success_str = "";
                foreach ($success_delete as $k => $v) {
                    $success_str .= $v.',';
                }
            }
            if(!empty($failed_delete)){
                $failed_str = "";
                foreach ($failed_delete as $k => $v) {
                    $failed_str .= $v.',';
                }
            }
            if(empty($failed_delete)){
                $message = "删除成功！";
            }elseif(empty($success_delete)){
                $message = "全部删除失败！";
            }else{
                $message = "ID为".trim($success_str,',')."的招聘删除成功！ID为".trim($failed_str,',')."的招聘删除失败！";
            }
            $this->success($message,U('Recruit/recruit_list'),5);
        }
	}

}
?>