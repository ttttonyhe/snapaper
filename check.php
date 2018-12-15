<html>
    <head>
        <meta charset="UTF-8">
        <title>RainBow Six Siege | 战绩面板</title>
        <link href="https://static.zeo.im/uikit.min.css" rel="stylesheet">
        <link href="https://static.zeo.im/uikit-rtl.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://static.zeo.im/uikit.min.js"></script>
    </head>
<body>
    
    <style>
        .name{
            font-weight: 600;
            background: #333;
            color: #fff !important;
            padding: 2px 10px;
            text-align: center;
            border-top: 2px solid #a94442;
        }
        .value{
            font-size: 1.7rem;
        }
    </style>

<?php
//Composer 依赖
require 'vendor/autoload.php';
use QL\QueryList;

//判断用户名是否输入
if( !empty($_POST['user_name']) ) {

    $user_name = $_POST['user_name'];
    $user_type = $_POST['game_type'];
    $url = 'https://r6stats.com/stats/uplay/'.$user_name.'/'.$user_type;//生成查询页面
    $html = file_get_contents($url);

    $data = QueryList::html($html)->rules([
        'value' => ['.content','text','-.title'],
        'name' => ['.content','text','-.value -.hidden-md'],
        'subname' => ['td','text']
    ])->query()->getData();
    $user_data = $data->all(); //获取查询数据
    
    //判断数据查询结果是否为空
    if(!empty($user_data)){
        
        //输出头部信息
        echo '<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m" style="margin-left:  auto;margin-right:  auto;margin-bottom: 50px;margin-top: 80px;text-align:  center;padding-bottom: 55px;"><h3 class="uk-card-title" style="font-size: 2.5rem;font-weight: 500;margin-bottom: 5px;">'.$user_name.'</h3><p style="margin-top: 0px;font-weight: 300;">彩虹六号:围攻战绩</p></div>';
        
?>

<div style="width: 70%;margin-right: auto;display: -webkit-box;text-align: center;margin-left: 13.2%;margin-bottom: 20px;">
<?php 
        for($i=0;$i<4;$i++){
            echo '<div style="margin-left:10px" class="uk-card uk-card-default uk-card-body uk-width-1-4@m"><h3 class="uk-card-title name">'.$user_data["$i"]['name'].'</h3>'.'<p class="value">'.$user_data["$i"]['value'].'</p></div>';
        }    
?>
</div>

<div style="width: 70%;margin-right: auto;display: -webkit-box;text-align: center;margin-left: 13.2%;">
<?php 
        for($i=4;$i<8;$i++){
            echo '<div style="margin-left:10px" class="uk-card uk-card-default uk-card-body uk-width-1-4@m"><h3 class="uk-card-title name">'.$user_data["$i"]['name'].'</h3>'.'<p class="value">'.$user_data["$i"]['value'].'</p></div>';
        }    
?>
</div>


<div style="display: flex;height: 50px;padding-top: 40px;">
    <h2 style="margin: 0px;width: 50%;margin-left: 13.7%;">Overall Stats</h2>
    <h2 style="margin: 0;width: 69%;">Weapon Based Stats</h2>
</div>

<div style="display:flex;margin-bottom:50px">
<table class="uk-table uk-table-hover uk-table-divider" style="margin-left: 13%;width: 36.5%;">
    <thead>
        <tr>
            <th style="text-align:left">Stat</th>
            <th style="text-align:left">Value</th>
        </tr>
    </thead>
    <tbody>
       <?php for($i=0;$i<10;$i++){ ?>
        <tr>
            <td><?php echo $user_data[$i]['subname']; ?></td>
            <td><?php echo $user_data[$i+1]['subname']; ?></td>
        </tr>
        <?php $i=$i+1; } ?>
    </tbody>
</table>

<table class="uk-table uk-table-hover uk-table-divider" style="margin-top: 0px;border-left: 2px solid #eee;width: 36%;">
    <thead>
        <tr>
            <th style="text-align:left">Stat</th>
            <th style="text-align:left">Value</th>
        </tr>
    </thead>
    <tbody>
       <?php for($i=10;$i<20;$i++){ ?>
        <tr>
            <td><?php echo $user_data[$i]['subname']; ?></td>
            <td><?php echo $user_data[$i+1]['subname']; ?></td>
        </tr>
        <?php $i=$i+1; } ?>
    </tbody>
</table>
</div>
       
        
<?php }else{
        echo '<div style="display: flex;text-align:center"><div style="display: flex;margin-left: auto;margin-right: auto;margin-top: 50px;"><h3 style="margin: 0;">查询出错</h3><br/><button style="margin-left: 20px;" onclick="javascript:history.go(-1);" class="uk-button uk-button-secondary">点此返回</nutton></div></div>';
    }
    
}else{
    echo '<div style="display: flex;text-align:center"><div style="display: flex;margin-left: auto;margin-right: auto;margin-top: 50px;"><h3 style="margin: 0;">查询出错</h3><br/><button style="margin-left: 20px;" onclick="javascript:history.go(-1);" class="uk-button uk-button-secondary">点此返回</nutton></div></div>';
}
?>

    </body>
</html>
