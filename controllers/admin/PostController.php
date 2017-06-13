<?php

	namespace app\controllers\admin;

	use Yii;

	class PostController extends AdminController {

		public function actionIndex() {
			echo Yii::$app->params['adminEmail'];
			echo 'Success';
		}

		public function actionInsert() {
			echo 'Inserted';
		}

	}