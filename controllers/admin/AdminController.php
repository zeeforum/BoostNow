<?php

	namespace app\controllers\admin;

	use Yii;
	use yii\web\Controller;

	class AdminController extends Controller {

		public $layout = '@app/views/admin/layout/main.php';
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
			Yii::$app->params['username'] = $admin_row->identity->username;
			Yii::$app->params['description'] = $admin_row->identity->description;
			Yii::$app->params['adminEmail'] = $admin_row->identity->email;
			$formatter = Yii::$app->formatter;
			Yii::$app->params['date'] =$formatter->asDate($admin_row->identity->created_at, 'long');
			Yii::$app->params['profilePicture'] = $admin_row->identity->picture;
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

	}