<?php

namespace app\controllers;

header("Content-Type:text/html;charset=UTF-8");
use Yii;
use yii\web\Controller;
use app\models\Rec_admin;

class LoginController extends Controller
{
	public function actionIndex(){
        return $this->render('index');
	}
    public function actionLogin(){
        return $this->render('login');
    }


    public function actionWelcomed()
    {
    	// echo 1;
    	$request = \Yii::$app->request;
    	$username = $request->post('username');
    	$pwd = MD5($request->post('password'));
    	$times = date("Y-m-d H:i:s");
    	// var_dump($pwd);
    	$res = new Rec_admin;
    	$check = $res::find()->asArray()->one();
    	// var_dump($check);
    	if($check['username'] == $username && $check['password'] == $pwd)
    	{
    		return $this->redirect('index.php?r=login/index');
    	}else
    	{
    		echo "<script>alert('账号或密码有误');location.href='index.php?r=login/login';</script>";
    	}
    }

}