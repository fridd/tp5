<div class="header">
    <div class="container">
        <div class="header_top">
            <div class="logo">
                <a href="{:U('Index/index')}">
                    <img src="__PUBLIC__{$company.logo}" alt="{$company.company_name}">
                </a>
            </div>
            <div class="cssmenu">
                <ul>
                    <li><a>联系电话： {$company.telephone}</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- start h_menu4 -->
        <div class="h_menu4">
            <a class="toggleMenu" href="{:U('Index/index')}" style="display: none;">导航菜单</a>
            <ul class="nav">
                <li <if condition="$action eq 'index'">class="active"</if>><a title="返回首页" href="{:U('Index/index')}">首页</a></li>
                <volist name="commonCategories" id="v">
                <li <notempty name="category"><if condition="$category['id'] eq $v['id']">class="active"</if></notempty><notempty name="this_article"><if condition="$this_article['category'] eq $v['cat_name']">class="active"</if></notempty>><a href="{:U('Article/article_list',array('id'=>$v['id']))}" title="{$v.cat_name}" target="">{$v.cat_name}</a></li>
                </volist>
                <li <if condition="$action eq 'recruit'">class="active"</if>><a href="{:U('Recruit/recruit_list')}" title="公司招聘" target="">公司招聘</a></li>
                <li <if condition="$action eq 'contact'">class="active"</if>><a href="{:U('Contact/index')}" title="联系我们" target="">联系我们</a></li>
            </ul>
            <script type="text/javascript" src="__PUBLIC__/js/home/nav.js"></script>
        </div>
        <!-- end h_menu4 -->
    </div>
</div>