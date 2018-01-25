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
<link href="/Public/css/home/bootstrap.css" rel="stylesheet" type="text/css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/Public/js/home/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="/Public/css/home/style.css" rel="stylesheet" type="text/css">
<!-- Custom Theme files -->
<!-- Add fancyBox main JS and CSS files -->
<script src="/Public/js/home/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="/Public/css/home/popup.css" rel="stylesheet" type="text/css">
<script src="/Public/js/home/pc_nb.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="/Public/css/home/main.css">

</head>
<body>

<div class="header">
    <div class="container">
        <div class="header_top">
            <div class="logo">
                <a href="<?php echo U('Index/index');?>">
                    <img src="/Public<?php echo ($company["logo"]); ?>" alt="<?php echo ($company["company_name"]); ?>">
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
            <script type="text/javascript" src="/Public/js/home/nav.js"></script>
        </div>
        <!-- end h_menu4 -->
    </div>
</div>

<div class="about">
    <div class="container">
        <h1>公司招聘</h1>
    </div>
</div>

<div class="about_grid">
    <div class="container">
        <h4 class="tz-title-4 tzcolor-blue col-md-2">
            <p class="tzweight_Bold selected"><a href="#">招聘</a></p>
        </h4>
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
                <img src="/Public/images/home/recruit.png" class="img-responsive" alt="">
                <h3><a href="#"><?php echo ($this_recruit["position"]); ?></a></h3>
                <h4> Date : <?php echo ($this_recruit["public_date"]); ?> | 浏览 : <?php echo ($this_recruit["hits"]); ?></h4>
                <div class="context">
                    <?php if(!empty($this_recruit['number'])): ?><p>人数： <?php echo ($this_recruit["number"]); ?> 人</p><?php endif; ?>
                    <?php if(!empty($this_recruit['responsibility'])): ?><p>岗位描述：<?php echo ($this_recruit["responsibility"]); ?></p><?php endif; ?>
                    <?php if(!empty($this_recruit['requirement'])): ?><p>资格要求：<?php echo ($this_recruit["requirement"]); ?></p><?php endif; ?>
                    <?php if(!empty($this_recruit['treatment'])): ?><p>待遇水平：<?php echo ($this_recruit["treatment"]); ?></p><?php endif; ?>
                    <?php if(!empty($this_recruit['working_hours'])): ?><p>工作时间：<?php echo ($this_recruit["working_hours"]); ?></p><?php endif; ?>
                    <?php if(!empty($this_recruit['address'])): ?><p>工作地址：<?php echo ($this_recruit["address"]); ?></p><?php endif; ?>
                </div>
                <style type="text/css">
                    .context p{font-size: 14px;padding: 10px 0;line-height: 25px;}
                </style>
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