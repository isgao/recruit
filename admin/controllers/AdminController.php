<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;

use app\models\Admin;

/**
 * 管理管理员
 */
class AdminController extends Controller
{
	/**
	 * 管理员列表
	 */
	public function actionAdmin_list()
    {
        $query = Admin::find();
        $count = $query->count();
        $pagination = new Pagination([
            'totalCount' => $count,
            'defaultPageSize' => 5
        ]);

        $data['admin'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
        $data['pagination'] = $pagination;

        return $this->render('admin_list',$data);
    }

    /**
     * 添加管理员
     */
    public function actionAdmin_add()
    {
    	$request = Yii::$app->request;
		
		if($request->isPost){
			$username = $request->post('username');
			$password1 = md5($request->post('password1'));
			$password2 = md5($request->post('password2'));

			if($password1 != $password2){
				exit("<script>alert('添加失败');location.href='index.php?r=admin/admin_list'</script>");
			}else{
				$admin = new Admin();
				$admin->username = $username;
				$admin->password = $password1;
				$admin->status = 1;				//账号状态默认待审核
				$admin->add_time = date('Y-m-d H:i:s');
				$res = $admin->save();

				if($res){
					exit("<script>alert('添加成功');location.href='index.php?r=admin/admin_list'</script>");
				}else{
					exit("<script>alert('添加失败');location.href='index.php?r=admin/admin_list'</script>");
				}
			}
		}else{
    		return $this->render('admin_add');
    	}
    }
}
?>