<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Snapaper | All Subjects</title>
        <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=no,
    width=device-width,initial-scale=1.0" />
        <link href="https://static.zeo.im/uikit.min.css" rel="stylesheet">
        <link href="https://static.zeo.im/uikit-rtl.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://static.zeo.im/uikit.min.js"></script>
        <link href="style.css" rel="stylesheet">
        <link rel="Shortcut Icon" href="https://static.ouorz.com/snapaper_temp_logo.ico" type="image/x-icon">
    </head>
    <body>
    <div class="uk-container" style="margin-top: 10%;">
    <div style="display: flex;">
        <div style="width: 90%;">
            <h1 class="index-title">Snapaper<em><?php echo $_GET['cate']; ?></em></h1>
            <p class="index-title-p">Built for International Students</p>
        </div>
        <div style="padding-top: 60px;">
            <a onclick="history.go(-1);"><svg width="40" height="40" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="uk-icon uk-svg" style="margin-right: 15px;color: #333;margin-top: -1px;"><line fill="none" stroke="#000" x1="5.5" y1="9.5" x2="15" y2="9.5"></line><line fill="none" stroke="#000" x1="5" y1="1.5" x2="9" y2="1.5"></line><polyline fill="none" stroke="#000" stroke-width="1.03" points="8.5,6.5 5.5,9.5 8.5,12.5"></polyline><polyline fill="none" stroke="#000" points="12.5,7 12.5,2.5 9.5,2.5 9.5,3.5 4.5,3.5 4.5,2.5 1.5,2.5 1.5,15.5 12.5,15.5 12.5,12"></polyline></svg></a>
            <a href="about.html"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <circle cx="10" cy="14" r="1"></circle> <circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle> <path d="M10.97,7.72 C10.85,9.54 10.56,11.29 10.56,11.29 C10.51,11.87 10.27,12 9.99,12 C9.69,12 9.49,11.87 9.43,11.29 C9.43,11.29 9.16,9.54 9.03,7.72 C8.96,6.54 9.03,6 9.03,6 C9.03,5.45 9.46,5.02 9.99,5 C10.53,5.01 10.97,5.44 10.97,6 C10.97,6 11.04,6.54 10.97,7.72 L10.97,7.72 Z"></path></svg></a>
        </div>
    </div>
    <div class="sublist">
<?php
//Composer 依赖
require 'vendor/autoload.php';
use QL\QueryList;

//判断用户名是否输入
if( !empty($_GET['cate']) ) {
    
    $cate = $_GET['cate'];
    $url = 'https://papers.gceguide.com/'.$cate;//生成查询页面
    $html = file_get_contents($url);
    $data = QueryList::html($html)->rules([
    'name' => ['.dir>td>a','text']
    ])->query()->getData();
    $user_data = $data->all(); //获取查询数据
?>

<?php 
    if(!empty($user_data)){ //开始读取数据 
    for($i=0;$i<count($user_data);$i++){ //循环获取数据
?>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3"><?php echo $user_data[$i]['name']; ?></h3>
            <a href="/paper.php?cate=<?php echo $cate ?>&sub=<?php echo $user_data[$i]['name']; ?>"><p style="margin-top: 15px;">Browse All Papers<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
        </div>
<?php }} ?>

<?php } ?>

    </div>
</div>
    </body>
</html>