
<?php

use app\assets\AppAsset;
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>招聘网 后台登录</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/assets/css/reset.css">
        <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/assets/css/supersized.css">
        <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="page-container">
            <h1>后台管理登录</h1>
            <form action="<?=URL::toRoute('login/enter')?>" method="post">
            <input type="hidden" name="_csrf" id="_csrf" value="<?= Yii::$app->request->csrfToken?>"/>
                <input type="text" name="username" class="username" placeholder="请输入正确账号">
                <input type="password" name="password" class="password" placeholder="请输入密码">
                <button type="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
<!--                <p>-->
<!--                    <a class="facebook" href=""></a>-->
<!--                    <a class="twitter" href=""></a>-->
<!--                </p>-->
            </div>
        </div>
        <!-- Javascript -->
        <script src="<?=Yii::$app->request->baseUrl;?>/assets/js/jquery-1.8.2.min.js"></script>
        <script src="<?=Yii::$app->request->baseUrl;?>/assets/js/supersized.3.2.7.min.js"></script>
        <script src="<?=Yii::$app->request->baseUrl;?>/assets/js/supersized-init.js"></script>
        <script src="<?=Yii::$app->request->baseUrl;?>/assets/js/scripts.js"></script>

    </body>

</html>

