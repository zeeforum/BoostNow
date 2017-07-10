<?php

	namespace app\controllers\admin;

	use Yii;
	use app\models\Categories;

	class CategoriesController extends AdminController {

		public function actionIndex() {
			$admin_id = Yii::$app->admin->can('categories');
			$categories_model = new Categories();
			$categories_rows = Categories::find()->all();
			return $this->render('categories', [
				'categories_rows' => $categories_rows,
				'model' => $categories_model,
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
			$categories_model = new Categories();

			if ($categories_model->load(Yii::$app->request->post()) && $categories_model->validate() && $categories_model->is_ajax()) {

			}
		}

	}