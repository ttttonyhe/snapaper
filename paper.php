<?php
//Composer 依赖
require 'vendor/autoload.php';
use QL\QueryList;

/* 获取服务器源 */
$com0 = 'https://papers.gceguide.com';
$xyz1 = 'https://papers.gceguide.xyz';
$xtr4 = 'https://xtremepapers.xyz';
if(!isset($_COOKIE['snapaper_server'])){
    $source = $com0;
}else{
	$source = $_COOKIE['snapaper_server'];
	if($source == 0){
    	$source = $com0;
	}elseif($source == 1){
		$source = $xyz1;
	}elseif($source == 4){
		$source = $xtr4;
	}else{
		$source = $com0;
	}
}
/* 结束获取服务器源 */


//获取学科代号(确定试卷代码)
function get_sub_num($str){
    $result = array();
    preg_match_all("/([^(]+)$/",$str, $result); //匹配最后一个前括号，获取之后的内容
    return rtrim($result[1][0], ")"); //删除最后一个后括号
}

/* Xtremepapers
 * 下载时需使用urlencode
 * 浏览时需使用原链接
 * 读取数据时需使用特殊格式的url(使用字符串替换)
 * 真是个磨人的小妖精
 */

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
    
    
    if($source == $xtr4){ //xtremepapers生成查询数据
        	$find = array(' ','&');
        	$replace = array('%2520','%2526');
        	$cate = str_replace($find,$replace,$cate);
        	$find = array(' ','(',')');
            $replace = array('%2520','%2528','%2529');
            $sub = str_replace($find,$replace,$sub);
        $url = 'https://xtremepapers.xyz/papers/'.$cate.'/'.$sub.'/';//生成查询页面
        $html = file_get_contents($url);
    	$data = QueryList::html($html)->rules([
    	'name' => ['.autoindex_td>a','text'],
    	'url' => ['.autoindex_td>a','href']
    	])->query()->getData();
    	$user_data = $data->all(); //获取查询数据
    }else{ //GCEGuide生成查询数据
    	$html = file_get_contents($url);
    	$data = QueryList::html($html)->rules([
    	'name' => ['tr>td>a','text'],
    	'url' => ['tr>td>a','href']
    	])->query()->getData();
    	$user_data = $data->all(); //获取查询数据
    }
?>


<?php require 'header.php'; ?>

        
    
    <div class="papers-list-sticky" style="display:unset;width: 100%;border-radius: 0px;height: 40px;margin-left: 0px;text-align: center;z-index: 9998;padding-top: 15px;border-top: 2px solid #f0506e;" id="update"><p>We recommend using <b>Chrome</b> or some of the latest modern browsers for the best experience. <a href="https://www.google.cn/chrome/index.html" target="_blank">Click here to download Chrome</a>&nbsp;<a onclick="dismiss();" style="color: #f0506e;border: 1px solid #f0506e;padding: 4px 7px;border-radius: 4px;margin-left: 20px;"><svg width="19" height="19" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="margin-top: -3.5px;margin-right: 2px;"> <path fill="none" stroke="#f0506e" stroke-width="2" d="M16,16 L4,4"></path> <path fill="none" stroke="#f0506e" stroke-width="2" d="M16,4 L4,16"></path></svg>Dismiss</a></p></div>
    
        
    <div class="papers-list-sticky" id="sticky">
        <div style="float: left;">
            <h3 style="margin-bottom: 0px;font-weight: 600;">Viewing</h3>
            <p style="margin: 0px;font-weight: 300;margin-top: -3px;"><?php echo urldecode($_GET['sub']); ?></p></div><div style="float: right;padding-top: 10px;">
                <a onclick="download_all();" style="display: inline-block;">
                    <button class="uk-button uk-button-primary" style="border-radius: 5px;padding: 0px 15px;line-height: 35px;background-color: #0084FF;">Download All</button>
                </a>
                <a onclick="download_list();" style="display: inline-block;width: 140px;">
                    <button class="uk-button uk-button-danger" style="border-radius: 5px;margin-left: 0.5%;padding: 0px 10px;line-height: 35px;background: transparent;color: #0084FF;border: 1px solid #0084FF;">Download List</button>
                </a>
        </div>
    </div>
    
    
    
    <div class="uk-container" style="margin-top: 6%;">
    <div class="sub-title-div" style="margin-bottom:60px;display: flex;" id="top">
    <div style="width: 73%;">
    	<?php if($source == $xtr4){ //xtremepapers时cate与sub格式不同,需要urldecode ?>
        <h1 class="sub-title-h1">
        	<b style="font-size: 2rem;font-weight: 300;color: #888;"><?php echo $_GET['cate']; ?></b>
        	<br/><?php echo urldecode($_GET['sub']); ?>
        </h1>
        <?php }else{ ?>
        <h1 class="sub-title-h1"><?php echo $_GET['cate']; ?> | <?php echo $_GET['sub']; ?></h1>
        <?php } ?>
    	<p class="sub-title-p">Made by Snapaper sourced from GCE Guide/Xtremepapers</p>
    </div>
    <div style="text-align: right;padding-top: 40px;display: flex;width:27%">
    <div>
    	<em class="back-btn" style="color: #999;"><?php echo count($user_data) - 1; ?> Papers</em>
	</div>
	<div style="margin-left: 10px;">
		<a onclick="history.go(-1);">
			<em class="back-btn" style="color: #1e87f0;">← Back</em>
		</a>
	</div>
    </div>
    
    </div>
    <div style="margin-top:2%">

<script src="ux.js"></script>

<div style="margin-bottom:10px" id="dl">
    <a onclick="download_all();">
        <button class="uk-button uk-button-primary" style="border-radius: 5px;">Download All</button>
    </a>
    <a onclick="download_list();">
        <button class="uk-button uk-button-danger" style="border-radius: 5px;margin-left: 0.5%;">Download List    </button>
    </a>
</div>



<div id="notice" style="display: none">1. Do not leave this page, the download of these files will start automatically after <b>3 seconds</b>.<br/>2. You need to <b>manually refresh</b> this page before performing the next download.<br/>3. You need to set the file download path <b>in advance</b>, you will not have the opportunity to choose the download path during the download process.</div>



<div class="papers-list-list-notice uk-animation-slide-bottom-small" id="count_list_notice">
    <p><b id="list_count">0</b> Paper(s) in List</p>
</div>



<table class="uk-table uk-table-hover uk-table-divider">
    <thead id="x">
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
        $('#count_list_notice')[0].style.display = 'none';
        toTop();
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
    
function live(url){
		window.open(url,'_blank',"top=0,left=100,width=700,height=750").location;
}
</script>


<?php
    if(!empty($user_data)){ //开始读取数据
    for($i=0;$i<count($user_data);$i++){ //循环获取数据
		if($user_data[$i]['name'] != 'error_log' && $user_data[$i]['name'] != '
Parent Directory'){ //排除一些特殊名称的试卷
			if($_COOKIE['snapaper_server'] == 4){ //xtremepapers时列表项不同 ?>
				
				
		<tr>
            <td class="papers-list-td-left">
            	<a href="download?filename=<?php echo 'https://xtremepapers.xyz'.urlencode($user_data[$i]['url']); ?>" id="<?php echo $i; ?>">
            		<p>
            			<?php if(strpos($user_data[$i]['name'],'pdf')!==false){ ?>
            				<em class="file-pdf-btn">PDF</em>
            			<?php }elseif(strpos($user_data[$i]['name'],'mp3')!==false){?>
            				<em class="file-mp3-btn">MP3</em>
            			<?php } ?>
            			<?php echo $user_data[$i]['name']; ?>
            		</p>
            	</a>
            </td>
			<td class="papers-list-td-right">
				<p>
					<button class="papers-list-td-btn1" onclick="add_items(<?php echo $i; ?>)" id="btn<?php echo $i; ?>">Add to List</button>
					<button class="papers-list-td-btn2" onclick="downloadFile('download?filename=<?php echo 'https://xtremepapers.xyz'.urlencode($user_data[$i]['url']); ?>')">Download</button>
					<a onclick="live('<?php echo 'https://xtremepapers.xyz'.$user_data[$i]['url']; ?>');"><button class="papers-list-td-btn3">LiveView</button></a>
                    <?php if(strpos($user_data[$i]['name'],'qp')!==false && strpos($user_data[$i]['name'],'2_2')==false){ //判断ms或qp?>
                    	<a onclick="live('<?php echo 'https://xtremepapers.xyz'.strtr($user_data[$i]['url'],array('qp'=>'ms')); ?>');"><button class="papers-list-td-btn2" style="color: #fbbd01;">Mark Scheme</button></a>
                    <?php }elseif(strpos($user_data[$i]['name'],'ms')!==false && strpos($user_data[$i]['name'],'+')==false && strpos($user_data[$i]['name'],'2_2')==false){ ?>
                    	<a onclick="live('<?php echo 'https://xtremepapers.xyz'.strtr($user_data[$i]['url'],array('qp'=>'ms')); ?>');"><button class="papers-list-td-btn2" style="color: #6d3cbd;letter-spacing: -1.4px;">Question Paper</button></a>
                    <?php }else{ ?>
                    	<button class="papers-list-td-btn2" style="color: #999;letter-spacing: 1.1px;">© Snapaper</button>
                    <?php } ?>
                </p>
            </td>
        </tr>
        
        
<?php		}else{ //GCEGuide 时
	
				if($_COOKIE['snapaper_server'] == 0 || !isset($_COOKIE['snapaper_server'])){
    				//GCEGuide服务器不同时的试卷链接格式不同
    				$link = '/'; //.com 时
    			}else{
    				$link = ''; //.xyz 时
    				$url = $source;
    			}
    			
?>
        <tr>
            <td class="papers-list-td-left"><a href="download?filename=<?php echo $url.$link.$user_data[$i]['url']; ?>" id="<?php echo $i; ?>"><p><?php echo $user_data[$i]['name']; ?></p></a></td>
            <td class="papers-list-td-right">
                <p>
                    <button class="papers-list-td-btn1" onclick="add_items(<?php echo $i; ?>)" id="btn<?php echo $i; ?>">Add to List</button>
                    <button class="papers-list-td-btn2" onclick="downloadFile('download?filename=<?php echo $url.$link.$user_data[$i]['url']; ?>')">Download</button>
                    <a onclick="live('<?php echo $url.$link.$user_data[$i]['url']; ?>');"><button class="papers-list-td-btn3">LiveView</button></a>
                    <?php if(strpos($user_data[$i]['name'],'qp')!==false && strpos($user_data[$i]['name'],'2_2')==false){ //判断ms或qp?>
                    	<a onclick="live('<?php echo $url.$link.strtr($user_data[$i]['url'],array('qp'=>'ms')); ?>');"><button class="papers-list-td-btn2" style="color: #fbbd01;">Mark Scheme</button></a>
                    <?php }elseif(strpos($user_data[$i]['name'],'ms')!==false && strpos($user_data[$i]['name'],'+')==false && strpos($user_data[$i]['name'],'2_2')==false){ ?>
                    	<a onclick="live('<?php echo $url.$link.strtr($user_data[$i]['url'],array('ms'=>'qp')); ?>');"><button class="papers-list-td-btn2" style="color: #6d3cbd;letter-spacing: -1.4px;">Question Paper</button></a>
                    <?php }else{ ?>
                    	<button class="papers-list-td-btn2" style="color: #777;letter-spacing: 1.1px;">© Snapaper</button>
                    <?php } ?>
                </p>
            </td>
        </tr>
    

    
<?php }}}?>

<?php } ?>
</tbody>
</table>

<div class="uk-placeholder uk-text-center" id="bottom">Paper resources are from GCE Guide/Xtremepapers, no one has the right to change and share them</div>

<input type="hidden" id="download_items">

<!-- 底部按钮 -->
<a class="papers-list-to-top uk-animation-slide-right-small" id="to_top" onclick="toTop();">
    <svg width="30" height="30" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="4 13 10 7 16 13"></polyline></svg>
</a>
<a class="papers-list-to-top uk-animation-slide-right-small" style="bottom: 92px;" id="to_bottom" onclick="toBottom();">
    <svg width="30" height="30" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg>
</a>



<?php } ?>

    </div>
</div>

<script>
	//判断是否为Chrome,删除提示
var isChrome = window.navigator.userAgent.indexOf("Chrome") !== -1;
if(isChrome){
    dismiss(); //chrome浏览器取消显示提示
}
</script>
    </body>
</html>