<?php require 'header.php' ?>
<div id="view">
	
<div v-if="loading" class="uk-container wap-index" style="margin-top: 10%; padding-left: 11vh;">
    <div class=sub-title-div style="margin-bottom: 60px; display: flex;">
        <div style="width: 73%;">
            <h1 class=sub-title-h1 style="     height: 45px;     width: 80%;     background: #e1e2e3; "></h1>
            <p class=sub-title-p style="     margin-top: 15px;     width: 60%;     height: 30px;     background: #eee; "></p>
        </div>
        <div style="text-align: right; padding-top: 40px; display: flex; width: 27%;">
            <div><em class=back-btn style="color: rgb(153, 153, 153);padding-left: 70px;"></em>
            </div>
            <div style="margin-left: 10px;"><a onclick="history.go(-1);"><em class=back-btn style="color: rgb(30, 135, 240);padding-left: 70px;"></em></a>
            </div>
        </div>
    </div>
    <div id=display_style></div>
    <div id=list class=sublist>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview loading-line" style="     border: none;     background: #f1f2f3;     box-shadow: none;     padding-bottom: 150px; "></div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview loading-line" style="     border: none;     background: #f1f2f3;     box-shadow: none; "></div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview loading-line" style="     border: none;     background: #f1f2f3;     box-shadow: none; "></div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview loading-line" style="     border: none;     background: #f1f2f3;     box-shadow: none;     padding-bottom: 150px; "></div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview loading-line" style="     border: none;     background: #f1f2f3;     box-shadow: none; "></div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview loading-line" style="     border: none;     background: #f1f2f3;     box-shadow: none; "></div>
    </div>
</div>
	
<template v-if="loading_view">
    <div :class="container" style="    padding-left: 11vh;
    padding-top: 130px;
    padding-bottom: 20px;
    height: 26vh;">
    <div class="sub-title-div" style="margin-bottom:60px;display: flex;">
    <div class="cate-left">
        <h1 class="sub-title-h1">{{ cate }}</h1>
    	<p class="sub-title-p">{{ des }}</p>
		<div class="next-cate-info">
    		<div>
        		<h3>Source</h3>
        		<p><img src="https://static.ouorz.com/logo_gceguide.png">GCE Guide</p>
    		</div>
    		<div>
         		<h3>Board</h3>
        		<p><img src="https://static.ouorz.com/QQ20200114-203749@2x.png">CAIE</p>
    		</div>
		</div>
    </div>
    <div class="cate-right">
    <div>
    	<em class="back-btn" style="color: #fff;">{{ count }} Subjects</em>
	</div>
	<div style="margin-left: 10px;">
		<a onclick="history.go(-1);">
			<em class="back-btn" style="color: #fff;background: rgb(30, 135, 240);">← Back</em>
		</a>
	</div>
    </div>
    
    </div>
    <div id="display_style"></div>
    <?php if($is_wap){ ?>
    <div class="sublist" id="list">
    	
    	<div v-for="categ in categs" class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card" v-if="!!categ.name && categ.name !== 'error_log'">
            	<h3 class="uk-card-title index-cate-h3" v-html="categ.name"></h3>
            	<a :href="'/paper?cate='+ cate +'&sub=' + categ.name.replace('amp;','')"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
        </div>

<div class="uk-card uk-card-default uk-card-hover uk-card-body" style="width: 97%;margin-left: 2%;padding: 40px 30px;display: inline-block;border: 3px solid #999;border-radius: 5px;transition: all .3s;margin-bottom: 10%;">
    <h3 style="font-weight: 600;color: #555;font-size: 2.4rem;margin: 0px;letter-spacing: 1px;">{{ cate }}</h3>
	<p style="margin: 0px;letter-spacing: 2px;color: #999;">Past Papers</p>
	<p style="color: #888;margin-top: 25px;">All Contents &amp; Names of this website are assets of owner, protected by law and powered by GCE Guide</p>
</div>

<div v-if="categs == ''" class="uk-placeholder uk-text-center" id="bottom">Service is temporarily unavailable</div>
    </div>
    </div>
    <?php }else{ ?>
    </div>
<div class="next-cate-container-out">
    <div class="uk-container next-cate-container">
    <div class="next-cate-c1">
        
<div class="next-cate-m1" v-for="fcate,index in fcates">
    <div>
        <h1><a :href="fcate.link">{{ fcate.name }}</a></h1>
        <p class="next-cate-m1-p1"><b># {{ index + 1 }}</b> Most Browsed Subject</p>
        <p class="next-cate-m1-p2"><a :href="fcate.link">Explore More →</a>
        </p>
    </div>
</div>
        
        <div class="next-cate-m2 next-cate-m2-sub" v-for="categ,index_2 in categs" v-if="!!categ.name && index_2 > Math.round(1 * (Object.keys(categs).length / 2) + 4)  && categ.name !== ('error_log' || 'Chemistry (9701)' || 'Economics (9708)' || 'Mathematics (9709)' || 'Physics (9702)' || 'Biology (9700)')">
            <div class="next-cate-m2-d1">
            	<a :href="'/paper?cate='+ cate +'&sub=' + categ.name.replace('amp;','')"><h1 v-html="'<b><i class=\'czs-circle-o\'></i></b>' + categ.name"></h1></a>
            </div>
            <div class="next-cate-m2-d2"><a :href="'/paper?cate='+ cate +'&sub=' + categ.name.replace('amp;','')">Explore →</a></div>
        </div>
    </div>
    <div class="next-cate-c2">
    	<div class="next-cate-m3">
    		<h2>All Subjects</h2>
			<p>Choose a subject and start exploring</p>
		</div>
        <div class="next-cate-m2" v-for="categ,index_3 in categs" v-if="!!categ.name && index_3 <= Math.round(1 * (Object.keys(categs).length / 2) + 4) && categ.name !== ('error_log' || 'Chemistry (9701)' || 'Economics (9708)' || 'Mathematics (9709)' || 'Physics (9702)' || 'Biology (9700)')">
            <div class="next-cate-m2-d1">
            	<a :href="'/paper?cate='+ cate +'&sub=' + categ.name.replace('amp;','')"><h1 v-html="'<b><i class=\'czs-circle-o\'></i></b>' + categ.name"></h1></a>
            </div>
            <div class="next-cate-m2-d2"><a :href="'/paper?cate='+ cate +'&sub=' + categ.name.replace('amp;','')">Explore →</a></div>
        </div>
    </div>
</div>
</div>
<?php } ?>
</template>
</div>

<script>
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
var cate_get = decodeURIComponent($.getUrlVar('cate'));

if(cookie.get('snapaper_server') == '1'){
	var link = 1;
}else{
	var link = 0;
}

window.onload = function(){ //避免爆代码

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


var get = new Vue({
    el: '#view',
    data: {
        categs: null,
        cate: cate_get,
        loading_view: 0,
        loading: 1,
        count: 0,
        des: null,
        link: link,
    	container : 'uk-container none_container wap-index',
    	fcates: []
    },
    mounted() {
    	switch(cate_get){
    		case 'A Levels':
    			this.des = 'Cambridge International AS and A level subjects';
    			this.fcates = [{
    		name: 'Chemistry (9701)',
    		link: 'https://www.snapaper.com/paper?cate=A%20Levels&sub=Chemistry%20(9701)'
    	},
    	{
    		name: 'Biology (9700)',
    		link: 'https://www.snapaper.com/paper?cate=A%20Levels&sub=Biology%20(9700)'
    	},
    	{
    		name: 'Physics (9702)',
    		link: 'https://www.snapaper.com/paper?cate=A%20Levels&sub=Physics%20(9702)'
    	},
    	{
    		name: 'Mathematics (9709)',
    		link: 'https://www.snapaper.com/paper?cate=A%20Levels&sub=Mathematics%20(9709)'
    	},
    	{
    		name: 'Economics (9708)',
    		link: 'https://www.snapaper.com/paper?cate=A%20Levels&sub=Economics%20(9708)'
    	},
    	{
    		name: 'Mathematics - Further (9231)',
    		link: 'https://www.snapaper.com/paper?cate=A%20Levels&sub=Mathematics%20-%20Further%20(9231)'
    	}
    	];
    			break;
    		case 'IGCSE':
    			this.des = 'International General Certificate of Secondary Education Subjects';
    			this.fcates = [{
    		name: 'Chemistry (0620)',
    		link: 'https://www.snapaper.com/paper?cate=IGCSE&sub=Chemistry%20(0620)'
    	},
    	{
    		name: 'Biology (0610)',
    		link: 'https://www.snapaper.com/paper?cate=IGCSE&sub=Biology%20(0610)'
    	},
    	{
    		name: 'Physics (0625)',
    		link: 'https://www.snapaper.com/paper?cate=IGCSE&sub=Physics%20(0625)'
    	},
    	{
    		name: 'Mathematics (0580)',
    		link: 'https://www.snapaper.com/paper?cate=IGCSE&sub=Mathematics%20(0580)'
    	},
    	{
    		name: 'Economics (0455)',
    		link: 'https://www.snapaper.com/paper?cate=IGCSE&sub=Economics%20(0455)'
    	},
    	{
    		name: 'Mathematics - Additional (0606)',
    		link: 'https://www.snapaper.com/paper?cate=IGCSE&sub=Mathematics%20-%20Additional%20(0606)'
    	}
    	]
    			break;
    	}
        axios.get('https://www.snapaper.com/vue/cates?cate='+cate_get)
        .then(response => {
            this.categs = response.data;
            this.count = response.data.count;
        }).then(() => {
        	this.loading = false;
            this.loading_view = true;
            this.container = 'uk-container display-container wap-index';
        })
    },
    methods: {
    	cate_name: function(name){
    		if(!!name && name.toString().indexOf('error_log') <= -1 && name.toString().indexOf('Parent Directory') <= -1){
    			return true;
    		}else{
    			return false;
    		}
    	}
    }
    });
    
}

</script>


    </body>
</html>