<?php
namespace Admin\Controller;
use Think\Controller;
class BannerController extends CommonController{

	public function __construct(){
		parent::__construct();
	}

	public function banner_list(){
		if($_GET['num']){
            $num = I("get.num",0,"intval");
        }else{
            $num=10;
        }
		$banners = D("Banner")->getBanners($num,array());
		$this->assign("list",$banners[0]);
		$this->assign("page",$banners[1]);
		$this->display();
	}
	
	public function banner_add(){
		if($_POST){
			D("Banner")->addBanner($_POST);
			$this->assign("jumpUrl",U('Banner/banner_list'));
			$this->success('添加成功！');
		}else{
			$this->display();
		}
	}

	public function banner_del(){
		$result = array();
        $id = I('get.id',0,'intval');
        $result = D("Banner")->delBanner($id);
        print_r(json_encode($result));
	}
	
	public function banner_edit(){
		if($_POST){
			D("Banner")->editBanner($_POST);
			$this->assign("jumpUrl",U('Banner/banner_list'));
			$this->success('修改成功！');
		}else{
			$where['id'] = I("get.id",0,"intval");
			$this_banner = D("Banner")->getBanner($where);
			$this->assign('this_banner',$this_banner);
			$this->display();
		}	
	}
	public function banner_search(){
		if($_GET['num']){
            $num = I("get.num",0,"intval");
        }else{
            $num=10;
        }
		$where['banner_name']=array('like','%'.$_POST['banner_name'].'%');
		$articles = D("Banner")->getBanners($num,$where);
		$this->assign("list",$articles[0]);
        $this->assign("page",$articles[1]);
		$this->display();
	}

	//批量删除
	public function batch_del(){
		if($_GET['id']){
			$id_str = I('get.id');
            $id_str = trim($id_str,',');
            $id_arr = explode(',', $id_str);
            foreach ($id_arr as $key => $val) {
                $result = D("Banner")->delBanner($val);
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
                $message = "ID为".trim($success_str,',')."的图片删除成功！ID为".trim($failed_str,',')."的图片删除失败！";
            }
            $this->success($message,U('Banner/banner_list'),5);
        }
	}

}
?>