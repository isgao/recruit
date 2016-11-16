<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Rec_admin;
use yii\web\session;
/**
 * 后台登录
 */
class LoginController extends Controller
{
    /**
     * 后台主页
     */
	public function actionIndex(){
        return $this->render('index');
	}

    /**
     * 登录页面
     */
    public function actionLogin(){
        return $this->render('login');
    }

    /**
     * 验证账户
     */
    public function actionWelcomed()
    {
    	//echo 1;
        //请求组件
    	$request = \Yii::$app->request;

        //接收信息
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

    /**
     * 安全退出
     */
    public function actionExit()
    {
         $session = Yii::$app->session;
          unset($session['username']);
          return $this->redirect('index.php?r=login/login');
    }

}