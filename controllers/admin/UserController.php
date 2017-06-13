<?php

	namespace app\controllers\admin;

	use Yii;
	use yii\web\Controller;

	class UserController extends AdminController {

		public function actionDashboard() {
			$this->view->title = 'User Dashboard';
			return $this->render('_dashboard');
		}

		public function actionLogout() {
			Yii::$app->admin->logout();

			return $this->goHome();
		}
	}