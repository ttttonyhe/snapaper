<?php 
	require '../header.php';
	if(empty($_GET['sub'])){
?>
<script>history.go(-1);</script>
<?php }

			switch ($_GET['cate']) {
		case 'igcse':
			$host = 'igcse';
			break;
		
		case 'alevel':
			$host = 'alevel';
			break;
	}
?>
	<style>
		.papers-list-td-right{
			width: 380px !important;
		}
	</style>
	<script>
	var dmode = 1; //下载方式
	
	function live(url){
		window.open(url,"","top=100,left=300,width=800,height=1000");
	}
	
	</script>
	<script src="/ux.js"></script>
		
	
	<div class="papers-list-sticky" style="display:unset;width: 100%;border-radius: 0px;height: 40px;margin-left: 0px;text-align: center;z-index: 9998;padding-top: 15px;border-top: 2px solid #f0506e;" id="update"><p>We recommend using <b>Chrome</b> or some of the latest modern browsers for the best experience. <a href="https://www.google.cn/chrome/index.html" target="_blank">Click here to download Chrome</a>&nbsp;<a onclick="dismiss();" style="color: #f0506e;border: 1px solid #f0506e;padding: 4px 7px;border-radius: 4px;margin-left: 20px;"><svg width="19" height="19" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="margin-top: -3.5px;margin-right: 2px;"> <path fill="none" stroke="#f0506e" stroke-width="2" d="M16,16 L4,4"></path> <path fill="none" stroke="#f0506e" stroke-width="2" d="M16,4 L4,16"></path></svg>Dismiss</a></p></div>
	
		
	<div id="sticky" class="papers-list-sticky" style="padding:0px;margin-left:0px;width:100%">
    <div class="uk-container" style="display: flex;">
        <div style="flex-basis: 50%;">
            <h3 style="margin-bottom: 0px; font-weight: 600;">Viewing</h3> 
            <p style="margin: -3 0 0px;font-weight: 300;margin-top: -3px;text-transform:capitalize"><?php echo $_GET['sub']; ?></p>
        </div>
        <div style="padding-top: 10px;flex-basis: 50%;text-align: right;">
            <a onclick="download_list();" style="display: inline-block; width: 140px;">
                <button class="uk-button uk-button-danger" style="border-radius: 5px; margin-left: 0.5%; padding: 0px 10px; line-height: 35px;">Download List</button>
            </a>
        </div>
    </div>
</div>
	
	
	
	<div class="uk-container" style="margin-top: 6%;">
	<div class="sub-title-div" style="margin-bottom:60px;display: flex;" id="top">
	<div style="width: 73%;">
		<h1 class="sub-title-h1" style="text-transform:capitalize"><?php echo $_GET['sub']; ?><em style="font-size:1.5rem;color:#999;font-style:normal;font-weight:300;margin-left:15px">2019 F/M Series</em></h1>
		<p class="sub-title-p">Made by Snapaper sourced from the Internet</p>
	</div>
	<div style="text-align: right;padding-top: 40px;display: flex;width:27%">
	<div>
		<em class="back-btn" style="color: #999;">Special</em>
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
	
var isChrome = window.navigator.userAgent.indexOf("Chrome") !== -1;
if(isChrome){
	dismiss(); //chrome浏览器取消显示提示
}
</script>
<?php
$sub = $_GET['sub'];
$hostdir = dirname(__FILE__).'/'.$host.'/'.$sub.'/'; //要读取的文件夹
$url = '/case/'.$host.'/'.$sub.'/'; //图片所存在的目录
$filesnames = scandir($hostdir); //得到所有的文件
$www = 'https://www.snapaper.com'; //域名
$i = 0;

foreach ($filesnames as $name){
	++$i;
	if($i > 2){
?>

		<tr>
			<td class="papers-list-td-left"><a href="https://www.snapaper.com/download?filename=<?php echo $www.$url.$name; ?>" id="<?php echo $i; ?>"><p><?php echo $name; ?></p></a></td>
			<td class="papers-list-td-right" style="width:530px !important">
				<p>
					<button class="papers-list-td-btn1" onclick="add_items(<?php echo $i; ?>)" id="btn<?php echo $i; ?>">Add to List</button>
					<button class="papers-list-td-btn2" onclick="downloadFile(`https://www.snapaper.com/download?filename=<?php echo $www.$url.$name; ?>`)">Download</button>
					<a onclick="live(`<?php echo $www.$url.$name; ?>`);"><button class="papers-list-td-btn3">LiveView</button></a>
					<button class="papers-list-td-btn2" style="color: #777;" uk-tooltip="title: <b>Notice</b><br/>Downloading and sharing this document will be considered an infringement of intellectual property rights; pos: top">Notice</button>
				</p>
			</td>
		</tr>
	

	
<?php }} ?>
</tbody>
</table>

<div class="uk-placeholder uk-text-center" id="bottom">Resources from savemyexams are not open to the public, storing and sharing of these resources is illegal</div>

<input type="hidden" id="download_items">

<!-- 底部按钮 -->
<a class="papers-list-to-top uk-animation-slide-right-small" id="to_top" onclick="toTop();">
	<svg width="30" height="30" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="4 13 10 7 16 13"></polyline></svg>
</a>
<a class="papers-list-to-top uk-animation-slide-right-small" style="bottom: 92px;" id="to_bottom" onclick="toBottom();">
	<svg width="30" height="30" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg>
</a>


	</div>
</div>
	</body>
</html>