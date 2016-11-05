<?php

namespace app\controllers;

header("Content-Type:text/html;charset=UTF-8");
use Yii;
use yii\web\Controller;
use app\models\Rec_admin;
use yii\web\session;

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
    	// var_dump($pwd);

    	$res = new Rec_admin;
    	$check = $res::find()->where(['username'=>$username])->asArray()->one();
    	// var_dump($check);
    	if($check['username'] == $username && $check['password'] == $pwd)
    	{
            $session = Yii::$app->session;
            $session->set('username',$username);
            $session->set('id',$check['admin_id']);
            // $session = Yii::app()->session['username'];
    		// $uname = $session->get('username');
            // $id = $session->get('id');
            // echo $uname;
            // var_dump($id);die;
            return $this->redirect('index.php?r=login/index');
    	}else
    	{
    		echo "<script>alert('账号或密码有误');location.href='index.php?r=login/login';</script>";
    	}
    }

    public function actionExit()
    {
         $session = Yii::$app->session;
          unset($session['username']);
          return $this->redirect('index.php?r=login/login');

    }

}