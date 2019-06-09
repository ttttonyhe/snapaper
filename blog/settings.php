<?php 

class site_info{

    // 请勿修改以上内容
    // 开始配置信息

    //站点名
    public $name = 'Snapaper Blog';


    //站点描述
    public $des = 'Snapaper Official Blog';


    //站点头像
    public $avatar = 'https://static.ouorz.com/tonyhe.jpg';


    //站点头像背景
    public $banner = 'https://static.ouorz.com/5ccaea1daaf36.jpg';


    //首页排除分类选项(单个)
    //'cate 名称'
    public $index_exclude = '';


    //站点导航栏
    //'名称','链接'
    public $header = array(
        array(
            '首页','https://www.snapaper.com/blog'
        ),
        array(
            '关于','https://www.snapaper.com/about'
        )
    );


    //站点导航栏按钮
    //'按钮文字',array'内容'
    public $header_btn = array(
        'Buy me a coffee',
        array(
            '<i class="czs-alipay"></i> 13408697095',
            '<i class="czs-weixinzhifu"></i> Helipeng_tony'
        )
    );
}


//请勿修改以下内容
$site = new site_info();
