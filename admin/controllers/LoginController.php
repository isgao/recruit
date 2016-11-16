<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;		//用户表
use app\models\Admin;		//管理员表
use yii\db\query;
use yii\web\Session;

/**
 * 后台登录
 * @author Mr.Yuan
 */
class LoginController extends Controller
{	
	//不加载layout布局文件
	public $layout=false;

	/**
	 * 登录页面
	 */
	public function actionIndex()
	{
		return $this->render('login');
	}

	/**
	 * 验证账号
	 */
	public function actionEnter()
	{
		//请求组件
		$request = \YII::$app->request;
		
		//获取管理员信息
		$username = $request->post('username');
		$password = md5($request->post('password'));

		$res = Admin::find()->where('username="'.$username.'" and password="'.$password.'"');
		$data = $res->asArray()->one();
		//print_r($data);die;
		
		if(!empty($data)){
			//管理员ID存储 session
			$session = Yii::$app->session;
			$data = [
				//'uid' => $data['uid'],
				'admin_id' => $data['admin_id'],		//管理员ID
				'username' => $data['username'],		//账户名称
				'expire_time' =>time() + 3600,			//过期时间
			];

			$session->set('admin',$data);				//session 存储

			return $this->redirect(array('index/index'));
			//return $this->redirect('index.php?r=login/sel_user');
		}else{
			exit("<script>alert('登录失败，请联系核实信息后再登录。');location.href='index.php?r=login/index'</script>");
		}
	}

	/**
	 * 用户页面
	 */
	public function actionSel_user()
	{
		$session = Yii::$app->session;

		$admin = $session->get('admin');
		$res = User::find()->where('uid='.$admin['uid']);
		$data['user'] = $res->asArray()->one();
		//print_r($data);
		
		return $this->render('sel_user',$data);
	}

	/**
	 * 查询推广用户
	 */
	public function actionInquire()
	{
		//请求组件
		$request = \Yii::$app->request;

		$uid = $request->get('uid');
		$starttime = $request->get('starttime');
		$stoptime = $request->get('stoptime');

		$user = User::find()->where('invite_id='.$uid.'&& add_time between "'.$starttime.'" and "'.$stoptime.'"')->asArray()->all();
		//print_r($user);
		
		echo json_encode($user);
	}

	/**
	 * 生成推广链接
	 */
	public function actionAdd_url()
	{
		//请求组件
		$request = \Yii::$app->request;

		$uid = $request->get('uid');

		//生成url
		$generalize = 'http://localhost/nine/project/admin/web/index.php?r=exam/index&id='.$uid;
		
		$user = User::findOne($uid);
		$user->generalize = $generalize;
		$res = $user->save();
		if($res){
			echo $generalize;
		}
	}

	/**
	 * 退出登录
	 */
	public function actionExit()
	{
		$session = Yii::$app->session;
		$session->remove('admin');
		exit("<script>alert('您已安全退出');location.href='index.php?r=login/index'</script>");
	}
}

?>