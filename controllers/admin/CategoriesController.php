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
			} else if (Yii::$app->admin->can('updateOwnPost', ['post' => $category_row])) {
				//print_r($category_row);
				die('yes');
			}
			die('no');
		}

	}