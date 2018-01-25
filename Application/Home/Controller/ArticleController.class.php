<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {

    public function __construct(){
        parent::__construct();
    }

    public function article_list(){

        if($_REQUEST['pt']){
            $id = I('get.pt',0,'intval');
        }else{
            $id = I('get.id',0,'intval');
        }
        $categories = D("Article")->getChildrenCategories($id);
        $this->assign("categories",$categories);

        $category = D("Article")->getFirstCategory($id);
        $this->assign("category",$category);

        if($_REQUEST['pt']){
            $where['cat_id'] = I('get.id',0,'intval');
        }else{
            $where['cat_id'] = $categories[0]['id'];
        }
        $this->assign("select",$where['cat_id']);
        $result = D("Article")->getArticles(10,$where);
        $this->assign("list",$result[0]);
        $this->assign("page",$result[1]);

        $this->display();
		
	}

    public function article_detail(){

        $id = I("get.id",0,"intval");
        $where['id'] = $id;

        $this_article = D("Article")->getArticle($where);
        $this->assign("this_article",$this_article);

        $categories = D("Article")->getParents($this_article['cat_id']);
        $this->assign("categories",$categories);

        $ip = get_client_ip();

        //判断是否重复访问
        if($record = D("Article")->getRecord($id,$ip)){
            if((time()-$record['time'])>3600){
                $this->recordHit($id,$ip);
            }
        }else{
            $this->recordHit($id,$ip);
        }

        $this->display();
    }

    //记录访问量
    public function recordHit($id,$ip){
        $data = array(); 
        $data['obj_id'] = $id;
        $data['type'] = 1;
        $data['ip'] = $ip;
        $data['time'] = time();
        D("Article")->recordHit($data);
    }

}