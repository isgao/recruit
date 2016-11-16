<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>八维招聘管理</title>
    
    <!-- 引入样式文件 -->
    <?php $this->beginContent('@app/views/layouts/import.php');?>
    <?php $this->endContent();?>
</head>
<body>
	<!-- 引入头部信息 -->
	<?php $this->beginContent('@app/views/layouts/header.php');?>
	<?php $this->endContent();?>
	
	<div id="memu">
		<?php $this->beginContent('@app/views/layouts/memu.php');?>
		<?php $this->endContent();?>
	</div>
	<div id="main">
		<?= $content ?>
	</div>
	
	<!-- 引入javascript效果 -->
	<?php $this->beginContent('@app/views/layouts/javascript.php');?>
	<?php $this->endContent();?>

	<!-- 引入底部信息 -->
	<?php //$this->beginContent('@app/views/layouts/footer.php');?>
	<?php //$this->endContent();?>
</body>
</html>

