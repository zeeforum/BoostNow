<?php

	namespace app\controllers\admin;

	use Yii;
	use yii\web\Controller;
	use yii\helpers\Url;

	class AdminController extends Controller {

		public $layout = '@app/views/admin/layout/main.php';
		public $admin = NULL;
		private $admin_role = NULL;
		private $admin_id = 0;
		/*private $access = [
			'admin' => [
				'createCategory' => true,
				'updateCategory' => true,
				'viewCategory'   => true,
				'deleteCategory' => true,
				'detailCategory' => true,
			],
			'author' => [
				'createCategory' => true,
				'updateCategory' => true,
				'viewCategory'   => true,
				'deleteCategory' => true,
				'detailCategory' => true,
			],
		];*/

		public function beforeAction($bool = true) {
			if ($bool) {
				if (Yii::$app->admin->isGuest) {
					$this->redirect(Yii::$app->params['adminUrl']);
					return false;
				}
			}

			$admin_row = Yii::$app->admin;
			Yii::$app->params['adminId'] = $admin_row->identity->id;
			Yii::$app->params['username'] = $admin_row->identity->username;
			Yii::$app->params['description'] = $admin_row->identity->description;
			Yii::$app->params['adminEmail'] = $admin_row->identity->email;
			$this->admin_role = $admin_row->identity->role;
			$this->admin_id = $admin_row->identity->id;
			$formatter = Yii::$app->formatter;
			Yii::$app->params['date'] = $formatter->asDate($admin_row->identity->created_at, 'long');
			
			if ($admin_row->identity->picture)
				Yii::$app->params['profilePicture'] = Yii::$app->params['base_url'] . 'images/profile/' . $admin_row->identity->picture;

			$this->admin = Yii::$app->params['adminAbsUrl'];
			
			return true;
		}

		/*public function canAccess($key, $arr = NULL) {
			$userRole = isset(Yii::$app->admin->identity->role) ? Yii::$app->admin->identity->role : 'contributor' ;
			$userId = isset(Yii::$app->admin->identity->id) ? Yii::$app->admin->identity->id : 0 ;
			if (isset($this->access[$userRole][$key])) {
				if ($userRole == 'admin' || $userRole == 'editor') {
					return true;
				} else if (isset($arr) && $arr->created_by == $userId) {
					return $userId;
				} else if (!isset($arr) && ($userRole == 'author' || $userRole == 'contributor')) {
					return $userId;
				}
			}

			throw new \yii\web\UnauthorizedHttpException('You are not allowed to access this page');
			return false;
		}*/

		public function redirectTo($url) {
			return $this->redirect(Url::to($url));
		}

		public function setMsg($url, $message, $type = 'success') {
			$msgType = $type == 'success' ? 'smsg' : 'emsg';
			Yii::$app->getSession()->setFlash($msgType, $message);
			return $this->redirectTo($url);
		}
	}