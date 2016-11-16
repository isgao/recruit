<?php
use app\assets\AppAsset;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="<?=Yii::$app->request->baseUrl;?>/assets/js/jquery-1.8.2.min.js"></script>
</head>
<body>
	<div align="center">
		<h2>用户信息</h2>
		<input type="hidden" name="uid" id="uid" value="<?=$user['uid']?>">
		账户 <?=$user['username']?> 
		<br><br>
		您的推广链接 
		<?php if(empty($user['generalize'])):?>
			<span id="url"></span>
			<button id="submit">生成</button>
		<?php else:?>
			<?=$user['generalize']?>
		<?php endif;?>
		<br><br>
		您的访问次数
		<?php if(empty($user['visit'])):?>
			0
		<?php else:?>
			<?=$user['visit']?>
		<?php endif;?>
		<br><br>
		开始时间：<input type="text" name="" id="starttime">&nbsp;~
		结束时间：<input type="text" name="" id="stoptime">
		<button id="inquire">查询</button>
		<br>
		<span id="main"></span>
		<br>
		<a href="<?=URL::toRoute('login/exit')?>">退出登录</a>
	</div>
</body>
</html>
<script>
	//查询推广注册用户
	$("#inquire").click(function(){
		//alert(123);
		var uid = $('#uid').val();
		var starttime = $('#starttime').val();
		var stoptime = $('#stoptime').val();
		var url = "<?=URL::toRoute('login/inquire')?>";
		//console.log(url);

		$.get(url,{uid:uid,starttime:starttime,stoptime:stoptime},function(msg){
			
			var sum = msg.length;
			var rs = '在此时间段共推广了'+sum+'名用户<br/>\
			<table><tr><td></td><td>姓名</td><td>注册时间</td></tr>';
			console.log(msg);
			for(var i=0;i<msg.length;i++){
				rs += '<tr><td></td><td>'+msg[i]["username"]+'</td><td>'+msg[i]["add_time"]+'</td></tr>'
			}
			rs+='</table>';
			$("#main").html(rs);
		},'json')
	})

	//生成链接
	$('#submit').click(function(){
		var uid=$('#uid').val();
		var url="<?=URL::toRoute('login/add_url')?>";

		$.get(url,{uid:uid},function(msg){
			//console.log(msg);
			$("#url").html(msg);
		})
	})
</script>