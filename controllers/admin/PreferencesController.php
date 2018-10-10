<?php 
	namespace app\controllers\admin;

	use Yii;
	use app\models\admin\Preferences;
	use yii\web\NotFoundHttpException;
	use yii\base\DynamicModel;

	class PreferencesController extends AdminController {

		public function actionWebsite() {
			$model = Preferences::find()->all();

			$request = Yii::$app->request->post();
			$dynamicModel = isset($request['DynamicModel']) ? $request['DynamicModel'] : array();
			$bool = isset($dynamicModel) && count($dynamicModel) > 0 ? true : false;
			$arr = array();
			if ($model) {
				foreach ($model as $row) {
					if ($bool) {
						$arr[$row->name] = $dynamicModel[$row->name];
					} else {
						$arr[$row->name] = $row->value;
					}
				}
			}
			$formModel = new DynamicModel($arr);

			if ($formModel->load(Yii::$app->request->post()) && $formModel->validate()) {
				$result = true;
				if ($model) {
					foreach ($model as $row) {
						$res = $this->updateFields($row->name, $arr[$row->name], $row->field_type);
						if (!$res) {
							$result = false;
						}
					}
				}

				if ($result) {
					return $this->setMsg([$this->admin . 'preferences/website'], 'Preferences Updated Successfully!');
				} else {
					return $this->setMsg([$this->admin . 'preferences/website'], Yii::$app->params['errorMessage'], 'error');
				}
			}

			return $this->render('preferences', [
				'model' => $model,
				'formModel' => $formModel,
			]);
		}

		private function updateFields($fieldName, $fieldValue, $type) {
			$pref = Preferences::findOne(['name' => $fieldName]);
			$pref->value = $fieldValue;
			$pref->updated_at = date('Y-m-d h:i:s');
			$result = $pref->save();
			if ($result) {
				return true;
			}

			return false;
		}

		private function uploadFile() {

		}

	}
?>