<?php 
    //获取设置的选项内容
    require 'settings.php'; ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Official Blog | Snapaper</title>
    <script src="https://static.ouorz.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://static.ouorz.com/vue.min.js"></script>
    <script type="text/javascript" src="https://static.ouorz.com/axios.min.js"></script>
    <script src="https://cdn.bootcss.com/markdown-it/8.4.2/markdown-it.min.js"></script>
    <script type="text/javascript" src="element/index.js"></script>
    <link rel="stylesheet" type="text/css" href="element/index.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.goup.js"></script>
    <link type="text/css" rel="stylesheet" href="caomei/style.css">
    <link href="https://static.zeo.im/uikit.min.css" rel="stylesheet">
	<link href="https://static.zeo.im/uikit-rtl.min.css" rel="stylesheet">
	<script type="text/javascript" src="https://static.zeo.im/uikit.min.js"></script>
	<script type="text/javascript" src="https://static.ouorz.com/uikit-icons.min.js"></script>
	<link rel="Shortcut Icon" href="https://static.ouorz.com/snapaper_logo.ico" type="image/x-icon">
</head>

<body>
    <div id="view" style="opacity:0;">
	<header class="header-div">
		<div class="uk-container">
			<ul class="nav-1">
				<li>
					<a href="https://www.snapaper.com/blog" style="text-decoration:none">
						<h3 class="nav-title">
							<img src="https://static.ouorz.com/snapaper-logo.png" class="nav-title-img">napaper</h3>
						<b style="margin-left: 6px;font-weight: 100;letter-spacing: 1px;font-size: 1.39rem;color:#666;font-family: sans-serif;">Blog</b>
					</a>
				</li>
			</ul>
			<ul class="nav-2">
				<li class="nav-2-icon1" style="background: #fff;padding: 2px 10px;border: 1px solid #999;border-radius: 4px;font-size: .9rem;" title="" aria-expanded="false"><a href="https://www.snapaper.com/about" style="text-decoration:none;color:#999;letter-spacing: .5px;">V0.12</a></li>
			</ul>
		</div>
	</header>
	<div class="cap-nav">
		<div class="uk-container">
			<div class="cap-nav-right">
				<ul class="nav">
					<li>
						<a class="cap-nav-a" href="https://www.snapaper.com/blog" style="border-left: 1px solid #eee;">
							<i class="czs-home-l"></i> Home
						</a>
					</li>
					<li>
						<a class="cap-nav-a" href="/about">
							<i class="czs-label-info-l"></i> About
						</a>
					</li>
					<li>
						<a class="cap-nav-a" href="/donate">
							<i class="czs-red-envelope"></i> Donation
						</a>
					</li>
				</ul>
			</div>
			<div class="cap-nav-left">
				<ul class="nav">
					<li>
						<a class="cap-nav-post" href="https://www.snapaper.com">
							Past Papers
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>