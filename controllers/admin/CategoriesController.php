<?php

	namespace app\controllers\admin;

	use Yii;
	use app\models\admin\Categories;
	use app\models\admin\CategoriesSearch;
	use yii\web\NotFoundHttpException;

	class CategoriesController extends AdminController {

		public function actionIndex() {
			$searchModel = new CategoriesSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->get());

			return $this->render('categories', [
				'dataProvider' => $dataProvider,
				'searchModel' => $searchModel,
			]);
		}

		public function actionFind($id) {
			$category_row = Categories::findOne($id);
			if (!$category_row) {
				return $this->redirect(Yii::$app->params['adminUrl'] . 'categories/');
			} 
			$admin_id = Yii::$app->admin->can('updatePost', ['post' => $category_row]);
			if ($admin_id) {
				
			}
			die('Access Denied!');
			/*else if ($userId = parent::canAccess('detailCategory', $category_row)) {
				$this->view->title = 'Category Detail';
				return $this->render('detail', ['category_row' => $category_row]);
			}*/
		}

		public function actionAdd() {
			$model = new Categories();
			$categories_rows = Categories::find()->all();

			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				$model->draft = $model->draft;
				$model->created_by = Yii::$app->params['adminId'];
				$result = $model->save();
				if ($result) {
					return $this->setMsg([$this->admin . 'categories/'], 'Category Added Successfully!');
				} else {
					return $this->setMsg([$this->admin . 'categories/add'], Yii::$app->params['errorMessage'], 'error');
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
			$model = Categories::findOne($id);
			
			if ($model === null) {
				throw new NotFoundHttpException;
			}

			return $this->render('view', [
				'model' => $model,
			]);
		}

		public function actionUpdate($id) {
			$model = Categories::findOne($id);
			
			if ($model === null) {
				throw new NotFoundHttpException;
			}

			$categories_rows = Categories::find()->all();

			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				$model->draft = $model->draft;
				$result = $model->save();
				if ($result) {
					return $this->setMsg([$this->admin . 'categories/'], 'Category Updated Successfully!');
				} else {
					return $this->setMsg([$this->admin . 'categories/update/' . $id], Yii::$app->params['errorMessage'], 'error');
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
				return $this->setMsg([$this->admin . 'categories/'], 'Category Deleted Successfully!');
			} else {
				return $this->setMsg([$this->admin . 'categories/update/' . $id], Yii::$app->params['errorMessage'], 'error');
			}
		}

	}