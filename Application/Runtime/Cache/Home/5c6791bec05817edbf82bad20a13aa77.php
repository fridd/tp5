<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Generator" content="CmsEasy 5_5_0_20130716_UTF8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo ($company["company_name"]); ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="RushCrm">
<link href="/hanteng/Public/css/home/bootstrap.css" rel="stylesheet" type="text/css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/hanteng/Public/js/home/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="/hanteng/Public/css/home/style.css" rel="stylesheet" type="text/css">
<!-- Custom Theme files -->
<!-- Add fancyBox main JS and CSS files -->
<script src="/hanteng/Public/js/home/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="/hanteng/Public/css/home/popup.css" rel="stylesheet" type="text/css">
<script src="/hanteng/Public/js/home/pc_nb.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="/hanteng/Public/css/home/main.css">
</head>
<body>

<div class="header">
    <div class="container">
        <div class="header_top">
            <div class="logo">
                <a href="<?php echo U('Index/index');?>">
                    <img src="/hanteng/Public<?php echo ($company["logo"]); ?>" alt="<?php echo ($company["company_name"]); ?>">
                </a>
            </div>
            <div class="cssmenu">
                <ul>
                    <li><a>联系电话： <?php echo ($company["telephone"]); ?></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- start h_menu4 -->
        <div class="h_menu4">
            <a class="toggleMenu" href="<?php echo U('Index/index');?>" style="display: none;">导航菜单</a>
            <ul class="nav">
                <li <?php if($action == 'index'): ?>class="active"<?php endif; ?>><a title="返回首页" href="<?php echo U('Index/index');?>">首页</a></li>
                <?php if(is_array($commonCategories)): $i = 0; $__LIST__ = $commonCategories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if(!empty($category)): if($category['id'] == $v['id']): ?>class="active"<?php endif; endif; if(!empty($this_article)): if($this_article['category'] == $v['cat_name']): ?>class="active"<?php endif; endif; ?>><a href="<?php echo U('Article/article_list',array('id'=>$v['id']));?>" title="<?php echo ($v["cat_name"]); ?>" target=""><?php echo ($v["cat_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <li <?php if($action == 'recruit'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Recruit/recruit_list');?>" title="公司招聘" target="">公司招聘</a></li>
                <li <?php if($action == 'contact'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Contact/index');?>" title="联系我们" target="">联系我们</a></li>
            </ul>
            <script type="text/javascript" src="/hanteng/Public/js/home/nav.js"></script>
        </div>
        <!-- end h_menu4 -->
    </div>
</div>

<div class="about">
    <div class="container">
        <h1><?php echo ($category["cat_name"]); ?></h1>
    </div>
</div>

<div class="about_grid">
    <div class="container">
        <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><h4 class="tz-title-4 tzcolor-blue col-md-2">
            <p class="tzweight_Bold <?php if($v[id] == $select): ?>selected<?php endif; ?>"><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["cat_name"]); ?></a></p>
        </h4><?php endforeach; endif; else: echo "" ;endif; ?>
        <style>
            .tz-title-4 .selected:after {
                position: absolute;
                width: 25px;
                height: 2px;
                margin-left: -10px;
                left: 1%;
                background: #ff8261;
                content: '';
                top: 10px;
            }
        </style>
        <div class="blog">
            <div class="blog_top">
                <div style="clear: both"></div>
                <div class="box_list">
                    
                    <?php if(empty($list)): ?><div class="box">
                            <div class="context">
                                网站建设中...
                            </div>
                        </div><?php endif; ?>

                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="box">
                        <div class="context">
                            <h3><a href="<?php echo U('Article/article_detail',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></h3>
                            <h4><?php echo ($v["public_date"]); ?> | 浏览 : <?php echo ($v["hits"]); ?></h4>
                            <p><?php echo ($v["content"]); ?></p>
                            <a class="faq_but1" href="<?php echo U('Article/article_detail',array('id'=>$v['id']));?>">了解更多</a>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>

            <?php if(!empty($page)): echo ($page); endif; ?>
            
        </div>
    </div>
</div>
</div>

<div class="footer">
    <div class="container col">
        <p>版权所有 <?php echo ($company["company_name"]); ?> ICP备14014049号 Copyright © 2011-2015 All Rights Reserved</p>
        <p>地址：<?php echo ($company["address"]); ?>  邮箱：<?php echo ($company["email"]); ?>   电话：<?php echo ($company["telephone"]); ?></p>
    </div>
</div>
<style>
    .col{
        text-align: center;
        color: #ccc;
    }
    .col p{
        margin:5px 0px;
    }
</style>

</body>
</html>