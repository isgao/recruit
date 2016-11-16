<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;

use app\models\User;

/**
 * 求职者管理
 */
class UserController extends Controller
{
	/**
	 * 求职者列表
	 */
	public function actionUser_list()
	{
		$query = User::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$data['user'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;

		return $this->render('user_list',$data);
	}
}
?>