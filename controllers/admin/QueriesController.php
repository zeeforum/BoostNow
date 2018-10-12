<?php
	namespace app\controllers\admin;

	use Yii;
	use app\models\admin\Queries;
	use yii\web\NotFoundHttpException;

	class QueriesController extends AdminController {

		public function actionIndex() {
			$searchModel = new Queries();
			$dataProvider = $searchModel->search(Yii::$app->request->get());

			return $this->render('browse', [
				'dataProvider' => $dataProvider,
				'searchModel' => $searchModel,
			]);
		}

		public function actionView($id) {
			$model = Queries::findOne($id);
			
			if ($model === null) {
				throw new NotFoundHttpException;
            }
            
            if ($model->is_read == 'no') {
                $model->is_read = 'yes';
                $model->updated_at = date('Y-m-d H:i:s');
                $model->save();
            }

			return $this->render('detail', [
				'model' => $model,
			]);
		}

		public function actionDelete($id) {
			$model = Queries::findOne($id);

			if ($model === null) {
				throw new NotFoundHttpException;
			}

			$result = $model->delete();
			if ($result) {
				return $this->setMsg([$this->admin . 'queries/'], 'Query Deleted Successfully!');
			} else {
				return $this->setMsg([$this->admin . 'queries/'], Yii::$app->params['errorMessage'], 'error');
			}
		}

	}