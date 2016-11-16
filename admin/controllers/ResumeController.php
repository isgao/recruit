<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;

use app\models\Resume;

/**
 * 简历管理
 */
class ResumeController extends Controller
{
    /**
     * 简历列表
     * @return [type] [description]
     */
    public function actionResume_list()
    {
        $query = Resume::find();
        $count = $query->count();
        $pagination = new Pagination([
            'totalCount' => $count,
            'defaultPageSize' => 5
        ]);

        $data['resume'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
        $data['pagination'] = $pagination;

        return $this->render('resume_list',$data);
    }

    
}