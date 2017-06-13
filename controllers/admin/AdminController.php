<?php

	namespace app\controllers\admin;

	use Yii;
	use yii\web\Controller;

	class AdminController extends Controller {

		public $layout = '@app/views/admin/layout/main.php';

		public function beforeAction($bool = true) {
			if ($bool) {
				if (Yii::$app->admin->isGuest) {
					return $this->redirect(Yii::$app->homeUrl . 'site/admin-login');
				}
			}

			return true;
		}

	}