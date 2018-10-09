<?php 
	namespace app\controllers\admin;

	use Yii;
	use app\models\admin\Preferences;
	use yii\web\NotFoundHttpException;

	class PreferencesController extends AdminController {

		public function actionWebsite() {
			$model = Preferences::find()->all();

			return $this->render('preferences', [
				'model' => $model,
			]);
		}

	}
?>