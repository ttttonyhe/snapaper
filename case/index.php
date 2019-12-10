<?php 
	require '../header.php';
	if(!empty($_GET['cate'])){
	switch ($_GET['cate']) {
		case 'igcse':
			$host = 'igcse';
			$title = '2019 F/M Series';
			break;
		
		case 'alevel':
			$host = 'alevel';
			$title = '2019 F/M Series';
			break;
			
		case 'sme':
			$host = 'sme';
			$title = 'SaveMyExams';
			break;
			
		case 'ebooks':
			$host = 'ebooks';
			$title = 'Cambridge Textbooks (PDF)';
			break;
		
		default:
			$host = 'sme';
			$title = 'SaveMyExams';
			break;
	}
?>


    <div class="uk-container wap-index" style="margin-top: 6%;padding-left: 11vh;">
    <div class="sub-title-div" style="margin-bottom:60px;display: flex;">
    <div class="cate-left">
        <h1 class="sub-title-h1"><?php echo $title; ?></h1>
    	<p class="sub-title-p">Choose a topic and start exploring</p>
    </div>
    <div class="cate-right">
    	<div>
    	<em class="back-btn" style="color: #999;">Resoureces</em>
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
$hostdir = dirname(__FILE__).'/'.$host.'/'; //要读取的文件夹
$url = '/'.$host.'/'; //图片所存在的目录
$filesnames = scandir($hostdir); //得到所有的文件
$www = 'https://www.snapaper.com'; //域名
$i = 0;

foreach ($filesnames as $name){
	++$i;
	if($i > 2){
?>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3" style="text-transform:capitalize"><?php echo $name; ?></h3>
            <a href="res?cate=<?php echo $host; ?>&sub=<?php echo $name; ?>"><p class="item-guide">Browse All Papers</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
        </div>
<?php }}} ?>

    </div>
</div>
    </body>
</html>