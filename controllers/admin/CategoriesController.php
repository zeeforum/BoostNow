<?php

	namespace app\controllers\admin;

	use Yii;
	use app\models\Categories;

	class CategoriesController extends AdminController {

		public function actionIndex() {
			echo 'Default';
		}

		public function actionFind($id) {
			$category_row = Categories::findOne($id);
			if (!$category_row) {
				return $this->redirect(Yii::$app->params['adminUrl'] . 'categories/');
			} else if ($userId = parent::canAccess('detailCategory', $category_row)) {
				$this->view->title = 'Category Detail';
				return $this->render('detail', ['category_row' => $category_row]);
			}
		}

	}