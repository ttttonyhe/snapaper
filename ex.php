
<?php
//Composer 依赖
require 'vendor/autoload.php';
use QL\QueryList;


//判断参数是否输入
if( !empty($_GET['cate'])) {
	
	$cate = $_GET['cate'];

	$html = file_get_contents('https://xtremepapers.xyz/papers/Cambridge%2520International%2520AS%2520%2526%2520A%2520Levels/Biology%2520%25289700%2529/');
	$data = QueryList::html($html)->rules([
	'name' => ['.autoindex_td>a','text'],
	'url' => ['.autoindex_td>a','href']
	])->query()->getData();
	$user_data = $data->all(); //获取查询数据
?>



<?php require 'header.php' ?>
	<style>
		.papers-list-td-right{
			width: 380px !important;
		}
	</style>
	<script>
	
	function live(url){
		window.open(url,"","top=100,left=300,width=800,height=1000");
	}
	
	function download_list(){ //列表下载
		var urls = $('#download_items').val(); //获取列表数据
		if(urls == ''){ //为空则提示
			alert('Can not download empty list');
		}else{
		$('#count_list_notice')[0].style.display = 'none';
		toTop();
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
		current = $.grep(current, function(value) {
			return value != id;
		}); //获取删除值位置并删除
		
		var now_count = current.length;
		if(now_count == 0){
			$('#count_list_notice')[0].style.display = 'none';
		}else{
			$('#list_count')[0].innerHTML = now_count;
		}
		
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
			
			$('#count_list_notice')[0].style.display = 'unset';
			$('#list_count')[0].innerHTML = '1';
		}else{
			var now = current + ',' + id //否则增加连接符
			var change = '#btn'+id;
			$('#download_items').val(now);
			$(change).attr('onclick', 'remove_items('+ id +')');
			$(change)[0].innerHTML = 'Remove from List';
			$(change)[0].className = 'papers-list-td-btn1-change';
			
			now = current.split(","); //分隔成数组获取个数
			var now_count = now.length + 1;
			$('#list_count')[0].innerHTML = now_count;
		}
		console.log($('#download_items').val());
}


/* UX 功能 */
function toTop(){
	/*
		var gotoTop= function(){
		  var currentPosition = document.documentElement.scrollTop || document.body.scrollTop;
		  currentPosition -= 50;
		  if (currentPosition > 0) {
			window.scrollTo(0, currentPosition);
		  }
		  else {
			window.scrollTo(0, 0);
			clearInterval(timer);
			timer = null;
		  }
		}
		var timer=setInterval(gotoTop,0.3);
		*/
	$('#top')[0].scrollIntoView();
}

function toBottom(){
	$('#bottom')[0].scrollIntoView();
}

/* 随浏览器变化而改变 */

function getScrollTop() {
	return scrollTop = document.body.scrollTop + document.documentElement.scrollTop;
}

window.onscroll = function () {
	if (getScrollTop() <= 400) {
		$('#to_top')[0].style.display = 'none';
		$('#to_bottom')[0].style.display = 'none';
		$('#sticky')[0].style.display = 'none';
	}else {
		$('#to_top')[0].style.display = 'unset';
		$('#to_bottom')[0].style.display = 'unset';
		$('#sticky')[0].style.display = 'unset';
		$('#update')[0].style.display = 'none';
	}
}
/* 结束随浏览器变化而改变 */

function dismiss(){
	$('#update')[0].style.display = 'none';
}


/* 结束 UX 功能 */

</script>
		
	
	<div class="papers-list-sticky" style="display:unset;width: 100%;border-radius: 0px;height: 40px;margin-left: 0px;text-align: center;z-index: 9998;padding-top: 15px;border-top: 2px solid #f0506e;" id="update"><p>We recommend using <b>Chrome</b> or some of the latest modern browsers for the best experience. <a href="https://www.google.cn/chrome/index.html" target="_blank">Click here to download Chrome</a>&nbsp;<a onclick="dismiss();" style="color: #f0506e;border: 1px solid #f0506e;padding: 4px 7px;border-radius: 4px;margin-left: 20px;"><svg width="19" height="19" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="margin-top: -3.5px;margin-right: 2px;"> <path fill="none" stroke="#f0506e" stroke-width="2" d="M16,16 L4,4"></path> <path fill="none" stroke="#f0506e" stroke-width="2" d="M16,4 L4,16"></path></svg>Dismiss</a></p></div>
	
		
	<div class="papers-list-sticky" id="sticky">
		<div style="float: left;">
			<h3 style="margin-bottom: 0px;font-weight: 600;">Viewing</h3>
			<p style="margin: 0px;font-weight: 300;margin-top: -3px;"><?php echo $_GET['sub']; ?></p></div><div style="float: right;padding-top: 10px;">
				<a onclick="download_all();" style="display: inline-block;">
					<button class="uk-button uk-button-primary" style="border-radius: 5px;padding: 0px 10px;">Download All</button>
				</a>
				<a onclick="download_list();" style="display: inline-block;width: 140px;">
					<button class="uk-button uk-button-danger" style="border-radius: 5px;margin-left: 0.5%;padding: 0px 10px;">Download List</button>
				</a>
		</div>
	</div>
	
	
	
	<div class="uk-container" style="margin-top: 10%;">
	<div class="sub-title-div" style="margin-bottom:60px;display: flex;" id="top">
	<div style="width: 73%;">
		<h1 class="sub-title-h1"><?php echo $_GET['sub']; ?></h1>
		<p class="sub-title-p">Made by Snapaper sourced from SaveMyExams</p>
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
<script type="text/javascript" src="https://static.ouorz.com/download.js"></script>		
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
	
var isChrome = window.navigator.userAgent.indexOf("Chrome") !== -1;
if(isChrome){
	dismiss(); //chrome浏览器取消显示提示
}
</script>
<?php
	if(!empty($user_data)){ //开始读取数据
	for($i=0;$i<count($user_data);$i++){ //循环获取数据
?>

		<tr>
			<td class="papers-list-td-left"><a href="download?filename=<?php echo 'https://xtremepapers.xyz'.urlencode($user_data[$i]['url']); ?>" id="<?php echo $i; ?>"><p><?php echo $user_data[$i]['name']; ?></p></a></td>
			<td class="papers-list-td-right">
				<p>
					<button class="papers-list-td-btn1" onclick="add_items(<?php echo $i; ?>)" id="btn<?php echo $i; ?>">Add to List</button>
					<button class="papers-list-td-btn2" onclick="downloadFile('download?filename=<?php echo 'https://xtremepapers.xyz'.urlencode($user_data[$i]['url']); ?>')">Download</button>
					<a onclick="live('<?php echo 'https://xtremepapers.xyz'.urlencode($user_data[$i]['url']); ?>');"><button class="papers-list-td-btn3">LiveView</button></a>
				</p>
			</td>
		</tr>

	
<?php }} ?>
</tbody>
</table>

<div class="uk-placeholder uk-text-center" id="bottom">Paper resources are from GCE Guide, no one has the right to change and share them</div>

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
	</body>
</html>