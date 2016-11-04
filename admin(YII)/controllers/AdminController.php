<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Rec_admin;

class AdminController extends Controller
{
	public function actionIndex()
	{
        $res = new Rec_admin;
		$show = $res->find()->asArray()->all();
		// var_dump($show);
		
        return $this->render('index',['res'=>$show]);
	}

	public function actionDelete()
	{
		// echo 1;
		$request = \Yii::$app->request;
        $id = $request->get('id');
        // var_dump($id);die;
        // $res = new Rec_admin;
        $del = Rec_admin::find()->where(['admin_id'=>$id])->one();
        // var_dump($del);die;
        $ress = $del->delete();
        // var_dump($ress);die;
        if($ress)
        {
            // echo "成功";
            return $this->redirect('index.php?r=admin/index');
        }else
        {
            echo "<script>alert('您的删除有误');location.href='index.php?r=admin/index';</script>";
        }
	}

	public function actionAdd()
	{
		// echo 1;
		return $this->render('add');
	}


	public function actionPlus()
	{
		// echo 1;die;
		header("Content-Type:text/html;charset=UTF-8");
		$request = \Yii::$app->request;
		$username = $request->post('uname');
    	$pwd = MD5($request->post('pwd'));
    	$times = date("Y-m-d H:i:s");

    	$add = new Rec_admin;
    	$add->username=$username;
    	$add->password=$pwd;
    	$add->add_time=$times;

    	$ress = $add->save();
    	if($ress)
    	{
    		return $this->redirect('index.php?r=admin/index');
    	}else
    	{
    		return $this->redirect('index.php?r=admin/index');
    	}
	}
}
?>