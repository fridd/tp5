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

<div class="banner">
    <div class="container Width">
        <div id="focus">
            <!--banner切换图片-->
            <div id="Banner_div_banner">
                <ul>
                    <?php if(is_array($banners)): $i = 0; $__LIST__ = $banners;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                        <a href="#">
                            <img src="/Public<?php echo ($v["img_url"]); ?>" alt="<?php echo ($v["banner_name"]); ?>">
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="btnBg"></div>
            <div class="btn">
                <?php if(is_array($banners)): $k = 0; $__LIST__ = $banners;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><span <?php if($k == 1): ?>class="ON"<?php endif; ?>></span><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="preNext pre"></div>
            <div class="preNext next"></div>
        </div>
        <style type="text/css">
            @media (min-width: 1200px){
                .banner{background: none;}
                #Banner_div_banner{height:400px;}
                #Banner_div_banner ul li img{width:100%;height:400px;}
            }

            @media (max-width: 768px){
                #Banner_div_banner{height:150px;}
                #Banner_div_banner ul li img{width:100%;height:150px;}
            }

            #focus {
                height: auto;
                overflow: hidden;
                position: relative;
            }

            #focus ul li {
                float: left;
            }

            #focus .btn {
                position: absolute;
                width: 100%;
                height: 10px;
                bottom: 40px;
                text-align: center;
            }

            .ON {
                background-color: blue !important;
            }

            #focus .btn span {
                display: inline-block;
                _display: inline;
                _zoom: 1;
                width: 15px;
                height: 15px;
                border-radius: 15px;
                _font-size: 0;
                margin-left: 5px;
                bottom: 0px;
                cursor: pointer;
                background: white;
            }
        </style>
        <script>
            $(document).ready(function () {
                var k = 0;
                var timer;
                var cHeight = document.body.clientWidth;

                $("#Banner_div_banner ul").css("width",(cHeight*$("#focus ul li").length)+"px");
                $("#Banner_div_banner ul li").css("width",cHeight+"px");


                function fun() {
                    var num = $("#focus ul li").length;
                    if (k > num-1) {
                        k = 0;
                    }
                    $(".btn span").eq(k).addClass("ON").siblings().removeClass("ON");
                    $("#focus ul").animate({"marginLeft": -cHeight * k + "px"});
                    k++;
                }

                timer = setInterval(fun, 3000);
                $(".btn span").mouseover(function () {
                    clearInterval(timer);
                    $(".btn span").eq($(this).index()).addClass("ON").siblings().removeClass("ON");
                    $("#focus ul").animate({"marginLeft": -cHeight * $(this).index() + "px"});
                    k = $(this).index();
                }).mouseout(function () {
                    timer = setInterval(fun, 3000);
                })
            })
        </script>
    </div>
</div>
<div class="domain1">
    <div class="container">
        <form class="search-form domain-search">
            <div class="full-fifth column first">
                <h2>产品和服务</h2>
            </div>
        </form>
    </div>
</div>
<div class="about_grid1">
    <div class="container">
        <div class="box3">
            <div class="col-md-6">
                <img src="/Public/images/home/index-1.png" class="img-responsive" alt="CRM提升企业效率">
            </div>
            <div class="col-md-6 row_2" style="padding: 0 0 0 0;">
                <h2 class="h_2">
                    统一信息门户
                </h2>
                <p class="m_8">
                    构建协同合作平台，实现公司、部门、员工、以及外部供应商之间的互动沟通与协作。公司一般行政人员（非IT专业人员）获权后即可轻松创建门户站点，
                    任意添加各种网页模块，实现布局、模板的修改，发布网站内容，部署配置各功能性子系统，建立企业内各种信息资源采集、展示平台，为企业员工、
                    供货商及合作伙伴建立协作、知识与经验共享的通道。
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="about_grid">
    <div class="container">
        <div class="box3">
            <div class="col-md-6 row_2" style="padding: 0 0 0 0;">
                <h2 class="h_2">
                    统一沟通平台
                </h2>
                <p class="m_8">
                    系统提供群创建与管理，提供群内协作与知识共享。为本地及远程用户提供即时消息、音频视频会议、多人会议等功能。
                    提供邮件中心，集成内外网电子邮件，日历日程计划的安排与共享， 工作计划的安排与任务分配及完成进展情况的掌控。
                </p>
            </div>
            <div class="col-md-6">
                <img src="/Public/images/home/index-2.png" class="img-responsive" alt="CRM提升企业业绩">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="about_grid1">
    <div class="container">
        <div class="box3">
            <div class="col-md-6">
                <img src="/Public/images/home/index-3.png" class="img-responsive" alt="CRM降低企业成本">
            </div>
            <div class="col-md-6 row_2" style="padding: 0 0 0 0;">
                <h2 class="h_2">
                    降低企业成本
                </h2>
                <p class="m_8">
                    RUSHCRM为企业提供了强大的自定义报表的功能，用户可以完全按照自己的需求调取客户、联系人、采购订单、报价单、销售单等重要模块的数据生成自己需要的报表，以此来进行深层次地数据挖掘，帮助企业发现问题，找到企业赢点，提升企业赢率，降低企业成本。
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="about_grid">
    <div class="container">
        <div class="box3">
            <div class="col-md-6 row_2" style="padding: 0 0 0 0;">
                <h2 class="h_2">
                    安全可靠的角色管理与权限控制
                </h2>
                <p class="m_8">
                    可以为各员工以及外部客户创建不同的角色，根据角色和安全级别的不同为其对平台资源的使用赋予不同的权限。可以定制出个性化的应用门户，
                    每个人都可以看到不同的信息或平台提供的为不同用户定制的信息。支持搜索结果安全过滤，用户在搜索结果中不会看到没有权限的文件。
                </p>
            </div>
            <div class="col-md-6">
                <img src="/Public/images/home/index-4.png" class="img-responsive" alt="CRM提升企业服务质量">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="about_grid1">
    <div class="container">
        <div class="box3">
            <div class="col-md-6">
                <img src="/Public/images/home/index-5.png" class="img-responsive" alt="CRM强化企业执行能力">
            </div>
            <div class="col-md-6 row_2" style="padding: 0 0 0 0;">
                <h2 class="h_2">
                    节省用户成本，降低IT成本和复杂性
                </h2>
                <p class="m_8">
                    作为一体化平台，管理整个企业内的 内网、 外网 和 Internet 应用程序。它构建于可伸缩的开放式体系结构之上，可以轻松集成第三方应用程序和后端系统。
                    可以二次定制开发新应用系统，用户做二次开发时，无须再做基础架构开发，借助协同平台架构技术，用户可以轻松开发新系统并无缝集成，极大的节省用户
                    IT部门二次开发的研发费用与时间。
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="about_grid">
    <div class="container">
        <div class="box3">
            <div class="col-md-6 row_2" style="padding: 0 0 0 0;">
                <h2 class="h_2">
                    强大的文档管理与协作
                </h2>
                <p class="m_8">
                    文档权限控制、信息权限管理、审批工作流等功能为您搭建合理的企业办公平台。实现文档的集中存储，可以轻松查找、
                    共享和使用其中的信息而不泄漏敏感信息。建立销售、技术、咨询等各类知识库，为各部门高效协同合作提供基础。
                </p>
            </div>
            <div class="col-md-6">
                <img src="/Public/images/home/index-6.png" class="img-responsive" alt="CRM完善企业管理体系">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="features">
    <div class="container">
        
        <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="col-md-4">
            <div class="clearfix"></div>
            <h4 class="tz-title-4  tzcolor-blue">
                <p class="tzweight_Bold m_2 A">
                    <a href="<?php echo U('Article/article_list',array('id'=>$v['id']));?>" style="text-decoration:none"><?php echo ($v["cat_name"]); ?>
                        <span class="m_2">...查看更多&gt;&gt;</span>
                    </a>
                </p>
            </h4>

            <div class="section_1">
                <div class="col_1_of_3 span_1_of_3">
                    <div class="list_1">
                        <ul>
                            <?php if(is_array($v["article"])): $i = 0; $__LIST__ = $v["article"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Article/article_detail',array('id'=>$article['id']));?>"><?php echo ($article["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>
</div>

<style>
    .tz-title-4 .A:after {
        position: absolute;
        width: 25px;
        height: 2px;
        margin-left: -10px;
        left: 1%;
        background: #ff8261;
        content: '';
        top: 20px;
    }
    @media all and (max-width: 570px) {
        .tz-title-4 .A:after {
            position: absolute;
            width: 25px;
            height: 2px;
            margin-left: -10px;
            left: 1%;
            background: #ff8261;
            content: '';
            top: 5px;
        }
    }
    .about_grid,.about_grid1{
        padding-bottom: 1em;
    }
    @media all and (max-width: 570px) {
        .about_grid,.about_grid1{
            padding-bottom: 1em;
        }
    }
</style>

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