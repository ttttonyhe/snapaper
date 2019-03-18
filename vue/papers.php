<?php
//Composer 依赖
require '../vendor/autoload.php';
use QL\QueryList;

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

//判断参数是否输入
if( !empty($_GET['cate']) && !empty($_GET['sub']) ) {
    
    $cate = $_GET['cate'];
    $sub = $_GET['sub'];
    
    if($cate == 'A Levels' && $sub == 'Business Studies (9707)'){
        $url = $com0.'/A%20Levels/Business%20Studies%20%20(9707)';//生成商业查询页面(下方格式爬取失败)
    }elseif($cate == 'A Levels' && $sub == 'English - Language AS and A Level (9093)'){
        $url = $com0.'/A%20Levels/English%20-%20Language%20AS%20and%20A%20Level%20%20(9093)/';//生成商业查询页面(下方格式爬取失败)
    }else{
        $url = $source.'/'.$cate.'/'.$sub;//生成查询页面
    }
    $html = file_get_contents($url);
    $data = QueryList::html($html)->rules([
    'name' => ['tr>td>a','text'],
    'url' => ['tr>td>a','href']
    ])->query()->getData();
    $user_data = $data->all(); //获取查询数据
?>


<?php
    if(!empty($user_data)){ //开始读取数据
    	$user_data['count'] = count($user_data);
    	header('Access-Control-Allow-Origin: *');
    	echo json_encode($user_data);
}} ?>