<!DOCTYPE html>
<html>
<head>
    <include file="Index/head" />
</head>
<body>

<include file="Index/header" />

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
                <div style="clear: both"></div>
                <div class="box_list">

                    <volist name="list" id="v">
                    <div class="box">
                        <div class="context">
                            <h3><a href="{:U('Recruit/recruit_detail',array('id'=>$v['id']))}">{$v.position}</a></h3>
                            <h4>{$v.public_date} | 浏览 : {$v.hits}</h4>
                            <p>岗位描述：{$v.responsibility}</p>
                            <a class="faq_but1" href="{:U('Recruit/recruit_detail',array('id'=>$v['id']))}">了解更多</a>
                        </div>
                    </div>
                    </volist>

                </div>
            </div>

            <notempty name="page">{$page}</notempty>
            
        </div>
    </div>
</div>
</div>

<include file="Index/footer" />

</body>
</html>