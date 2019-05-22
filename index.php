<?php require 'header.php' ?>
        <?php 
        //暂时不使用采集动态获取内容，板块目前一直都是固定的
        /*
        //Composer 依赖
        require 'vendor/autoload.php';
        use QL\QueryList;
        
        $url = 'https://www.gceguide.com/past-papers';//生成查询页面
        $html = file_get_contents($url);
        
        $data = QueryList::html($html)->rules([
        'name' => ['h3','text']
        ])->range('.panel-no-style>.panel-grid-cell')->query()->getData();
        $user_data = $data->all(); //获取查询数据
    
        //判断数据查询结果是否为空
        if(!empty($user_data)){
        ?>
        <?php for($i=1;$i<=count($user_data) - 2;$i++){ //循环输出 ?>
        
        <?php if(substr($user_data[$i]['name'],-5) == 'IGCSE'){ //判断是否为 IGCSE ?>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3"><?php echo $user_data[$i]['name']; ?></h3>
            <a href="/cate.php?cate=IGCSE"><p style="margin-top: 15px;">Browse All Subjects<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
        </div>
        <?php }else{ //否则截取后七位字符并加上's' ?>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-cate-card">
            <h3 class="uk-card-title index-cate-h3"><?php echo $user_data[$i]['name']; ?></h3>
            <a href="/cate.php?cate=<?php echo substr($user_data[$i]['name'],-7).'s'; ?>"><p style="margin-top: 15px;">Browse All Subjects<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
        </div>
        <?php } ?>
        
        <?php }} */ ?>

<script>

function setCookie(name,value){ 
    var Days = 30; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString(); 
}
/* 设置服务器源 */
function set_server(source){
    <?php if(!isset($_COOKIE['snapaper_server'])){ ?>
        var c_source = 3;
    <?php }else{ ?>
        var c_source = <?php echo $_COOKIE['snapaper_server']; ?>;
    <?php } ?>
    var com0 = 'https://papers.gceguide.com';
    var xyz1 = 'https://papers.gceguide.xyz';
    var xtr4 = 'https://xtremepapers.xyz';
    if( c_source == 0 || c_source == 3 ){
        setCookie('snapaper_server',1);
        $('#switch')[0].innerHTML = 'loading';
        swal("Success", "You've swtiched to Server 2", "success", {
        	button : false
        });
        setTimeout("location.reload()",1000);
    }else if( c_source == 1 ){
    	setCookie('snapaper_server',0);
    	$('#switch')[0].innerHTML = 'loading';
        swal("Success", "You've swtiched to Server 1", "success", {
        	button : false
        });
    	setTimeout("location.reload()",1000);
    }else if( c_source == 4 ){
    	setCookie('snapaper_server',0);
    	$('#switch')[0].innerHTML = 'loading';
        swal("Success", "You've swtiched to Server 1", "success", {
        	button : false
        });
    	setTimeout("location.reload()",1000);
    }else{
    	swal("Error", "Illegal Request", "error", {
        	button : false
        });
    }
}
/* 结束设置服务器源 */
</script>
<div class="uk-container uk-animation-slide-bottom-small" style="margin-top: 6%;" uk-scrollspy="target: > .uk-card; cls:uk-animation-slide-bottom-small; delay: 200">
    <div class="sub-title-div">
        <h1 class="sub-title-h1" style="display: inline-block;">All Papers</h1>
        <a onclick="set_server();" style="color: #666;border: 1px solid #666;padding: 3px 8px 4px 8px;border-radius: 4px;margin-left: 10px;position: absolute;margin-top: 18px;" uk-tooltip="title: <b>Notice</b><br/>When there is a problem with our service, you can choose to switch to another server by clicking here.; pos: right" id="switch"><svg width="17" height="17" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="refresh" style="margin-top: -3px;margin-right: 3px;"> <path fill="none" stroke="#666" stroke-width="1.1" d="M17.08,11.15 C17.09,11.31 17.1,11.47 17.1,11.64 C17.1,15.53 13.94,18.69 10.05,18.69 C6.16,18.68 3,15.53 3,11.63 C3,7.74 6.16,4.58 10.05,4.58 C10.9,4.58 11.71,4.73 12.46,5"></path> <polyline fill="none" stroke="#666" points="9.9 2 12.79 4.89 9.79 7.9"></polyline></svg>Switch Server</a>
    	<p class="sub-title-p">Choose a category and start exploring</p>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-card">
            <h3 class="uk-card-title index-cate-h3">One Step&nbsp;<span class="uk-label uk-label-success nav-title-v">Extension</span></h3>
            <a href="/onestep"><p class="item-guide">Find Yourself a Paper</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
        </div>
        
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-card">
            <h3 class="uk-card-title index-cate-h3">Cambridge IGCSE</h3>
            <a href="/cate?cate=<?php if($_COOKIE['snapaper_server'] == 4) echo 'Cambridge%20IGCSE'; else echo 'IGCSE'; ?>"><p class="item-guide">Browse All Subjects</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
        </div>
                

        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-card" style="border-color: #ff85c0;">
            <h3 class="uk-card-title index-cate-h3">Cambridge Int'l AS &amp; A Level</h3>
            <a href="/cate?cate=<?php if($_COOKIE['snapaper_server'] == 4) echo 'Cambridge%20International%20AS%20%26%20A%20Levels'; else echo 'A Levels'; ?>">
                <p class="item-guide">Browse All Subjects</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
        </div>
        
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-card" style="padding: 30px;border-color:rgba(0, 172, 237, 0.9);width:47.7%">
            <h3 class="uk-card-title index-cate-h3" style="margin-bottom: 3px;">2019 F/M A-Level Series</h3><a href="/case/?cate=alevel">
                <p class="item-guide" style="margin: 0px;">See What's Available</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
            
        </div>
        
        <div class="uk-card uk-card-default uk-card-hover uk-card-body index-card" style="padding: 30px;border-color:#fbbd01;width:47.7%">
            <h3 class="uk-card-title index-cate-h3" style="margin-bottom: 3px;">2019 F/M IGCSE Series</h3><a href="/case/?cate=igcse>
                <p class="item-guide" style="margin: 0px;">See What's Available</p><i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next" ><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></a>
            
        </div>
            
    </div>
    <div class="sub-title-div2">
        <h1 class="sub-title-div2-h1">Extensions</h1>
    	<p class="sub-title-div2-p">Advanced applications<span class="uk-label uk-label-warning sub-title-div2-span">Developing...</span></p>
    </div>
    
    <div class="uk-card uk-card-default uk-card-hover uk-card-body" style="border-top: 4px solid #03A9F4;width: 47.5%;border-radius: 5px;margin-bottom: 5%;margin-top:2%;display: inline-block;padding-bottom: 50px;">
            <div style="   float: left;">
                <h3 class="uk-card-title index-cate-h3" style="font-size: 2.5rem;">SaveMyExams&nbsp;<span class="uk-label uk-label-success nav-title-v">A-Level Only</span></h3>
                <p style="margin: 0px;margin-left: 3px;">Restricted Area...</p>
            </div>
            <a href="/sme" style="float: right;padding-top: 15px;text-decoration:none;"><p style="margin-top: 15px;">Click Here<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body" style="border-top: 4px solid #fbbd01;width: 47.5%;border-radius: 5px;margin-bottom: 5%;margin-top:2%;display: inline-block;padding-bottom: 50px;margin-left: 2.5%;">
            <div style="   float: left;">
                <h3 class="uk-card-title index-cate-h3" style="font-size: 2.5rem;">Donate to Us</h3>
                <p style="margin: 0px;margin-left: 3px;">If you are feeling comfortable...</p>
            </div>
            <a href="donate" style="float: right;padding-top: 15px;text-decoration:none;"><p style="margin-top: 15px;">Click Here<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
    </div>
    
    <div class="uk-card uk-card-default uk-card-hover uk-card-body" style="border-top: 4px solid #52c41a;width: 47.5%;border-radius: 5px;margin-bottom: 5%;margin-top:-2%;display: inline-block;padding-bottom: 50px;">
            <div style="   float: left;">
                <h3 class="uk-card-title index-cate-h3" style="font-size: 2.5rem;">Cambridge O Level</h3>
                <p style="margin: 0px;margin-left: 3px;">Papers for Cambridge O-Levels...</p>
            </div>
            <a href="/cate?cate=O Levels" style="float: right;padding-top: 15px;text-decoration:none;"><p style="margin-top: 15px;">Click Here<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
    </div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body" style="border-top: 4px solid #673AB7;width: 47.5%;border-radius: 5px;margin-bottom: 5%;margin-top:-2%;display: inline-block;padding-bottom: 50px;margin-left: 2.5%;">
            <div style="   float: left;">
                <h3 class="uk-card-title index-cate-h3" style="font-size: 2.5rem;">About Us</h3>
                <p style="margin: 0px;margin-left: 3px;">Information about this website...</p>
            </div>
            <a href="about" style="float: right;padding-top: 15px;text-decoration:none;"><p style="margin-top: 15px;">Click Here<i class="uk-slidenav-previous uk-icon uk-slidenav uk-slidenav-next"><svg width="14" height="14" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></i></p></a>
    </div>
    
    
    <p class="index-copy">©2018-2019 Snapaper | Made with <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill="none" stroke="#ee561d" stroke-width="1.03" d="M10,4 C10,4 8.1,2 5.74,2 C3.38,2 1,3.55 1,6.73 C1,8.84 2.67,10.44 2.67,10.44 L10,18 L17.33,10.44 C17.33,10.44 19,8.84 19,6.73 C19,3.55 16.62,2 14.26,2 C11.9,2 10,4 10,4 L10,4 Z"></path></svg> by <b><a href="https://www.ouorz.com" target="_blank" style="color:#7c7c7c">TonyHe</a></b> | Sourced from <b><a href="https://www.gceguide.com" target="_blank" style="color:#7c7c7c">GCE Guide</a></b>&nbsp;<a href="//www.dmca.com/Protection/Status.aspx?ID=d417d85d-5eca-456c-a894-c2367440c02b" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w100-5x1-01.png?ID=d417d85d-5eca-456c-a894-c2367440c02b"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script></p>
</div>
    </body>
</html>