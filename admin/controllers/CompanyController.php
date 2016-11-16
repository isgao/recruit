<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\web\User;

use yii\data\Pagination;

use app\models\Company;
use app\models\Period;
use app\models\Territory;
use app\models\Scale;
use app\models\Tag;

/**
 * 公司管理
 * @author Mr.Yuan
 */
class CompanyController extends Controller
{
	/**
	 * 公司列表
	 */
	public function actionIndex()
	{
		$query = Company::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$data['company'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;

		//查询行业领域
		$data['territory'] = Territory::find()->asArray()->all();

		return $this->render('index',$data);
	}

	/**
	 * 新增公司
	 */
	public function actionCompany_add()
	{
		$request = Yii::$app->request;

		if($request->isPost){
			$company = new Company();
			$company->short_name = $request->post('short_name');
			$company->full_name = $request->post('full_name');
			//$company->logo = $request->post('logo');
			$company->site_url = $request->post('site_url');
			$company->city = $request->post('city');
			$company->period_id = $request->post('period_id');
			$company->investor = $request->post('investor');
			$company->brief_intro = $request->post('brief_intro');
			$company->intro = $request->post('intro');
			$company->status = 1;		//默认待审核
			$res = $company->save();

			if($res){
				exit("<script>alert('添加成功');location.href='index.php?r=company/index'</script>");
			}else{
				exit("<script>alert('添加失败');location.href='index.php?r=company/index'</script>");
			}

		}else{
			//查询发展阶段
			$data['period'] = Period::find()->asArray()->all();

			return $this->render('company_add',$data);
		}
	}

	/**
	 * 公司标签
	 */
	public function actionTag()
	{
		$query = Tag::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$data['tag'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;

		return $this->render('tag',$data);
	}

	/**
	 * 添加公司标签
	 */
	public function actionTag_add()
	{
		$request = Yii::$app->request;
		
		if($request->isPost){
			$tag = new Tag();
			$tag->tag_name = $request->post('tag_name');
			$tag->sort = $request->post('sort');
			$res = $tag->save();

			if($res){
				exit("<script>alert('添加成功');location.href='index.php?r=company/tag'</script>");
			}else{
				exit("<script>alert('添加失败');location.href='index.php?r=company/tag'</script>");
			}
		}else{
			return $this->render('tag_add');
		}
	}

	/**
	 * 删除公司标签
	 */
	public function actionTag_delete()
	{
		$request = Yii::$app->request;

		$id = $request->get('id');

		$tag = Tag::findOne($id);
		$res = $tag->delete();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 公司标签 即点即改
	 */
	public function actionTag_update()
	{
		$request = Yii::$app->request;

		$name = $request->get('name');
		$id = $request->get('id');
		//print_r($name);

		$tag = Tag::findOne($id);
		$tag->name = $name;
		$res = $tag->save();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 公司规模
	 */
	public function actionScale()
	{
		$query = Scale::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$data['scale'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;

		return $this->render('scale',$data);
	}

	/**
	 * 添加公司规模
	 */
	public function actionScale_add()
	{
		$request = Yii::$app->request;
		
		if($request->isPost){
			$min = $request->post('min');
			$max = $request->post('max');

			$scale = new Scale();
			$scale->min = $min;
			$scale->max = $max;
			$scale->add_time = date('Y-m-d H:i:s');
			$res = $scale->save();

			if($res){
				exit("<script>alert('添加成功');location.href='index.php?r=company/scale'</script>");
			}else{
				exit("<script>alert('添加失败');location.href='index.php?r=company/scale'</script>");
			}
		}else{
			return $this->render('scale_add');
		}
	}

	/**
	 * 删除公司规模
	 */
	public function actionScale_delete()
	{
		$request = Yii::$app->request;

		$id = $request->get('id');

		$scale = Scale::findOne($id);
		$res = $scale->delete();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 公司规模 即点即改
	 */
	public function actionScale_update()
	{
		$request = Yii::$app->request;

		$name = $request->get('name');
		$id = $request->get('id');
		//print_r($name);

		$scale = Scale::findOne($id);
		$scale->name = $name;
		$res = $scale->save();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 融资阶段
	 */
	public function actionPeriod()
	{
		$query = Period::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$data['period'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;

		return $this->render('period',$data);
	}

	/**
	 * 新增阶段
	 */
	public function actionPeriod_add()
	{
		$request = Yii::$app->request;
		
		if($request->isPost){
			$name = $request->post('title');

			$period = new Period();
			$period->name = $name;
			$res = $period->save();

			if($res){
				exit("<script>alert('添加成功');location.href='index.php?r=company/period'</script>");
			}else{
				exit("<script>alert('添加失败');location.href='index.php?r=company/period'</script>");
			}
		}else{
			//echo 2;
			return $this->render('period_add');
		}
	}

	/**
	 * 删除融资阶段
	 */
	public function actionPeriod_delete()
	{
		$request = Yii::$app->request;

		$id = $request->get('id');

		$period = Period::findOne($id);
		$res = $period->delete();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 融资阶段 即点即改
	 */
	public function actionPeriod_update()
	{
		$request = Yii::$app->request;

		$name = $request->get('name');
		$id = $request->get('id');
		//print_r($name);

		$period = Period::findOne($id);
		$period->name = $name;
		$res = $period->save();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 行业领域
	 */
	public function actionTerritory()
	{
		$query = Territory::find();
		$count = $query->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'defaultPageSize' => 5
		]);

		$data['territory'] = $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
		$data['pagination'] = $pagination;

		return $this->render('territory',$data);
	}

	/**
	 * 添加行业领域
	 */
	public function actionTerritory_add()
	{
		$request = Yii::$app->request;
		
		if($request->isPost){
			$name = $request->post('industry');

			$territory = new Territory();
			$territory->name = $name;
			$territory->add_time = date('Y-m-d H:i:s',time());
			$res = $territory->save();

			if($res){
				exit("<script>alert('添加成功');location.href='index.php?r=company/territory'</script>");
			}else{
				exit("<script>alert('添加失败');location.href='index.php?r=company/territory'</script>");
			}
		}else{
			return $this->render('territory_add');
		}
	}

	/**
	 * 删除行业领域
	 */
	public function actionTerritory_delete()
	{
		$request = Yii::$app->request;

		$id = $request->get('id');

		$territory = Territory::findOne($id);
		$res = $territory->delete();

		if($res){
			echo 'ok';
		}
	}

	/**
	 * 行业领域 即点即改
	 */
	public function actionTerritory_update()
	{
		$request = Yii::$app->request;

		$name = $request->get('name');
		$id = $request->get('id');
		//print_r($name);

		$territory = Territory::findOne($id);
		$territory->name = $name;
		$res = $territory->save();

		if($res){
			echo 'ok';
		}
	}
}
?>