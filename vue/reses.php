<?php
//Composer 依赖
require '../vendor/autoload.php';
use QL\QueryList;

    $ql = QueryList::get('https://www.gceguide.xyz/cambridge-cd-resources');
	$titles = $ql->find('.entry-content>p>a')->attrs('href'); //获取搜索结果标题列表
	$links = $ql->find('img')->attrs('src'); //获取搜索结果链接列表
?>


<?php
    	echo json_encode($titles); ?>