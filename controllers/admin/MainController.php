<?php
	namespace app\controllers\admin;
	
	use app\models\AdminLoginForm;
	use Yii;
	use yii\web\Controller;

	class MainController extends Controller {

		public $layout = '@app/views/admin/layout/auth.php';

		private function redirectToDashboard() {
			if (!Yii::$app->admin->isGuest) {
				return $this->redirect(Yii::$app->params['adminUrl'] . 'user/dashboard/');
			}
		}

		public function actionIndex() {
			$this->redirectToDashboard();

			$model = new AdminLoginForm();
			$model->scenario = 'login';
			if ($model->load(Yii::$app->request->post()) && $model->login()) {
				return $this->redirect(Yii::$app->params['adminUrl'] . 'user/dashboard/');
			}

			$this->view->title = 'Login';
			return $this->render('login', [
				'model' => $model,
			]);
		}

		public function actionForgotPassword() {
			$this->redirectToDashboard();

			$model = new AdminLoginForm();
			$model->scenario = 'forgotPassword';
			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				if ($model->resetPassword()) {
					Yii::$app->getSession()->setFlash('smsg', 'Please Check Your Email to Reset Your Password!');
   					return $this->redirect(Yii::$app->params['adminUrl']);
   				} else {
   					Yii::$app->session->setFlash('emsg', 'Sorry, we are unable to reset password for the provided email address.');
   				}
			}

			$this->view->title = 'Forgot Password';
			return $this->render('forgot-password', [
				'model' => $model,
			]);
		}

		public function actionResetPassword() {
			$token = Yii::$app->request->get('token');
			$model = new AdminLoginForm();
			$model->scenario = 'resetPassword';
			$admin_row = AdminLoginForm::findByPasswordResetToken($token);

			if (!$admin_row) {
				return $this->redirect(Yii::$app->params['adminUrl']);
			} else if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				$model->token = $token;
				if ($model->changePassword()) {
					Yii::$app->getSession()->setFlash('smsg', 'Password Changed Successfully!');
   					return $this->redirect(Yii::$app->params['adminUrl']);
   				} else {
   					Yii::$app->session->setFlash('emsg', 'Sorry, we are unable to reset password.');
   				}
			}
			$this->view->title = 'Change Password';
			return $this->render('reset-password', [
				'model' => $model,
				'token' => $token
			]);
		}

	}