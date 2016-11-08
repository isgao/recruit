<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RecExperience;

class ExperienceController extends Controller
{
	public function actionList()
	{
        $res = new RecExperience;
		$show = $res->find()->asArray()->all();
		// var_dump($show);
		
        return $this->render('list',['res'=>$show]);
	}

	public function actionAdd()
	{
		return $this->render('add');
	}

	public function actionAddto()
	{
		header("Content-Type:text/html;charset=UTF-8");
		$request = \Yii::$app->request;
		$username = $request->post('username');
		// var_dump($username);
		$res = new RecExperience;
		$res->name=$username;
		$add = $res->save();
		if($add)
		{
			return $this->redirect('index.php?r=experience/list');
		}else
		{
			return $this->redirect('index.php?r=experience/list');
		}
	}
}