<?php require 'header.php' ?>

<?php
//Composer 依赖
require 'vendor/autoload.php';
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
?>


    <div class="uk-container" style="margin-top: 10%;">
    <div class="sub-title-div" style="margin-bottom:60px;display: flex;">
    <div style="
    width: 73%;
">
        <h1 class="sub-title-h1"><?php echo $_GET['cate'] ?></h1>
    	<p class="sub-title-p">Choose a subject and start exploring</p>
    </div>
    <div style="text-align: right;padding-top: 40px;display: flex;width:27%">
    <div>
    	<em class="back-btn" style="color: #999;"><?php echo count($user_data) - 1; ?> Subjects</em>
	</div>
	<div style="margin-left: 10px;">
		<a onclick="history.go(-1);">
			<em class="back-btn" style="color: #1e87f0;">← Back</em>
		</a>
	</div>
    </div>
    
    </div>
    <script>
        function support(cssName) {
            var htmlStyle = document.documentElement.style;
            if (cssName in htmlStyle)
                return true;
            return false;
        }
        
        if(!support('grid-template-columns')){ //判断浏览器是否支持 grid 属性
            $('#list')[0].className = 'sublist-1';
            $('#display_style')[0].innerHTML = '<style>.index-cate-card {width: 31.1%;margin-bottom: 2%;} .index-cate-card:nth-child(3n) {margin-left: 2%;}</style>';
        }
        
    </script>
    <div id="display_style"></div>
    <div class="sublist" id="list">

<?php 
    if(!empty($user_data)){ //开始读取数据 
    for($i=0;$i<count($user_data);$i++){ //循环获取数据
?>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3"><?php echo $user_data[$i]['name']; ?></h3>
            <a href="/paper?cate=<?php echo $cate ?>&sub=<?php echo $user_data[$i]['name']; ?>"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
        </div>
<?php }} ?>

<div class="uk-card uk-card-default uk-card-hover uk-card-body" style="width: 97%;margin-left: 2%;padding: 40px 30px;display: inline-block;border: 3px solid #999;border-radius: 5px;transition: all .3s;margin-bottom: 10%;">
    <h3 style="font-weight: 600;color: #555;font-size: 2.4rem;margin: 0px;letter-spacing: 1px;"><?php echo $cate; ?></h3>
	<p style="margin: 0px;letter-spacing: 2px;color: #999;">Past Papers</p>
	<p style="color: #888;margin-top: 25px;">All Contents &amp; Names of this website are assets of owner, protected by law and powered by GCE Guide</p>
</div>

<?php }else{ ?>
<div class="uk-placeholder uk-text-center" id="bottom">Service is temporarily unavailable</div>
<?php } ?>

    </div>
</div>
    </body>
</html>