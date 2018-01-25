<?php
namespace Admin\Controller;

class CategoryController extends CommonController {

	public function __construct(){
		parent::__construct();
	}
	
    public function category_list(){
        if($_GET['num']){
            $num = I("get.num",0,"intval");
        }else{
            $num=10;
        }
        $category_arr = D("Category")->getCategories($num,array());
        $this->assign("list",$category_arr[0]);
        $this->assign("page",$category_arr[1]);
    	$this->display();
    }

    public function category_add(){
        if($_POST){
            if(I('post.pid',0,'intval')){
                $parentRoute = D("Category")->getParentCategory($_POST['pid']);
                $_POST['route']=$parentRoute['route'].'-'.$parentRoute['id'];
            }else{
                $_POST['route']=0;
            }
            if(D("Category")->insertCategory($_POST)){
                $this->success('添加成功！',U('Category/category_list'));
            }
        }else{
            $category_arr = D("Category")->getCategories();
            $this->assign("list",$category_arr[0]);
            $this->display();
        }
    }

    public function category_edit(){
        
        if($_GET['id']){
            $id = I('get.id',0,'intval');
            $category_arr = D("Category")->getCategories();
            $this->assign("list",$category_arr[0]);
            $this->assign("page",$category_arr[1]);

            $this_category = D("Category")->getCategory($id);
            $this->assign("this_category",$this_category);
            $this->display();
        }else{
            if($_POST){
                if(I('post.pid',0,'intval')){
                    $parentRoute = D("Category")->getParentCategory($_POST['pid']);
                    $_POST['route']=$parentRoute['route'].'-'.$parentRoute['id'];
                }else{
                    $_POST['route']=0;
                }
                if(D("Category")->editCategory($_POST)){
                    $this->success('修改成功！',U('Category/category_list'));
                }
            }
        }
    }

    public function category_search(){
        if($_GET['num']){
            $num = I("get.num",0,"intval");
        }else{
            $num=10;
        }
        $cat_name = I("post.cat_name");
        $where['cat_name'] = array('like',"%".$cat_name."%");
        $category_arr = D("Category")->getCategories($num,$where);
        $this->assign("list",$category_arr[0]);
        $this->assign("page",$category_arr[1]);
        $this->display();
    }

    public function category_del(){
        $result = array();
        $id = I('get.id',0,'intval');
        $result = D("Category")->delCategory($id);
        print_r(json_encode($result));
    }

    public function batch_del(){
        if($_GET['id']){
            $id_str = I('get.id');
            $id_str = trim($id_str,',');
            $id_arr = explode(',', $id_str);
            foreach ($id_arr as $key => $val) {
                $result = D("Category")->delCategory($val);
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
                $message = "全部删除失败！可能这些文章分类下含有子分类或文章，请先删除子分类或文章，顶级分类也不能删除！";
            }else{
                $message = "ID为".trim($success_str,',')."的文章分类删除成功！ID为".trim($failed_str,',')."的文章分类删除失败，可能文章分类下含有子分类或文章，请先删除子分类或文章，顶级分类也不能删除！";
            }
            $this->success($message,U('Category/category_list'),5);
        }
    }

}

?>