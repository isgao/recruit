<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RecUser;
use app\models\RecResume;
class ResumeController extends Controller
{
    public function actionShow(){
        $com = \Yii::$app->db->createCommand("select * from rec_resume LEFT JOIN rec_user on rec_resume.u_id=rec_user.u_id");
        $ress = $com->queryAll();
       return $this->render('show',['res'=>$ress]);
    }
    public function actionUpdate(){
        $request =\Yii::$app->request;
        $id = $request->get('id');
        $com = \Yii::$app->db->createCommand("select * from rec_resume LEFT JOIN rec_user on rec_resume.u_id=rec_user.u_id where r_id = $id");
        $ress = $com->queryOne();
        return $this->render('update',['res'=>$ress]);
    }
    public function actionDel(){
        $request =\Yii::$app->request;
        $id = $request->get('id');
        $resumes = new RecResume;
        $res =  $resumes->find()->where(['r_id'=>$id])->one();
        //var_dump($res);die;
        $see = $res->delete();
        if($see){
            return $this->redirect('index.php?r=resume/show');
        }else{
            echo '删除失败';
        }
    }
    public function actionUpdatej(){
        $request = \Yii::$app->request;
        $id = $request->post('r_id');
        $position_city = $request->post('ad');
        $resume_status = $request->post('resume_status');
        $user_status = $request->post('user_status');
        //var_dump($user_status);die;
        $new = new RecResume;
        $obj = $new->find()->where(['r_id'=>$id])->one();
        $obj->position_city=$position_city;
        $obj->resume_status=$resume_status;
        $obj->user_status=$user_status;
        $res = $obj->save();
        if($res){
           return $this->redirect('index.php?r=resume/show');
        }else{
            echo "修改失败";
        }
    }
}