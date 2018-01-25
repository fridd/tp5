<!DOCTYPE html>
<html>
<head>
    <include file="Index/head" />
</head>

<body>

<include file="Index/header" />

<div class="banner">
    <div class="container Width">
        <div id="focus">
            <!--banner切换图片-->
            <div id="Banner_div_banner">
                <ul>
                    <volist name="banners" id="v">
                    <li>
                        <a href="#">
                            <img src="__PUBLIC__{$v.img_url}" alt="{$v.banner_name}">
                        </a>
                    </li>
                    </volist>
                </ul>
            </div>
            <div class="btnBg"></div>
            <div class="btn">
                <volist name="banners" id="v" key="k">
                <span <if condition="$k eq 1">class="ON"</if>></span>
                </volist>
            </div>
            <div class="preNext pre"></div>
            <div class="preNext next"></div>
        </div>
        <style type="text/css">
            .banner{background: none;}

            @media (min-width: 1280px){
                .banner{min-height: 400px;}
                #Banner_div_banner{height:400px;}
                #Banner_div_banner ul li img{width:100%;height:400px;}
            }
            @media screen and (max-width: 1279px){
                .banner{min-height: 380px;}
                #Banner_div_banner{height:380px;}
                #Banner_div_banner ul li img{width:100%;height:380px;}
            }
            @media screen and (max-width: 1024px){
                .banner{min-height: 305px;}
                #Banner_div_banner{height:305px;}
                #Banner_div_banner ul li img{width:100%;height:305px;}
            }
            @media screen and (max-width: 920px){
                .banner{min-height: 275px;}
                #Banner_div_banner{height:275px;}
                #Banner_div_banner ul li img{width:100%;height:275px;}
            }
            @media screen and (max-width: 768px){
                .banner{min-height: 230px;}
                #Banner_div_banner{height:230px;}
                #Banner_div_banner ul li img{width:100%;height:230px;}
            }
            @media screen and (max-width: 667px){
                .banner{min-height: 150px;}
                #Banner_div_banner{height:150px;}
                #Banner_div_banner ul li img{width:100%;height:150px;}
            }
            @media screen and (max-width: 480px){
                .banner{min-height: 145px;}
                #Banner_div_banner{height:145px;}
                #Banner_div_banner ul li img{width:100%;height:145px;}
            }
            @media screen and (max-width: 320px){
                .banner{min-height: 95px;}
                #Banner_div_banner{height:95px;}
                #Banner_div_banner ul li img{width:100%;height:95px;}
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
                <img src="__PUBLIC__/images/home/index-1.png" class="img-responsive" alt="CRM提升企业效率">
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
                <img src="__PUBLIC__/images/home/index-2.png" class="img-responsive" alt="CRM提升企业业绩">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="about_grid1">
    <div class="container">
        <div class="box3">
            <div class="col-md-6">
                <img src="__PUBLIC__/images/home/index-3.png" class="img-responsive" alt="CRM降低企业成本">
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
                <img src="__PUBLIC__/images/home/index-4.png" class="img-responsive" alt="CRM提升企业服务质量">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="about_grid1">
    <div class="container">
        <div class="box3">
            <div class="col-md-6">
                <img src="__PUBLIC__/images/home/index-5.png" class="img-responsive" alt="CRM强化企业执行能力">
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
                <img src="__PUBLIC__/images/home/index-6.png" class="img-responsive" alt="CRM完善企业管理体系">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="features">
    <div class="container">
        
        <volist name="articles" id="v">
        <div class="col-md-4">
            <div class="clearfix"></div>
            <h4 class="tz-title-4  tzcolor-blue">
                <p class="tzweight_Bold m_2 A">
                    <a href="{:U('Article/article_list',array('id'=>$v['id']))}" style="text-decoration:none">{$v.cat_name}
                        <span class="m_2">...查看更多&gt;&gt;</span>
                    </a>
                </p>
            </h4>

            <div class="section_1">
                <div class="col_1_of_3 span_1_of_3">
                    <div class="list_1">
                        <ul>
                            <volist name="v.article" id="article">
                            <li><a href="{:U('Article/article_detail',array('id'=>$article['id']))}">{$article.title}</a></li>
                            </volist>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        </volist>

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

<include file="Index/footer" />

</body>
</html>