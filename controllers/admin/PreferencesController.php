<?php 
	namespace app\controllers\admin;

	use Yii;
	use app\models\admin\Preferences;
	use yii\web\NotFoundHttpException;
	use yii\base\DynamicModel;
	use yii\web\UploadedFile;
	use app\models\UploadImage;
	use app\models\admin\PreferencesSearch;

	class PreferencesController extends AdminController {

		public function actionIndex() {
			$model = new PreferencesSearch();
			$dataProvider = $model->search(Yii::$app->request->get());

			return $this->render('browse', [
				'searchModel' => $model,
				'dataProvider' => $dataProvider,
			]);
		}

		public function actionAdd() {
			$model = new Preferences();
			$model->scenario = 'field';

			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				$model->created_by = Yii::$app->params['adminId'];
				$result = $model->save();
				if ($result) {
					return $this->setMsg([$this->admin . 'preferences/'], 'Preferences Added Successfully!');
				} else {
					return $this->setMsg([$this->admin . 'preferences/'], Yii::$app->params['errorMessage'], 'error');
				}
			}

			return $this->render('add', [
				'model' => $model,
			]);
		}

		public function actionUpdate($id) {
			$model = Preferences::findOne($id);

			if ($model === NULL) {
				throw new NotFoundHttpException;
			}

			$model->scenario = 'field';

			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				$model->updated_at = date('Y-m-d h:i:s');
				$result = $model->save();
				if ($result) {
					return $this->setMsg([$this->admin . 'preferences/'], 'Preferences Updated Successfully!');
				} else {
					return $this->setMsg([$this->admin . 'preferences/'], Yii::$app->params['errorMessage'], 'error');
				}
			}

			return $this->render('add', [
				'model' => $model,
				'command' => 'edit',
			]);
		}

		public function actionWebsite() {
			$model = Preferences::find()->all();

			$request = Yii::$app->request->post();
			$dynamicModel = isset($request['DynamicModel']) ? $request['DynamicModel'] : array();
			$bool = isset($dynamicModel) && count($dynamicModel) > 0 ? true : false;
			$arr = array();
			if ($model) {
				$image = new UploadImage();
				$image->setImagePath('images/preferences/');

				foreach ($model as $row) {
					if ($bool) {	//if form is submitted
						if ($row->field_type == 'image' || $row->field_type == 'file') {	//upload image or file
							$picture = UploadedFile::getInstance(new DynamicModel, $row->name);
							if ($picture) {
								$pictureName = $image->upload($picture);
								if ($pictureName) {
									$arr[$row->name] = $pictureName;
								}
							} else {
								$arr[$row->name] = null;
							}
						} else {
							$arr[$row->name] = $dynamicModel[$row->name];
						}
					} else {
						$arr[$row->name] = $row->value;
					}
				}
			}

			//dynamic form instance
			$formModel = new DynamicModel($arr);

			if ($formModel->load(Yii::$app->request->post()) && $formModel->validate()) {	//form is submitted, update data in database
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
			$pref->updated_at = date('Y-m-d H:i:s');
			$result = $pref->save();
			if ($result) {
				return true;
			}

			return false;
		}

		public function actionView($id) {
			$model = Preferences::findOne($id);

			return $this->render('detail', [
				'model' => $model,
			]);
		}

		public function actionDelete($id) {
			$model = Preferences::findOne($id);
			
			if ($model === null) {
				throw new NotFoundHttpException;
			}

			$result = $model->delete();
			if ($result) {
				return $this->setMsg([$this->admin . 'preferences/'], 'Preferences Deleted Successfully!');
			} else {
				return $this->setMsg([$this->admin . 'preferences/'], Yii::$app->params['errorMessage'], 'error');
			}
		}

	}
?>