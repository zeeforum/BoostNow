<?php
	namespace app\controllers\admin;

	use Yii;
	use app\controllers\admin\AdminController;
	use app\models\admin\Profile;
	use yii\web\UploadedFile;

	class UserController extends AdminController {

		public function actionDashboard() {
			$this->view->title = 'User Dashboard';
			return $this->render('_dashboard');
		}

		public function actionProfile() {
			$model = new Profile();
			$model->scenario = 'profileSave';

			if ($model->load(Yii::$app->request->post())) {
				$model->picture = UploadedFile::getInstance($model, 'picture');
				$result = $model->saveProfile();
				if ($result) {
					return $this->setMsg([$this->admin . '/user/profile'], 'Profile Updated Successfully!');
				}
			}
			
			$model->description = Yii::$app->params['description'];

			return $this->render('profile', ['model' => $model]);
		}

		public function actionChangePassword() {
			$model = new Profile();
			$model->scenario = 'changePassword';

			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				if ($model->changePassword()) {
					return $this->setMsg([$this->admin . '/user/change-password'], 'Password Changed Successfully!');
				}
			}

			return $this->render('change-password', ['model' => $model]);
		}

		public function actionLogout() {
			Yii::$app->admin->logout();

			return $this->redirectTo([$this->admin . '/']);
		}
	}