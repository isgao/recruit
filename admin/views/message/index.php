<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;		//分页
?>
<!DOCTYPE html>
<html>
<head>
	<title>留言板</title>
	<?=Html::cssFile('@web/css/ui-dialog.css')?>
	<?=Html::jsFile('@web/js/jquery-1.10.2.js')?>
	<?=Html::jsFile('@web/js/template.js')?>
	<?=Html::jsFile('@web/js/dialog-min.js')?>
</head>
<body>
	<div align="center">
		<h2>留言板</h2>
		<button onclick="message()">留言</button>
		<br><br>
		<table border="1">
			<colgroup>
				<col width="50px" />
				<col width="100px" />
				<col width="200px" />
				<col width="200px"/>
				<col width="100px" />
			</colgroup>
			<tr align="center">
				<td>序号</td>
				<td>署名</td>
				<td>时间</td>
				<td>详情</td>
				<td>操作</td>
			</tr>
			<?php foreach($message as $k=>$v):?>
			<tr align="center">
				<td><?=$v['id']?></td>
				<td><?=$v['name']?></td>
				<td><?=$v['time']?></td>
				<td><?=$v['content']?></td>
				<td>
					<a href="javascript:modify(<?=$v['id']?>)">修改</a>
					<a href="javascript:del(<?=$v['id']?>)">删除</a>
				</td>
			</tr>
		<?php endforeach ?>
		</table>
		<?=LinkPager::widget(['pagination' => $pagination])?>
	</div>
</body>
<script id="test" type="text/html">
	<form name="message">
		<table border="0">
			<tr>
				<td>署名：</td>
				<td><input type="text" name="name" value="{{name}}"></td>
			</tr>
			<tr>
				<td>内容：</td>
				<td><textarea name='content'>{{content}}</textarea></td>
			</tr>
			<input type="hidden" name="update_id" value="{{id}}">
		</table>
	</form>
</script>
<script type="text/javascript">
	var test = template('test');

	//添加留言
	function message()
	{
		dialog({
			title:'留言板',
		    content:test,
		    okValue:'确定',
		    ok:function(){
		    	var data = $("form[name='message']").serialize();
		    	//console.log(data);
		    	
		        $.ajax({
		        	url: "<?=Url::to(['message/add_message']) ?>",
		        	type: 'get',
		        	data: data,
		        	success:function(msg){
		        		if (msg){
		        			alert('留言成功');
		        			window.location.href='<?=Url::to(["message/index"]) ?>';
		        		}else{
		        			alert('留言失败');
		        		}
		        	}
		        })
		    },
		    cancelValue: '取消',
		    cancel: function () {}
		}).show();
	}

	//删除留言
	function del(id){
		$.ajax({
			url:"<?=Url::to(['message/del_message']) ?>",
			type: 'get',
			data: {id:id},
			success:function(msg){
				if(msg){
					alert('删除成功');
					window.location.href='<?=Url::to(["message/index"]) ?>';
				}else{
					alert('删除失败');
				}
			}
		})
	}

	//修改留言
	function modify(id){
		$.getJSON('<?=Url::to(["message/sel_one"])?>',{id:id},function(msg){
			console.log(msg);
			var data = template('test',msg);
			dialog({
				title: '修改留言',
			    content: data,
			    okValue: '确定',
			    ok: function () {
			    	var messages = $("form[name='message']").serialize();
			        $.ajax({
			        	url: "<?=Url::to(['message/modify']) ?>",
			        	type: 'get',
			        	data: messages,
			        	success:function(msg)
			        	{
			        		//console.log(msg);
			        		if (msg){
			        			alert('修改成功');
			        			window.location.href='<?=Url::to(["message/index"]) ?>';
			        		}else{
			        			alert('修改失败');
			        		}
			        	}
			        })
			    },
			    cancelValue: '取消',
			    cancel: function () {}
			}).show();
		});
	}
</script>
</html>