<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

/**
 * 周考一
 * @author Mr.Yuan 2016-11-7
 */
class ExamController extends Controller
{

    //不加载layout布局文件
    public $layout=false;

	/**
     * 推广首页
     * @return string
     */
    public function actionIndex($id)
    {
        //echo $id;
        //请求组件
        $request = \Yii::$app->request;

        //根据ID查询数据
        $res = User::find()->where('uid='.$id);
        $data = $res->asArray()->one();
        //print_r($data);

        //获取IP
        $res = Yii::$app->cache->get('ip');
        $ip = $_SERVER["REMOTE_ADDR"];
        if($res != $ip){
            yii::$app->cache->set('ip', $ip, 60*5);
            //更改数据
            $user = User::findOne($data['uid']);
            $user->visit = $data['visit']+1;
            $user->save();
        }
        
        return $this->render('index',$data);
    }

    /**
     * 注册用户
     */
    public function actionEnter()
    {
        //请求组件
        $request = \Yii::$app->request;

        $user = new User();
        $user->username = $request->post('username');
        $user->password = md5($request->post('password'));
        $user->invite_id = $request->post('invite_id');
        $user->add_time = date('Y-m-d H:i:s');
        $res = $user->save();
        if($res){
            echo "<script>alert('注册成功');location.href='index.php?r=login/index'</script>";
        }
    }
}