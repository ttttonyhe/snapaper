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
				<script src="https://static.ouorz.com/jquery.min.js"></script>
				<link href="style.css" rel="stylesheet">
				<link rel="Shortcut Icon" href="https://static.ouorz.com/snapaper_logo.ico" type="image/x-icon">
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
                <a href="https://www.snapaper.com" style="text-decoration:none">
                    <h3 class="nav-title">
                    <img src="https://static.ouorz.com/snapaper-logo.png" class="nav-title-img">napaper</h3>
                </a>
                    <a href="https://www.snapaper.com/about.html" style="text-decoration:none"><span class="uk-label uk-label-success nav-title-v">V0.17</span></a></li></ul>
        <ul class="nav-2">
            <li class="nav-2-icon1"><a href="donate.html"><svg width="25" height="25" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill="none" stroke="#ee561d" stroke-width="1.03" d="M10,4 C10,4 8.1,2 5.74,2 C3.38,2 1,3.55 1,6.73 C1,8.84 2.67,10.44 2.67,10.44 L10,18 L17.33,10.44 C17.33,10.44 19,8.84 19,6.73 C19,3.55 16.62,2 14.26,2 C11.9,2 10,4 10,4 L10,4 Z"></path></svg></a></li>
            <li class="nav-2-icon2"><a href="about.html"><svg width="25" height="25" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <circle cx="10" cy="14" r="1"></circle> <circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle> <path d="M10.97,7.72 C10.85,9.54 10.56,11.29 10.56,11.29 C10.51,11.87 10.27,12 9.99,12 C9.69,12 9.49,11.87 9.43,11.29 C9.43,11.29 9.16,9.54 9.03,7.72 C8.96,6.54 9.03,6 9.03,6 C9.03,5.45 9.46,5.02 9.99,5 C10.53,5.01 10.97,5.44 10.97,6 C10.97,6 11.04,6.54 10.97,7.72 L10.97,7.72 Z"></path></svg></a></li>
        </ul>
    </div>
    </header>
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