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
                <img src="__PUBLIC__/images/home/recruit.png" class="img-responsive" alt="">
                <h3><a href="#">{$this_recruit.position}</a></h3>
                <h4> Date : {$this_recruit.public_date} | 浏览 : {$this_recruit.hits}</h4>
                <div class="context">
                    <notempty name="this_recruit['number']"><p>人数： {$this_recruit.number} 人</p></notempty>
                    <notempty name="this_recruit['responsibility']"><p>岗位描述：{$this_recruit.responsibility}</p></notempty>
                    <notempty name="this_recruit['requirement']"><p>资格要求：{$this_recruit.requirement}</p></notempty>
                    <notempty name="this_recruit['treatment']"><p>待遇水平：{$this_recruit.treatment}</p></notempty>
                    <notempty name="this_recruit['working_hours']"><p>工作时间：{$this_recruit.working_hours}</p></notempty>
                    <notempty name="this_recruit['address']"><p>工作地址：{$this_recruit.address}</p></notempty>
                </div>
                <style type="text/css">
                    .context p{font-size: 14px;padding: 10px 0;line-height: 25px;}
                </style>
            </div>
        </div>
    </div>
</div>

<include file="Index/footer" />

</body>
</html>