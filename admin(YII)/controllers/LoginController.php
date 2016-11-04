<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class LoginController extends Controller
{
	public function actionIndex(){
        return $this->render('index');
	}
    public function actionLogin(){
        return $this->render('login');
    }


}