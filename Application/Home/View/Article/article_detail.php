<!DOCTYPE html>
<html>
<head>

    <include file="Index/head" />

</head>
<body>

<include file="Index/header" />

<div class="about">
    <div class="container">
        <h1>{$this_article.category}</h1>
    </div>
</div>

<div class="about_grid">
    <div class="container">
        <volist name="categories" id="v">
        <h4 class="tz-title-4 tzcolor-blue col-md-2">
            <p class="tzweight_Bold <if condition='$this_article[cat_id] eq $v[id]'>selected</if>"><a href="{$v.url}">{$v.cat_name}</a></p>
        </h4>
        </volist>
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
                <img src="__PUBLIC__/images/home/article.jpg" class="img-responsive" alt="">
                <h3><a href="#">{$this_article.title}</a></h3>
                <h4> Date : {$this_article.public_date} | 浏览 : {$this_article.hits}</h4>
                <div class="context">
                    {$this_article.content}
                </div>
            </div>
        </div>
    </div>
</div>

<include file="Index/footer" />

</body>
</html>