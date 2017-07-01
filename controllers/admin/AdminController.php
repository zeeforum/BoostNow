<?php

	namespace app\controllers\admin;

	use Yii;
	use yii\web\Controller;

	class AdminController extends Controller {

		public $layout = '@app/views/admin/layout/main.php';

		public function beforeAction($bool = true) {
			if ($bool) {
				if (Yii::$app->admin->isGuest) {
					$this->redirect(Yii::$app->params['adminUrl']);
					return false;
				}
			}
			$admin_row = Yii::$app->admin;
			Yii::$app->params['username'] = $admin_row->identity->username;
			Yii::$app->params['description'] = $admin_row->identity->description;
			Yii::$app->params['adminEmail'] = $admin_row->identity->email;
			$formatter = Yii::$app->formatter;
			Yii::$app->params['date'] =$formatter->asDate($admin_row->identity->created_at, 'long');
			Yii::$app->params['profilePicture'] = $admin_row->identity->picture;
			return true;
		}

	}