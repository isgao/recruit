<?php

namespace app\controllers;
header("Content-Type:text/html;charset=UTF-8");
use Yii;
use yii\web\Controller;
use app\models\RecUser;
class UsersController extends Controller
{
    public function actionLists0(){
        $new =new  RecUser;
        $arr = $new->find()->where('status!=2')->asArray()->all();
//        var_dump($arr);die;
        return $this->render('lists0',['res'=>$arr]);
    }
    public function actionUpdate(){
        $request = \Yii::$app->request;
        $id = $request->get('id');
        $new =new  RecUser;
        $arr = $new->find()->where(['u_id'=>$id])->one();
        $arr1 = $new->find()->where(['u_id'=>$id])->asArray()->one();
        if($arr1['status']==0){
            $arr->status=1;
            $res = $arr->save();
            if($res){
                return $this->redirect('index.php?r=users/lists0');
            }else{
                echo "修改失败";
            }
        }else if($arr1['status']==1){
            $arr->status=0;
            $res = $arr->save();
            if($res){
                return $this->redirect('index.php?r=users/lists0');
            }else{
                echo "修改失败";
            }
        }
    }

    public function actionDel(){
        $request = \Yii::$app->request;
        $id = $request->get('id');
        $new =new  RecUser;
        $arr = $new->find()->where(['u_id'=>$id])->one();
        $arr->status=2;
        $res = $arr->save();
        if($res){
            return $this->redirect('index.php?r=users/lists0');
        }else{
            echo "删除失败";
        }
    }
    public function actionLists1(){
        $new =new  RecUser;
        $arr = $new->find()->where(['status'=>2])->asArray()->all();
//        var_dump($arr);die;
        return $this->render('lists1',['res'=>$arr]);
    }
    public function actionChu(){
        $request = \Yii::$app->request;
        $id = $request->get('id');
        $new =new  RecUser;
        $arr = $new->find()->where(['u_id'=>$id])->one();
        $arr->status=0;
        $res = $arr->save();
        if($res){
            return $this->redirect('index.php?r=users/lists1');
        }else{
            echo "拉出失败";
        }
    }
    public function actionShan()
    {
        $request = \Yii::$app->request;
        $id = $request->get('id');
        $new = new  RecUser;
        $arr = $new->find()->where(['u_id'=>$id])->one();
        $res = $arr->delete();
        if($res){
            return $this->redirect('index.php?r=users/lists1');
        }else{
            echo "拉出失败";
        }
    }

}