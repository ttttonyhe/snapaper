<!DOCTYPE html>
<html lang="en">
		<head>
				<meta charset="UTF-8">
				<title>Snapaper | Better Resources for Cambridge Examinations</title>
				<meta name="keywords" content="IGCSE,ALevel,OLevel,pastpapers,snapaper,snap">
				<meta name="description" content="Resources for Cambridge Examinations">
				<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=no,
		width=device-width,initial-scale=1.0" />
				<link href="https://static.zeo.im/uikit.min.css" rel="stylesheet">
				<link href="https://static.zeo.im/uikit-rtl.min.css" rel="stylesheet">
				<script type="text/javascript" src="https://static.zeo.im/uikit.min.js"></script>
				<script type="text/javascript" src="https://static.ouorz.com/uikit-icons.min.js"></script>
				<link href="css/style.css" rel="stylesheet">
				<link rel="Shortcut Icon" href="https://static.ouorz.com/snapaper_logo.ico" type="image/x-icon">
				<script type="text/javascript" src="https://static.ouorz.com/vue.min.js"></script>
				<script type="text/javascript" src="https://static.ouorz.com/axios.min.js"></script>
				<script src="https://static.ouorz.com/jquery-3.3.1.min.js"></script>
				<script>
var _hmt = _hmt || [];
(function() {
	var hm = document.createElement("script");
	hm.src = "https://hm.baidu.com/hm.js?a4a7b388691389952cef0d953a72ff9b";
	var s = document.getElementsByTagName("script")[0];
	s.parentNode.insertBefore(hm, s);
})();
</script>
		</head>
		<body>
		<header class="header-div"><div class="uk-container">
        <ul class="nav-1">
            <li>
                <a href="https://www.snapaper.com/" style="text-decoration:none">
                    <h3 class="nav-title">
                    <img src="https://static.ouorz.com/snapaper-logo.png" class="nav-title-img">napaper</h3>
                    <b style="margin-left: 6px;font-weight: 100;letter-spacing: 1px;font-size: 1.39rem;color:#666;">PastPapers</b>
                </a>
            </li></ul>
        <ul class="nav-2">
        	<li class="nav-2-icon1" style="background: #f1f2f3;padding: 3px 10px;border-radius: 4px;font-size: .9rem;margin-right: 15px;" uk-tooltip="title: When there is a problem with our service, you can choose to switch to another server node by clicking 'Switch Server' on home page; pos: bottom"><a href="https://www.snapaper.com" style="text-decoration:none;color:#999">Node<b style="margin-left: 3px;">
        		<?php 
        			if(!isset($_COOKIE['snapaper_server'])){ 
        				echo '1'; 
        			}elseif($_COOKIE['snapaper_server'] == 4){ //手贱写成4了....
        				echo $_COOKIE['snapaper_server'] - 1; 
        			}else{ 
        				echo $_COOKIE['snapaper_server'] + 1; 
        			}?>
        		</b></a></li>
            <li class="nav-2-icon1" style="background: #fff;padding: 2px 10px;border: 1px solid #999;border-radius: 4px;font-size: .9rem;" uk-tooltip="title: When there is a problem with our service, you can choose to switch to another server node by clicking 'Switch Server' on home page; pos: bottom" title="" aria-expanded="false"><a href="https://www.snapaper.com/about" style="text-decoration:none;color:#999;letter-spacing: .5px;">V1.70</a></li>
        </ul>
    </div>
    </header>
    <div class="cap-nav">
    <div class="uk-container">
      <div class="cap-nav-right">
        <ul class="nav">
          <li>
              <a class="cap-nav-a" href="https://www.snapaper.com" style="border-left: 1px solid #eee;">
                Home
                </a>          
          </li>
          <li>
              <a class="cap-nav-a" href="/about">
                About
                </a>          
          </li>
                    <li>
              <a class="cap-nav-a" href="/donate">
                Donation
                </a>          
          </li>
          
                  </ul>
      </div>
      <div class="cap-nav-left">
        <ul class="nav">
          <li>
              <a class="cap-nav-post" href="https://platform.snapaper.com">
                Study Platform
                </a>          
          </li>
        </ul>
      </div>
    </div>
  </div>
		<?php
		function isMobile() {
	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
		return true;
	}
	// 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset($_SERVER['HTTP_VIA'])) {
		// 找不到为flase,否则为true
		return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
	}
	// 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger');
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
			return true;
		}
	}
	// 协议法，因为有可能不准确，放到最后判断
	if (isset ($_SERVER['HTTP_ACCEPT'])) {
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
			return true;
		}
	}
	return false;
}

if(isMobile()){ ?>
<style>
	.uk-container{
		display: none;
	}
	.header-div{
		display: none;
	}
</style>
<div style="width: 100%;height: 100vh;position: absolute;background-color: #fff;z-index: 999;text-align: center;padding-top: 20%;">
   <h1 style="font-weight: 400;margin-bottom: 0px;font-size: 3rem;">Not Supported Yet</h1>
   <p style="margin-top: 10px !important;font-weight: 100;letter-spacing: 1px;margin-bottom:40px">Please use a PC to view our website</p>
   <a href="https://www.zeo.im" style="
    border: 1.5px solid #1e87f0;
    padding: 8px 20px;
    font-weight: 600;
    border-radius: 5px;
">See More</a>
</div>

<?php } ?>