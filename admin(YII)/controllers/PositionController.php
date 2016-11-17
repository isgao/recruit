<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RecPositionCate;

class PositionController extends Controller
{
	public function actionList()
	{
		header("Content-Type:text/html;charset=UTF-8");
		$res = new RecPositionCate;
		$show = $res->find()->asArray()->all();

		$show=$this->digui($show);
		// var_dump($show);die;

        return $this->render('positionShow',['res'=>$show]);
	}


	public function actionAdd()
	{
		// echo 1;
		header("Content-Type:text/html;charset=UTF-8");
		$res = new RecPositionCate;
		$data = $res->find()->where(["parent_id"=>0])->asArray()->all();


		return $this->render('positionAdd',['ress'=>$data]);
	}

	public function actionAddto()
	{
		// echo 1;die;
		header("Content-Type:text/html;charset=UTF-8");
		$request = \Yii::$app->request;
		$pid  = $request->post('pid');
		$username = $request->post('name');
    	$sotr = $request->post('sotr');
    	// $times = date("Y-m-d H:i:s");

    	// var_dump($pid);die;
    	$add = new RecPositionCate;
    	$add->parent_id=$pid;
    	$add->name=$username;
    	$add->sort=$sotr;
    	// $add->add_time=$times;

    	$ress = $add->save();
    	if($ress)
    	{
    		return $this->redirect('index.php?r=position/list');
    	}else
    	{
    		return $this->redirect('index.php?r=position/list');
    	}
	}

	public function actionDelete()
	{
		// echo 1;die;
		$request = \Yii::$app->request;
        $id = $request->get('id');
        // var_dump($id);die;
        // $res = new Rec_admin;
        $del = RecPositionCate::find()->where(['position_cate_id'=>$id])->one();
        // var_dump($del);die;
        $ress = $del->delete();
        // var_dump($ress);die;
        if($ress)
        {
            // echo "成功";
            return $this->redirect('index.php?r=position/list');
        }else
        {
            echo "<script>alert('您的删除有误');location.href='index.php?r=position/list';</script>";
        }
	}


	public function digui($array,$pid=0,$level=0){
        $arr=array();
        foreach($array as $key=>$value){
            if($value['parent_id']==$pid){
                $value['level']=$level;
                $value['space']=str_repeat('&nbsp&nbsp&nbsp&nbsp',$level);
                $arr[]=$value;
                $arr=array_merge($arr,$this->digui($array,$value['position_cate_id'],$level+1));
            }
        }
        return $arr;
    }



/*	public function index(){

		$data = Db::table('nav')->select();
        //print_r($data);die;
        $son = $this->recursion($data,0,0);
        // print_r($son);die;
		return view('nav_list',['son'=>$son]);
	}

	public function recursion($val,$path=0,$flage){
		static $arr=array();
        foreach ($val as $k=>$v) {
            if($v['parent_id']==$path){
            	$v['flage']=$flage;
                $arr[]=$v;
                $this->recursion($val,$v['nav_id'],$flage+1);
            }
        }
        return $arr;
	}
*/

}