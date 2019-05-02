<?php
//Composer 依赖
require '../../vendor/autoload.php';
use QL\QueryList;

//判断用户名是否输入
if( !empty($_GET['key']) ) {
    
    $url = 'https://www.xianboyang.com/sitemap/';//生成查询页面
    $html = file_get_contents($url);
    $data = QueryList::html($html)->rules([
    'title' => ['li>a','text'],
    'url' => ['li>a','href']
    ])->query()->getData();
    $user_data = $data->all(); //获取查询数据
    
    array_splice($user_data, 0, 32);
    array_splice($user_data, -77);
    $user_data['count'] = count($user_data);
    echo json_encode($user_data);
    
}
?>