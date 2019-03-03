<?php require 'header.php' ?>
<div id="view">
	
	<div v-if="loading" class="uk-container loading-line" style="margin-top: 6%; padding-left: 11vh;"><div class=sub-title-div style="margin-bottom: 60px; display: flex;"><div style="width: 73%;"><h1 class=sub-title-h1 style="     height: 45px;     width: 80%;     background: #e1e2e3; "></h1><p class=sub-title-p style="     margin-top: 15px;     width: 60%;     height: 30px;     background: #eee; "></p></div><div style="text-align: right; padding-top: 40px; display: flex; width: 27%;"><div><em class=back-btn style="color: rgb(153, 153, 153);padding-left: 70px;"></em></div><div style="margin-left: 10px;"><a onclick="history.go(-1);"><em class=back-btn style="color: rgb(30, 135, 240);padding-left: 70px;"></em></a></div></div></div><div id=display_style></div><div id=list class=sublist><div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview " style="     border: none;     background: #f1f2f3;     box-shadow: none;     padding-bottom: 150px; "></div><div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview " style="     border: none;     background: #f1f2f3;     box-shadow: none; "></div><div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview " style="     border: none;     background: #f1f2f3;     box-shadow: none; "></div><div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview " style="     border: none;     background: #f1f2f3;     box-shadow: none;     padding-bottom: 150px; "></div><div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview " style="     border: none;     background: #f1f2f3;     box-shadow: none; "></div><div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card uk-scrollspy-inview " style="     border: none;     background: #f1f2f3;     box-shadow: none; "></div></div></div>
	
	
    <div v-if="loading_view" class="uk-container" style="margin-top: 6%;padding-left: 11vh;">
    <div class="sub-title-div" style="margin-bottom:60px;display: flex;">
    <div style="width: 73%;">
        <h1 class="sub-title-h1">{{ cate }}</h1>
    	<p class="sub-title-p">Choose a subject and start exploring</p>
    </div>
    <div style="text-align: right;padding-top: 40px;display: flex;width:27%">
    <div>
    	<em class="back-btn" style="color: #999;">{{ count }} Subjects</em>
	</div>
	<div style="margin-left: 10px;">
		<a onclick="history.go(-1);">
			<em class="back-btn" style="color: #1e87f0;">← Back</em>
		</a>
	</div>
    </div>
    
    </div>
    <div id="display_style"></div>
    <div class="sublist" id="list">
    	
    	<div v-for="categ in categs" class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card" v-if="!!categ.name">
            	<h3 class="uk-card-title index-cate-h3">{{ categ.name }}</h3>
            	<a :href="'/paper?cate='+ cate +'&sub=' + categ.name"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
        </div>

<div class="uk-card uk-card-default uk-card-hover uk-card-body" style="width: 97%;margin-left: 2%;padding: 40px 30px;display: inline-block;border: 3px solid #999;border-radius: 5px;transition: all .3s;margin-bottom: 10%;">
    <h3 style="font-weight: 600;color: #555;font-size: 2.4rem;margin: 0px;letter-spacing: 1px;">{{ cate }}</h3>
	<p style="margin: 0px;letter-spacing: 2px;color: #999;">Past Papers</p>
	<p style="color: #888;margin-top: 25px;">All Contents &amp; Names of this website are assets of owner, protected by law and powered by GCE Guide</p>
</div>

<div v-if="categs == ''" class="uk-placeholder uk-text-center" id="bottom">Service is temporarily unavailable</div>
    </div>
</div>
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


var cate_get = decodeURIComponent($.getUrlVar('cate'));

var get = new Vue({
    el: '#view',
    data: {
        categs: null,
        cate: cate_get,
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
        axios.get('<?php echo 'https://www.snapaper.com/vue/cates'.'?'.$_SERVER['QUERY_STRING']; ?>')
        .then(response => {
            this.categs = response.data;
            this.count = response.data.count;
        }).finally(() => {
            this.loading = false;
            this.loading_view = true;
        });
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