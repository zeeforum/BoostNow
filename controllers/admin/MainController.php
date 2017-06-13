<?php

	namespace app\controllers\admin;
	use app\models\AdminLoginForm;

	use Yii;
	use yii\web\Controller;

	class MainController extends Controller {

		public $layout = '@app/views/admin/layout/auth.php';

		public function actionLogin() {
			if (!Yii::$app->admin->isGuest) {
				return $this->redirect(Yii::$app->params['adminUrl'] . 'user/dashboard/');
			}

			$model = new AdminLoginForm();
			if ($model->load(Yii::$app->request->post()) && $model->login()) {
				return $this->redirect(Yii::$app->params['adminUrl'] . 'user/dashboard/');
			}
			return $this->render('login', [
				'model' => $model,
			]);
		}

	}