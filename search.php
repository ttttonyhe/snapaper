<?php require 'header.php' ?>
<!-- 主div 开始 -->
    <div class="uk-container" style="margin-top: 10%;">
    <!-- 信息内容开始 -->
    <div class="sub-title-div" style="margin-bottom:60px;display: flex;">
    <div style="
    width: 90%;
">
        <h1 class="sub-title-h1"><?php echo $_GET['cate']; ?></h1>
    	<p class="sub-title-p">Set up options to quickly find a paper in <?php echo $_GET['cate']; ?></p>
    </div>
    <div style="text-align: right;padding-top: 30px;">
        <a onclick="history.go(-1);"><svg width="40" height="40" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="uk-icon uk-svg" style="margin-right: 15px;color: #333;margin-top: -1px;"><line fill="none" stroke="#000" x1="5.5" y1="9.5" x2="15" y2="9.5"></line><line fill="none" stroke="#000" x1="5" y1="1.5" x2="9" y2="1.5"></line><polyline fill="none" stroke="#000" stroke-width="1.03" points="8.5,6.5 5.5,9.5 8.5,12.5"></polyline><polyline fill="none" stroke="#000" points="12.5,7 12.5,2.5 9.5,2.5 9.5,3.5 4.5,3.5 4.5,2.5 1.5,2.5 1.5,15.5 12.5,15.5 12.5,12"></polyline></svg></a>
    </div>
    </div>
    <!-- 信息内容结束 -->
    
<?php
//获取学科代号(确定试卷代码)
function get_sub_num($str){
    $result = array();
    preg_match_all("/([^(]+)$/",$str, $result); //匹配最后一个前括号，获取之后的内容
    return rtrim($result[1][0], ")"); //删除最后一个后括号
}
?>


<?php
//Composer 依赖
require 'vendor/autoload.php';
use QL\QueryList;

/* 获取服务器源 */
$com0 = 'https://papers.gceguide.com';
$xyz1 = 'https://papers.gceguide.xyz';
if(!isset($_COOKIE['snapaper_server'])){
    $source = $com0;
}else{
	$source = $_COOKIE['snapaper_server'];
	if($source == 0){
    	$source = $com0;
	}elseif($source == 1){
		$source = $xyz1;
	}else{
		$source = $com0;
	}
}
/* 结束获取服务器源 */

?>

<script>
    var stepto = function(){
        var cate = '<?php echo $_GET['cate']; ?>';
        var sub = $('#subject').val();
        var subject = $("#subject").find("option:selected").text();
        var year = $('#year').val();
        var mon = $('#month').val();
        var type = $('#type').val();
        var pap = $('#paper').val();
        var url = '<?php echo $source; ?>/' + cate + '/' + subject + '/' + sub + '_' + mon + year + '_' + type + '_' + pap + '.pdf';
        window.open(url);
    }
</script>

<?php
//判断用户名是否输入
if( !empty($_GET['cate']) ) {
    
    $cate = $_GET['cate'];
    $url = $source.'/'.$cate;//生成查询页面
    $html = file_get_contents($url);
    $data = QueryList::html($html)->rules([
    'name' => ['tr>td>a','text']
    ])->query()->getData();
    $user_data = $data->all(); //获取查询数据
?>
<div style="display:flex">
<div style="width:50%;margin-bottom:10%">
<div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Subject</label>
        <div class="uk-form-controls">
<select id="subject" class="uk-select">
<?php 
    if(!empty($user_data)){ //开始读取数据 
    for($i=0;$i<count($user_data);$i++){ //循环获取数据
?>
            <option value="<?php echo get_sub_num($user_data[$i]['name']); ?>"><?php echo $user_data[$i]['name']; ?></option>
<?php }} ?>
</select>
        </div>
    </div>
<?php } ?>

<div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Year Number</label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" id="year" placeholder="ex. 11,09,18...">
        </div>
</div>

<div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Month</label>
        <div class="uk-form-controls">
<select id="month" class="uk-select">
    <option value="m">March</option>
    <option value="s">May/June</option>
    <option value="w">Oct/Nov</option>
</select>
        </div>
    </div>


<div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-select">Type</label>
        <div class="uk-form-controls">
<select id="type" class="uk-select">
    <option value="qp">Question Paper</option>
    <option value="ms">Mark Scheme</option>
</select>
</div>
    </div>
    
<div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-text">Paper Number</label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" id="paper" placeholder="ex. 11,22,71...">
        </div>
</div>

<input class="uk-button uk-button-default" type="submit" value="Find" onclick="stepto();">
    </div>
    <div style="width: 35%;display: inline-block;margin-left: 10%;">
    <h3 style="font-weight: 600;margin-bottom: 10px;font-size: 2rem;">Notice</h3>
    <p style="margin: 0px;">We cannot guarantee the validity of the paper you search, and some papers will not be found after your submit. For example, the March papers for subjects that doesn't have exams in March.</p>
</div>
</div>
</div>
<!-- 主div 结束 -->
    </body>
</html>