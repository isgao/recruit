<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Message;

class MessageController extends Controller
{
	/**
	 * 首页
	 */
	public function actionIndex()
	{
		$query = Message::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$data['message'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;
		//print_r($data);
		
		return $this->render('index',$data);
	}

	/**
	 * 添加留言
	 */
	public function actionAdd_message()
	{
		//请求组件
		$request = \YII::$app->request;

		$message = new Message();
		$message->name = $request->get('name');
		$message->content = $request->get('content');
		$message->time = date('Y-m-d H:i:s'); 
		$res = $message->save();

		if($res){
			return 'OK';
		}else{
			return 'faild';
		}
	}

	/**
	 * 删除留言
	 */
	public function actionDel_message()
	{
		//请求组件
		$request = \YII::$app->request;

		$id = $request->get('id');

		if(!$id){
			die('删除失败');
		}

		$message = Message::findOne($id);
		$res = $message->delete();

		if($res){
			echo 'OK';
		}else{
			echo 'faild';
		}
	}

	/**
	 * 查询一条留言
	 */
	public function actionSel_one()
	{
		//请求组件
		$request = \YII::$app->request;
		$id = $request->get('id');
		//echo $id;

		$res = Message::find()->where(['id'=>$id])->asArray()->one();
		//print_r($res);
		return json_encode($res);
	}

	/**
	 * 修改留言
	 */
	public function actionModify()
	{
		//请求组件
		$request = \YII::$app->request;

		$id = $request->get('update_id');
		if(!$id){
			die('ID错误');
		}

		$message = Message::findOne($id);
	    $message->name = $request->get('name');
	    $message->time = $request->get('time');
	    $message->content = $request->get('content');
	    $message->time = date('Y-m-d H:i:s');
	    $res = $message->save();
	    if($res)
	    {
	       echo 'OK';
	    }
	}
}
?>