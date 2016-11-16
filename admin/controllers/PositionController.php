<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;

use app\models\Position;
use app\models\Position_cate;
use app\models\Experience;
use app\models\Education;

/**
 * 岗位管理
 * @author Mr.Yuan
 */
class PositionController extends Controller
{
	/**
	 * 教育经历
	 */
	public function actionEducation()
	{
		$query = Education::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$data['education'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;

		return $this->render('education',$data);
	}

	/**
	 * 添加教育经历
	 */
	public function actionEducation_add()
	{
		$request = Yii::$app->request;
		
		if($request->isPost){
			$education = new Education();
			$education->school_name = $request->post('school_name');
			$education->major = $request->post('major');
			$education->degree = $request->post('degree');
			$education->graduate_year = $request->post('graduate_year');
			$res = $education->save();

			if($res){
				exit("<script>alert('添加成功');location.href='index.php?r=position/education'</script>");
			}else{
				exit("<script>alert('添加失败');location.href='index.php?r=position/education'</script>");
			}
		}else{
			return $this->render('education_add');
		}
	}

	/**
	 * 删除教育经历
	 */
	public function actionEducation_delete()
	{
		$request = Yii::$app->request;

		$id = $request->get('id');

		$education = Education::findOne($id);
		$res = $education->delete();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 教育经历 即点即改
	 */
	public function actionEducation_update()
	{
		$request = Yii::$app->request;

		$name = $request->get('name');
		$id = $request->get('id');
		//print_r($name);

		$education = Education::findOne($id);
		$education->name = $name;
		$res = $education->save();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 工作经验
	 */
	public function actionExperience()
	{
		$query = Experience::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$data['experience'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;

		return $this->render('experience',$data);
	}

	/**
	 * 添加工作经验
	 */
	public function actionExperience_add()
	{
		$request = Yii::$app->request;
		
		if($request->isPost){
			$experience = new Experience();
			$experience->name = $request->post('name');
			$experience->add_time = date('Y-m-d H:i:s');
			$res = $experience->save();

			if($res){
				exit("<script>alert('添加成功');location.href='index.php?r=position/experience'</script>");
			}else{
				exit("<script>alert('添加失败');location.href='index.php?r=position/experience'</script>");
			}
		}else{
			return $this->render('experience_add');
		}
	}

	/**
	 * 删除工作经验
	 */
	public function actionExperience_delete()
	{
		$request = Yii::$app->request;

		$id = $request->get('id');

		$experience = Experience::findOne($id);
		$res = $experience->delete();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 工作经验 即点即改
	 */
	public function actionExperience_update()
	{
		$request = Yii::$app->request;

		$name = $request->get('name');
		$id = $request->get('id');
		//print_r($name);

		$experience = Experience::findOne($id);
		$experience->name = $name;
		$res = $experience->save();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 岗位列表
	 */
	public function actionPosition()
	{
		$query = Position::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$data['position'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;

		return $this->render('position',$data);
	}

	/**
	 * 岗位类型
	 */
	public function actionCate()
	{
		$query = Position_cate::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$cate = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;

		foreach($cate as $key=>$val){
			foreach($cate as $k=>$v){
				if($v['parent_id'] == $val['position_cate_id']){
					$cate[$k]['level']=1;
				}
			}
		}
		$data['cate'] = $cate;
		//print_r($cate);
		return $this->render('cate',$data);
	}

	/**
	 * 新增岗位
	 */
	public function actionCate_add()
	{
		$request = Yii::$app->request;
		
		if($request->isPost){
			$position_cate = new Position_cate();
			$position_cate->parent_id = $request->post('parent_id');
			$position_cate->name = $request->post('cate');
			$position_cate->sort = $request->post('sort');
			$res = $position_cate->save();

			if($res){
				exit("<script>alert('添加成功');location.href='index.php?r=position/cate'</script>");
			}else{
				exit("<script>alert('添加失败');location.href='index.php?r=position/cate'</script>");
			}
		}else{
			$data['parent'] = Position_cate::find()->where("`parent_id`=0")->asArray()->all();
			//print_r($cate);
			return $this->render('cate_add',$data);
		}
	}
}
?>