<?php
//Composer 依赖
require '../vendor/autoload.php';
use QL\QueryList;

//判断用户名是否输入
if( !empty($_GET['cate']) ) {
	
/* 获取服务器源 */
$com0 = 'https://papers.gceguide.com';
$xyz1 = 'https://papers.gceguide.xyz';
if(!isset($_COOKIE['snapaper_server'])){
    $source = $com0;
}else{
	$source = $_COOKIE['snapaper_server'];
	if($source == 0){
    	$source = $com0;
	}elseif($source == 1){
		$source = $xyz1;
	}else{
		$source = $com0;
	}
}
/* 结束获取服务器源 */
    
    $cate = $_GET['cate'];
    $url = $source.'/'.$cate;//生成查询页面
    $html = file_get_contents($url);
    $data = QueryList::html($html)->rules([
    'name' => ['tr>td>a','text']
    ])->query()->getData();
    $user_data = $data->all(); //获取查询数据
    
    $user_data['count'] = count($user_data);
    echo json_encode($user_data);
    
}
?>