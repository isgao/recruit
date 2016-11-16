<?php
use app\assets\AppAsset;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>推广页面</title>
</head>
<body>
    <div align="center">
        <?=$username?>的推广页面
        
        <form action="<?=URL::toRoute('exam/enter')?>" method="post">
        <input type="hidden" value="<?=$uid?>" name="invite_id">
       	<table>
       		<tr>
       			<td>账户：</td>
       			<td><input type="text" name="username"></td>
       		</tr>
       		<tr>
       			<td>密码：</td>
       			<td><input type="password" name="password"></td>
       		</tr>
       		<tr>
       			<td><input type="submit" value="提交"></td>
       			<td></td>
       		</tr>
       	</table>
       	</form>
        <br>
    </div>
</body>
</html>