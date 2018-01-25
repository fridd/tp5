<?php
namespace Admin\Controller;

class ArticleController extends CommonController{

	public function __construct(){
		parent::__construct();
	}

	public function article_list(){
		if($_GET['num']){
            $num = I("get.num",0,"intval");
        }else{
            $num=10;
        }
		$articles = D("Article")->getArticles($num,array());
		$this->assign("list",$articles[0]);
        $this->assign("page",$articles[1]);
		$this->display();
	}
	
	public function article_add(){
		if($_POST){
			$_POST['public_date']=strtotime($_POST['public_date']);
			D("Article")->addArticle($_POST);
			$this->assign("jumpUrl",U('Article/article_list'));
			$this->success('添加成功！');
		}else{
			$categoris= D("Article")->getCategories();
            $this->assign("categoris",$categoris);
			$this->display();
		}
	}

	public function article_edit(){
		if($_POST){
			$_POST['public_date']=strtotime($_POST['public_date']);
			D("Article")->editArticle($_POST);
			$this->assign("jumpUrl",U('Article/article_list'));
			$this->success('修改成功！');
		}else{
			$categoris = D("Article")->getCategories();
            $this->assign("categoris",$categoris);
			$where['id'] = I("get.id",0,"intval");
			$this_article = D("Article")->getArticle($where);
			$this_article['public_date']=date('Y-m-d',$this_article['public_date']);
			$this->assign('this_article',$this_article);
			$this->display();
		}
	}

	public function article_search(){
		if($_GET['num']){
            $num = I("get.num",0,"intval");
        }else{
            $num=10;
        }
		$where['title']=array('like','%'.$_POST['title'].'%');
		$articles = D("Article")->getArticles($num,$where);
		$this->assign("list",$articles[0]);
        $this->assign("page",$articles[1]);
        $this->assign("total_num",count($articles[0]));
		$this->display();
	}

	public function article_del(){
		$result = array();
        $id = I('get.id',0,'intval');
        $result = D("Article")->delArticle($id);
        print_r(json_encode($result));
	}

	//批量删除
	public function batch_del(){
		if($_GET['id']){
			$id_str = I('get.id');
            $id_str = trim($id_str,',');
            $id_arr = explode(',', $id_str);
            foreach ($id_arr as $key => $val) {
                $result = D("Article")->delArticle($val);
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
                $message = "ID为".trim($success_str,',')."的文章删除成功！ID为".trim($failed_str,',')."的文章删除失败！";
            }
            $this->success($message,U('Article/article_list'),5);
        }
	}

}
?>