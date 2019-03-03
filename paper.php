<?php require 'header.php'; ?>
<div id="view">
        
    
    <div class="papers-list-sticky" style="display:unset;width: 100%;border-radius: 0px;height: 40px;margin-left: 0px;text-align: center;z-index: 9998;padding-top: 15px;border-top: 2px solid #f0506e;" id="update"><p>We recommend using <b>Chrome</b> or some of the latest modern browsers for the best experience. <a href="https://www.google.cn/chrome/index.html" target="_blank">Click here to download Chrome</a>&nbsp;<a onclick="dismiss();" style="color: #f0506e;border: 1px solid #f0506e;padding: 4px 7px;border-radius: 4px;margin-left: 20px;"><svg width="19" height="19" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="margin-top: -3.5px;margin-right: 2px;"> <path fill="none" stroke="#f0506e" stroke-width="2" d="M16,16 L4,4"></path> <path fill="none" stroke="#f0506e" stroke-width="2" d="M16,4 L4,16"></path></svg>Dismiss</a></p></div>
    
        
    <div class="papers-list-sticky" id="sticky">
        <div style="float: left;">
            <h3 style="margin-bottom: 0px;font-weight: 600;">Viewing</h3>
            <p style="margin: 0px;font-weight: 300;margin-top: -3px;">{{ sub }}</p>
        </div>
        <div style="float: right;padding-top: 10px;">
                <a onclick="download_all();" style="display: inline-block;">
                    <button class="uk-button uk-button-primary" style="border-radius: 5px;padding: 0px 15px;line-height: 35px;background-color: #0084FF;">Download All</button>
                </a>
                <a onclick="download_list();" style="display: inline-block;width: 140px;">
                    <button class="uk-button uk-button-danger" style="border-radius: 5px;margin-left: 0.5%;padding: 0px 10px;line-height: 35px;background: transparent;color: #0084FF;border: 1px solid #0084FF;">Download List</button>
                </a>
        </div>
    </div>
    
    <div v-if="loading" class=uk-container style="margin-top: 6%;"><div id=top class=sub-title-div style="margin-bottom: 60px; display: flex;"><div style="width: 73%;"><h1 class="sub-title-h1 loading-line" style="     width: 60%;     height: 50px;     background: #e1e2e3; "></h1><p class="sub-title-p loading-line" style="     background: #e7e8e9;     margin-top: 10px;     width: 80%;     height: 25px; "></p></div><div style="text-align: right; padding-top: 40px; display: flex; width: 27%;"><div><em class="back-btn loading-line" style="color: rgb(153, 153, 153);padding-left: 70px;"></em></div><div style="margin-left: 10px;"><a><em class="back-btn loading-line" style="color: rgb(30, 135, 240);padding-left: 70px;"></em></a></div></div></div><div style="margin-top: 2%;"><div id=dl style="margin-bottom: 10px;"><a><button class="uk-button uk-button-primary loading-line" style="border-radius: 5px;width: 16%;height: 40px;background: #eee;"></button></a><a><button class="uk-button uk-button-danger loading-line" style="border-radius: 5px;margin-left: 0.5%;width: 16%;height: 40px;background: #eee;"></button></a></div><div style="     margin-top: 60px; "><div class="loading-line" style="     width: 100%;     height: 40px;     background: #f1f2f3;     margin-bottom: 20px; "></div><div class="loading-line" style="     width: 90%;     height: 40px;     background: #f1f2f3;     margin-bottom: 20px; "></div><div style="     width: 80%;     height: 40px;     background: #f1f2f3;     margin-bottom: 20px; " class="loading-line"></div><div class="loading-line" style="     width: 90%;     height: 40px;     background: #f1f2f3;     margin-bottom: 20px; "></div><div style="     width: 90%;     height: 40px;     background: #f1f2f3;     margin-bottom: 20px; " class="loading-line"></div><div style="     width: 100%;     height: 40px;     background: #f1f2f3;     margin-bottom: 20px; " class="loading-line"></div></div></div></div>
    
    
    
    <div class="uk-container" style="margin-top: 6%;" v-if="loading_view">
    <div class="sub-title-div" style="margin-bottom:60px;display: flex;" id="top">
    <div style="width: 73%;">
        <h1 class="sub-title-h1">{{ sub + ' | ' + cate }}</h1>
    	<p class="sub-title-p">Made by Snapaper sourced from GCE Guide</p>
    </div>
    <div style="text-align: right;padding-top: 40px;display: flex;width:27%">
    <div>
    	<em class="back-btn" style="color: #999;">{{ count }} Papers</em>
	</div>
	<div style="margin-left: 10px;">
		<a onclick="history.go(-1);">
			<em class="back-btn" style="color: #1e87f0;">← Back</em>
		</a>
	</div>
    </div>
    
    </div>
    <div style="margin-top:2%">

<script src="src/ux.js"></script>

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


        <tr v-for="(paper,index) in papers">
        	<template v-if="!!paper.name">
            <td class="papers-list-td-left"><a :href="list_a(paper.url)" :id="index"><p>{{ paper.name }}</p></a></td>
            <td class="papers-list-td-right">
                <p>
                    <button class="papers-list-td-btn1" :onclick="'add_items('+index+')'" :id="'btn'+index">Add to List</button>
                    <button class="papers-list-td-btn2" @click="download_btn(paper.url)">Download</button>
                    <a @click="live_btn(paper.url)"><button class="papers-list-td-btn3">LiveView</button></a>
                    <a v-if="qp(paper.name)" @click="mark_btn(paper.url)"><button class="papers-list-td-btn2" style="color: #fbbd01;">Mark Scheme</button></a>
        			<a v-else-if="ms(paper.name)" @click="qp_btn(paper.url)"><button class="papers-list-td-btn2" style="color: #6d3cbd;letter-spacing: -1.4px;">Question Paper</button></a>
        			<button v-else class="papers-list-td-btn2" style="color: #999;letter-spacing: 1.1px;">© Snapaper</button>
                </p>
            </td>
            </template>
        </tr>
    
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

    </div>
</div>
</div>
<script>
	//判断是否为Chrome,删除提示
var isChrome = window.navigator.userAgent.indexOf("Chrome") !== -1;
if(isChrome){
    dismiss(); //chrome浏览器取消显示提示
}

$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }
});

</script>

<script>

window.onload = function(){ //避免爆代码

var cate_get = decodeURIComponent($.getUrlVar('cate'));
var sub_get = decodeURIComponent($.getUrlVar('sub'));

var get = new Vue({
    el: '#view',
    data: {
        papers: null,
        cate: cate_get,
        sub: sub_get,
        loading_view: 0,
        loading: 1,
        count: 0,
        <?php if($_COOKIE['snapaper_server'] == 0 || !isset($_COOKIE['snapaper_server'])){ ?>
    	link: 0
    	<?php }else{ ?>
    	link: 1
    	<?php } ?>
    },
    mounted() {
        axios.get('<?php echo 'https://www.snapaper.com/vue/papers'.'?'.$_SERVER['QUERY_STRING']; ?>')
        .then(response => {
            this.papers = response.data;
            this.count = response.data.count;
        }).finally(() => {
            this.loading = false;
            this.loading_view = true;
        });
    },
    methods: {
    	qp: function(name){
    		if(!!name && name.toString().indexOf('qp') > -1 && name.toString().indexOf('2_2') <= -1){
    			return true;
    		}else{
    			return false;
    		}
    	},
    	ms: function(name){
    		if(!!name && name.toString().indexOf('ms') > -1 && name.toString().indexOf('2_2') <= -1 && name.toString().indexOf('+') <= -1){
    			return true;
    		}else{
    			return false;
    		}
    	},
    	replace: function(type,name){
    		if(type == 'qp'){
    			return name.replace('qp','ms');
    		}else{
    			return name.replace('ms','qp');
    		}
    	},
    	download_btn : function(name){
    		this.link ? downloadFile('download?filename=https://papers.gceguide.xyz' + name) : downloadFile('download?filename=https://papers.gceguide.com/' + this.cate + '/' + this.sub + '/' + name)
    	},
    	live_btn : function(name){
    		this.link ? live('https://papers.gceguide.xyz' + name) : live('https://papers.gceguide.com/'+ this.cate + '/' + this.sub + '/' + name)
    	},
    	mark_btn : function(name){
    		this.link ? live('https://papers.gceguide.xyz' + name.replace('qp','ms')) : live('https://papers.gceguide.com/'+ this.cate + '/' + this.sub + '/' + name.replace('qp','ms'));
    	},
    	qp_btn : function(name){
    		this.link ? live('https://papers.gceguide.xyz' + name.replace('ms','qp')) : live('https://papers.gceguide.com/'+ this.cate + '/' + this.sub + '/' + name.replace('ms','qp'));
    	},
    	list_a: function(name){
    		return this.link ? 'download?filename=https://papers.gceguide.xyz' + name : 'download?filename=https://papers.gceguide.com/' + this.cate + '/' + this.sub + '/' + name
    	}
    }
    });
    
}

</script>
    </body>
</html>




















































