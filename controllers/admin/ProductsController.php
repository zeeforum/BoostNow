<?php
	namespace app\controllers\admin;

	use Yii;
	use app\models\admin\Products;
	use app\models\admin\Categories;
	use yii\web\NotFoundHttpException;
	use yii\data\Pagination;

	class ProductsController extends AdminController {

		public function actionIndex() {
			$searchModel = new Products();
			$searchModel->scenario = 'search';
			$productsQuery = Products::find();

			if ($searchModel->load(Yii::$app->request->get()) && $searchModel->validate()) {
				if ($searchModel->name != '') {
					$productsQuery->where(['like', 'name', $searchModel->name]);
				}
				
				if ($searchModel->category_id > 0) {
					$productsQuery->where(['category_id' => $searchModel->category_id]);
				}

				if ($searchModel->draft != '') {
					$productsQuery->where(['draft' => $searchModel->draft]);
				}
			}

			$pages = new Pagination([
				'totalCount' => $productsQuery->count(),
				'pageSize' => 30,
			]);
			$model = $productsQuery->offset($pages->offset)->limit($pages->limit)->all();
			$categories_rows = Categories::find()->all();

			return $this->render('products', [
				'searchModel' => $searchModel,
				'model' => $model,
				'pages' => $pages,
				'categories_rows' => $categories_rows,
			]);
		}

		public function actionAdd() {
			$model = new Products();
			$categories_rows = Categories::find()->all();

			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				$model->draft = $model->draft;
				$model->created_by = Yii::$app->params['adminId'];
				$result = $model->save();
				if ($result) {
					return $this->setMsg([$this->admin . 'products/'], 'Product Added Successfully!');
				} else {
					return $this->setMsg([$this->admin . 'products/add'], Yii::$app->params['errorMessage'], 'error');
				}
			}

			if (!$model->draft) {
				$model->draft = 'no';
			}

			return $this->render('add', [
				'categories_rows' => $categories_rows,
				'model' => $model,
			]);
		}

		public function actionView($id) {
			$model = Products::findOne($id);
			
			if ($model === null) {
				throw new NotFoundHttpException;
			}

			return $this->render('view', [
				'model' => $model,
			]);
		}

		public function actionUpdate($id) {
			$model = Products::findOne($id);
			
			if ($model === null) {
				throw new NotFoundHttpException;
			}

			$categories_rows = Categories::find()->all();

			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				$model->draft = $model->draft;
				$result = $model->save();
				if ($result) {
					return $this->setMsg([$this->admin . 'products/'], 'Product Updated Successfully!');
				} else {
					return $this->setMsg([$this->admin . 'products/update/' . $id], Yii::$app->params['errorMessage'], 'error');
				}
			}

			if (!$model->draft) {
				$model->draft = 'no';
			}

			return $this->render('add', [
				'categories_rows' => $categories_rows,
				'model' => $model,
				'command' => 'edit',
			]);
		}

		public function actionDelete($id) {
			$model = Categories::findOne($id);

			if ($model === null) {
				throw new NotFoundHttpException;
			}

			$result = $model->delete();
			if ($result) {
				return $this->setMsg([$this->admin . 'products/'], 'Product Deleted Successfully!');
			} else {
				return $this->setMsg([$this->admin . 'products/update/' . $id], Yii::$app->params['errorMessage'], 'error');
			}
		}

	}