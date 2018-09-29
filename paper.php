<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Snapaper | <?php echo $_GET['sub']; ?></title>
        <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=no,
    width=device-width,initial-scale=1.0" />
        <link href="https://static.zeo.im/uikit.min.css" rel="stylesheet">
        <link href="https://static.zeo.im/uikit-rtl.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://static.zeo.im/uikit.min.js"></script>
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
        <link href="style.css" rel="stylesheet">
        <link rel="Shortcut Icon" href="https://static.ouorz.com/snapaper_temp_logo.ico" type="image/x-icon">
        
        <script>
    
    function download_list(){ //列表下载
        var urls = $('#download_items').val(); //获取列表数据
        if(urls == ''){ //为空则提示
            alert('Can not download empty list');
        }else{
        $('#dl')[0].innerHTML = '<button class="uk-button uk-button-danger" style="border-radius: 5px;margin-left: 0.5%;">Processing...</button><button class="uk-button uk-button-default" style="border-radius: 5px;margin-left: 0.5%;" onclick="location.reload();">Refresh</button>'; //修改按钮
        $('#notice')[0].style.display = 'unset'; //显示提示
        var url = urls.split(','); //半角逗号分隔字符串为数组
        var idname = ''; //初始化idname
        var num = 0; //初始化指针值
        
        var click = function(){
            if(num == (url.length)){ //指针到达列表总数
                window.clearInterval(interval); //清除interval
            }else{
                idname = '#' + url[num]; //补全idname
                downloadFile($(idname).attr('href'));
                num += 1; //累加指针
            }
        }
        
        window.interval = setInterval(click,3000); //设置interval
    }
}
    
    function remove_items(id){ //删除列表指定id 值
        var current = $('#download_items').val(); //获取当前列表值
        var current = current.split(','); //分隔列表字符串为数组
        current.splice($.inArray(id,current),1); //获取删除值位置并删除
        var now = current.join(","); //数组转换回字符串
        $('#download_items').val(now); //存入列表值
        var change = '#btn'+id; //补全提示已修改的按钮id
        $(change).attr('onclick', 'add_items('+ id +')'); //修改按钮onclick
        $(change)[0].innerHTML = 'Add to List'; //修改按钮文本
        $(change)[0].className = 'papers-list-td-btn1'; //修改按钮css
        console.log($('#download_items').val()); //方便debug
}
    
    function add_items(id){ //增加列表值
        var current = $('#download_items').val(); //获取当前列表值
        if(current == ''){ //若当前列表值为空
            var now = id;
            var change = '#btn'+id;
            $('#download_items').val(now); //直接赋值给列表，不增加连接符
            $(change).attr('onclick', 'remove_items('+ id +')');
            $(change)[0].innerHTML = 'Remove from List';
            $(change)[0].className = 'papers-list-td-btn1-change';
        }else{
            var now = current + ',' + id //否则增加连接符
            var change = '#btn'+id;
            $('#download_items').val(now);
            $(change).attr('onclick', 'remove_items('+ id +')');
            $(change)[0].innerHTML = 'Remove from List';
            $(change)[0].className = 'papers-list-td-btn1-change';
        }
        console.log($('#download_items').val());
}


function down(id){
    var id = '#'+id;
    $(id)[0].click();
}

</script>

    </head>
    <body>
    <div class="uk-container" style="margin-top: 10%;">
    <div style="display: flex;">
        <div style="width: 90%;">
            <h1 class="index-title">Snapaper<em><?php echo $_GET['cate']; ?> | <?php echo $_GET['sub']; ?></em></h1>
            <p class="index-title-p">Built for International Students</p>
        </div>
        <div style="padding-top: 60px;">
            <a onclick="history.go(-1);"><svg width="40" height="40" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="uk-icon uk-svg" style="margin-right: 15px;color: #333;margin-top: -1px;"><line fill="none" stroke="#000" x1="5.5" y1="9.5" x2="15" y2="9.5"></line><line fill="none" stroke="#000" x1="5" y1="1.5" x2="9" y2="1.5"></line><polyline fill="none" stroke="#000" stroke-width="1.03" points="8.5,6.5 5.5,9.5 8.5,12.5"></polyline><polyline fill="none" stroke="#000" points="12.5,7 12.5,2.5 9.5,2.5 9.5,3.5 4.5,3.5 4.5,2.5 1.5,2.5 1.5,15.5 12.5,15.5 12.5,12"></polyline></svg></a>
            <a href="about.html"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <circle cx="10" cy="14" r="1"></circle> <circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle> <path d="M10.97,7.72 C10.85,9.54 10.56,11.29 10.56,11.29 C10.51,11.87 10.27,12 9.99,12 C9.69,12 9.49,11.87 9.43,11.29 C9.43,11.29 9.16,9.54 9.03,7.72 C8.96,6.54 9.03,6 9.03,6 C9.03,5.45 9.46,5.02 9.99,5 C10.53,5.01 10.97,5.44 10.97,6 C10.97,6 11.04,6.54 10.97,7.72 L10.97,7.72 Z"></path></svg></a>
        </div>
    </div>
    <div style="margin-top:2%">
<?php
//Composer 依赖
require 'vendor/autoload.php';
use QL\QueryList;

//判断参数是否输入
if( !empty($_GET['cate']) && !empty($_GET['sub']) ) {
    
    $cate = $_GET['cate'];
    $sub = $_GET['sub'];
    
    if($cate == 'A Levels' && $sub == 'Business Studies (9707)'){
        $url = 'https://papers.gceguide.com/A%20Levels/Business%20Studies%20%20(9707)';//生成商业查询页面(下方格式爬取失败)
    }elseif($cate == 'A Levels' && $sub == 'English - Language AS and A Level (9093)'){
        $url = 'https://papers.gceguide.com/A%20Levels/English%20-%20Language%20AS%20and%20A%20Level%20%20(9093)/';//生成商业查询页面(下方格式爬取失败)
    }else{
        $url = 'https://papers.gceguide.com/'.$cate.'/'.$sub;//生成查询页面
    }
    
    $html = file_get_contents($url);
    $data = QueryList::html($html)->rules([
    'name' => ['.file>td>a','text'],
    'url' => ['.file>td>a','href']
    ])->query()->getData();
    $user_data = $data->all(); //获取查询数据
?>

<div style="margin-bottom:10px" id="dl">
    <a onclick="download_all();">
        <button class="uk-button uk-button-primary" style="border-radius: 5px;">Download All</button>
    </a>
    <a onclick="download_list();">
        <button class="uk-button uk-button-danger" style="border-radius: 5px;margin-left: 0.5%;">Download List    </button>
    </a>
</div>
<div id="notice" style="display: none">1. Do not leave this page, the download of these files will start automatically after <b>3 seconds</b>.<br/>2. You need to <b>manually refresh</b> this page before performing the next download.<br/>3. You need to set the file download path <b>in advance</b>, you will not have the opportunity to choose the download path during the download process.</div>

<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th style="text-align:left">Paper Name</th>
            <th style="text-align:left">Options</th>
        </tr>
    </thead>
    <tbody>
<script>

function downloadFile(srcUrl) {
    var $a = $("<a/>").attr("href", srcUrl).attr("download", "");
    $a[0].click();
}

    function download_all(){ //全部下载
        $('#dl')[0].innerHTML = '<button class="uk-button uk-button-primary" style="border-radius: 5px;margin-left: 0.5%;">Processing...</button><button class="uk-button uk-button-default" style="border-radius: 5px;margin-left: 0.5%;" onclick="location.reload();">Refresh</button>'; //修改按钮
        $('#notice')[0].style.display = 'unset'; //显示提示
        var idname = ''; //初始化idname
        var num = 0; //初始化指针值
        var count = <?php echo count($user_data);?> //获取试卷总数
        
        var click = function(){
            if(num == count){ //指针到达总数
                window.clearInterval(interval); //清除interval
            }else{
                idname = '#' + num; //补全idname
                downloadFile($(idname).attr('href'));
                num += 1; //累加指针
            }
        }
        
        window.interval = setInterval(click,3000); //设置interval
    }
</script>
<?php 
    if(!empty($user_data)){ //开始读取数据
    for($i=0;$i<count($user_data);$i++){ //循环获取数据
?>

        <?php if($user_data[$i]['name'] != 'error_log'){ ?>
        <tr>
            <td class="papers-list-td-left"><a href="<?php echo '/download.php?filename='.$url.'/'.$user_data[$i]['url']; ?>" id="<?php echo $i; ?>"><p><?php echo $user_data[$i]['name']; ?></p></a></td>
            <td class="papers-list-td-right">
                <p>
                    <button class="papers-list-td-btn1" onclick="add_items(<?php echo $i; ?>)" id="btn<?php echo $i; ?>">Add to List</button>
                    <a href="<?php echo $url.'/'.$user_data[$i]['url']; ?>" target="_blank"><button class="papers-list-td-btn3">LiveView</button></a>
                    <button class="papers-list-td-btn2" onclick="down(<?php echo $i; ?>)">Download</button>
                </p>
            </td>
        </tr>
    

    
<?php }}} ?>
</tbody>
</table>

<input type="hidden" id="download_items">

<?php } ?>

    </div>
</div>
    </body>
</html>