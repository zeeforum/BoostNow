<?php

	namespace app\controllers\admin;

	use Yii;
	use app\models\Categories;
	use yii\helpers\Url;

	class CategoriesController extends AdminController {

		public function actionIndex() {
			echo 'Default';
		}

		public function actionFind($id) {
			$category_row = Categories::findOne($id);
			if (!$category_row) {
				return $this->redirect(Yii::$app->params['adminUrl'] . 'categories/');
			} 
			Yii::$app->admin->can('updatePost', ['post' => $category_row]);
			if (Yii::$app->admin->can('updatePost', ['post' => $category_row])) {
			    die('Access Granted!');
			}
			die('Access Denied!');

			/*else if ($userId = parent::canAccess('detailCategory', $category_row)) {
				$this->view->title = 'Category Detail';
				return $this->render('detail', ['category_row' => $category_row]);
			}*/
		}

	}