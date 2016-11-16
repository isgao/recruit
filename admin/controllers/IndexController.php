<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\web\User;

/**
 * 后台管理
 * @author Mr.Yuan
 */
class IndexController extends Controller
{
	/**
	 * 首页
	 * @return [type] [description]
	 */
	public function actionIndex()
	{
		//当前登录账户
		$session = Yii::$app->session;
		$admin = $session->get('admin');
		//print_r($admin);
		
		//session 没有账户信息 请先登录
		if(!isset($admin)){
			exit("<script>alert('请先登录');location.href='index.php?r=login/index'</script>");
		}

		//当session 过期时间到  重新登录
		if($admin['expire_time'] < time()){
			exit("<script>alert('账号过期，请重新登录');location.href='index.php?r=login/index'</script>");
		}

		return $this->render('index',$admin);
	}

	/**
	 * 网站设置
	 */
	public function actionSet()
	{
		return $this->render('set');
	}
}
?>