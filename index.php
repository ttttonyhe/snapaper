<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Snapaper | Past Papers</title>
        <meta name="keywords" content="IGCSE,ALevel,OLevel,pastpapers,snapaper,snap">
        <meta name="description" content="Built for International Students">
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
        <div style="width: 94%;">
            <h1 class="index-title">Snapaper</h1>
            <p class="index-title-p">Built for International Students</p>
        </div>
        <div style="padding-top: 60px;"><a href="about.html"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <circle cx="10" cy="14" r="1"></circle> <circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle> <path d="M10.97,7.72 C10.85,9.54 10.56,11.29 10.56,11.29 C10.51,11.87 10.27,12 9.99,12 C9.69,12 9.49,11.87 9.43,11.29 C9.43,11.29 9.16,9.54 9.03,7.72 C8.96,6.54 9.03,6 9.03,6 C9.03,5.45 9.46,5.02 9.99,5 C10.53,5.01 10.97,5.44 10.97,6 C10.97,6 11.04,6.54 10.97,7.72 L10.97,7.72 Z"></path></svg></a>
        </div>
    </div>
    <div>
        <?php 
        //暂时不使用采集动态获取内容，板块目前一直都是固定的
        /*
        //Composer 依赖
        require 'vendor/autoload.php';
        use QL\QueryList;
        
        $url = 'https://www.gceguide.com/past-papers';//生成查询页面
        $html = file_get_contents($url);
        
        $data = QueryList::html($html)->rules([
        'name' => ['h3','text']
        ])->range('.panel-no-style>.panel-grid-cell')->query()->getData();
        $user_data = $data->all(); //获取查询数据
    
        //判断数据查询结果是否为空
        if(!empty($user_data)){
        ?>
        <?php for($i=1;$i<=count($user_data) - 2;$i++){ //循环输出 ?>
        
        <?php if(substr($user_data[$i]['name'],-5) == 'IGCSE'){ //判断是否为 IGCSE ?>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3"><?php echo $user_data[$i]['name']; ?></h3>
            <a href="/cate.php?cate=IGCSE"><p style="margin-top: 15px;">Browse All Subjects<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
        </div>
        <?php }else{ //否则截取后七位字符并加上's' ?>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3"><?php echo $user_data[$i]['name']; ?></h3>
            <a href="/cate.php?cate=<?php echo substr($user_data[$i]['name'],-7).'s'; ?>"><p style="margin-top: 15px;">Browse All Subjects<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
        </div>
        <?php } ?>
        
        <?php }} */ ?>
          
                <div class="uk-card uk-card-default uk-card-hover uk-card-body index-card">
            <h3 class="uk-card-title index-cate-h3">Cambridge IGCSE</h3>
            <a href="/cate.php?cate=IGCSE"><p style="margin-top: 15px;">Browse All Subjects<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
        </div>
                
                
                <div class="uk-card uk-card-default uk-card-hover uk-card-body index-card">
            <h3 class="uk-card-title index-cate-h3">Cambridge O Level</h3>
            <a href="/cate.php?cate=O Levels"><p style="margin-top: 15px;">Browse All Subjects<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
        </div>
                
                
                <div class="uk-card uk-card-default uk-card-hover uk-card-body index-card" style="border-color: #ff85c0;">
            <h3 class="uk-card-title index-cate-h3">Cambridge Int'l AS &amp; A Level</h3>
            <a href="/cate.php?cate=A Levels"><p style="margin-top: 15px;">Browse All Subjects<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
        </div>
            
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body" style="border-top: 4px solid #52c41a;width: 97.8%;border-radius: 5px;margin-bottom: 5%;margin-top:2%;padding-bottom: 40px;">
            <div style="   float: left;">
                <h3 class="uk-card-title index-cate-h3" style="font-size: 2.5rem;">Want to See More?</h3>
                <p style="margin: 0px;margin-left: 3px;">If you are interested in...</p>
            </div>
            <a href="https://www.zeo.im" style="float: right;padding-top: 15px;text-decoration:none;"><p style="margin-top: 15px;">Click Here<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
    </div>
    <p class="index-copy">Made with <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" > <path fill="none" stroke="#ee561d" stroke-width="1.03" d="M10,4 C10,4 8.1,2 5.74,2 C3.38,2 1,3.55 1,6.73 C1,8.84 2.67,10.44 2.67,10.44 L10,18 L17.33,10.44 C17.33,10.44 19,8.84 19,6.73 C19,3.55 16.62,2 14.26,2 C11.9,2 10,4 10,4 L10,4 Z"></path></svg> by <b><a href="https://www.ouorz.com" target="_blank" style="color:#7c7c7c">TonyHe</a></b> | Powered by <b><a href="https://www.gceguide.com" target="_blank" style="color:#7c7c7c">GCE Guide</a></b></p>
</div>
    </body>
</html>