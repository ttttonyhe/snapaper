<?php require '../header.php' ?>

    <div class="uk-container" style="margin-top: 6%;padding-left: 11vh;">
    <div class="sub-title-div" style="margin-bottom:60px;display: flex;">
    <div style="
    width: 73%;
">
        <h1 class="sub-title-h1">SaveMyExams</h1>
    	<p class="sub-title-p">Choose a subject and start exploring</p>
    </div>
    <div style="text-align: right;padding-top: 40px;display: flex;width:27%">
    <div>
    	<em class="back-btn" style="color: #999;">Restricted Area</em>
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
    <div class="sublist" id="list" uk-scrollspy="target: > .uk-card; cls:uk-animation-slide-bottom-small; delay: 100">

<?php 
$hostdir = dirname(__FILE__).'/../content/'; //要读取的文件夹
$url = '/content/'; //图片所存在的目录
$filesnames = scandir($hostdir); //得到所有的文件
$www = 'https://www.snapaper.com'; //域名
$i = 0;

foreach ($filesnames as $name){
	++$i;
	if($i > 2){
?>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3" style="text-transform:capitalize"><?php echo $name; ?></h3>
            <a href="sme_ms?sub=<?php echo $name; ?>"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
        </div>
<?php }} ?>

<div class="uk-card uk-card-default uk-card-hover uk-card-body" style="width: 97%;margin-left: 2%;padding: 40px 30px;display: inline-block;border: 3px solid #999;border-radius: 5px;transition: all .3s;margin-bottom: 10%;">
    <h3 style="font-weight: 600;color: #555;font-size: 2.4rem;margin: 0px;letter-spacing: 1px;">SaveMyExams</h3>
	<p style="margin: 0px;letter-spacing: 2px;color: #999;">A-Levels MarkSchemes</p>
	<p style="color: #888;margin-top: 25px;">All Contents &amp; Names of this website are assets of owner, protected by law and sourced from <a href="https://savemyexams.co.uk">savemyexams.co.uk</a></p>
</div>

    </div>
</div>
    </body>
</html>