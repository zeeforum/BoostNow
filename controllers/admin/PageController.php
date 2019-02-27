<?php
	namespace app\controllers\admin;

	use Yii;
	use app\models\admin\Pages;
	use yii\web\NotFoundHttpException;
	use yii\data\Pagination;

	class PageController extends AdminController {

		public function actionIndex() {
			$searchModel = new Pages();
			$searchModel->scenario = 'search';
			$productsQuery = Pages::find()->orderBy('id desc');

			if ($searchModel->load(Yii::$app->request->get()) && $searchModel->validate()) {
				if ($searchModel->title != '') {
					$productsQuery->where(['like', 'title', $searchModel->title]);
				}
				
				if ($searchModel->page_title > 0) {
					$productsQuery->where(['page_title' => $searchModel->page_title]);
				}

				if ($searchModel->draft != '') {
					$productsQuery->where(['draft' => $searchModel->draft]);
				}
			}

			$pages = new Pagination([
				'totalCount' => $productsQuery->count(),
				'pageSize' => 30,
			]);
			$model = $productsQuery->offset($pages->offset)->limit($pages->limit)->all();

			return $this->render('pages', [
				'searchModel' => $searchModel,
				'model' => $model,
				'pages' => $pages,
			]);
		}

		public function actionAdd() {
			$model = new Pages();
			$model->scenario = 'add';

			if ($model->load(Yii::$app->request->post())) {
				if ($model->validate()) {
					$model->draft = $model->draft;
					
					$slug = preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $model->title);
					//this will replace all non alphanumeric char with '-'
					$slug = mb_strtolower($slug);
					//convert string to lowercase
					$slug = trim($slug, '-');
					$model->seo_url = $slug;

					$model->created_by = Yii::$app->params['adminId'];
					$result = $model->save();
					if ($result) {
						return $this->setMsg([$this->admin . 'page/'], 'Page Added Successfully!');
					} else {
						return $this->setMsg([$this->admin . 'page/add'], Yii::$app->params['errorMessage'], 'error');
					}
				}
			}

			if (!$model->draft) {
				$model->draft = 'no';
			}

			return $this->render('add', [
				'model' => $model,
			]);
		}

		public function actionView($id) {
			$model = Pages::findOne($id);
			
			if ($model === null) {
				throw new NotFoundHttpException;
			}

			return $this->render('detail', [
				'model' => $model,
			]);
		}

		public function actionUpdate($id) {
			$model = Pages::findOne($id);
			$model->scenario = 'add';
			
			if ($model === null) {
				throw new NotFoundHttpException;
			}

			if ($model->load(Yii::$app->request->post())) {
				if ($model->validate()) {
					$model->draft = $model->draft;
					
					$slug = preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $model->title);
					//this will replace all non alphanumeric char with '-'
					$slug = mb_strtolower($slug);
					//convert string to lowercase
					$slug = trim($slug, '-');
					$model->seo_url = $slug;

					$model->updated_at = date('Y-m-d H:i:s');
					$result = $model->save();
					if ($result) {
						return $this->setMsg([$this->admin . 'page/'], 'Page Updated Successfully!');
					} else {
						return $this->setMsg([$this->admin . 'page/update/' . $id], Yii::$app->params['errorMessage'], 'error');
					}
				}
			}

			if (!$model->draft) {
				$model->draft = 'no';
			}

			return $this->render('add', [
				'model' => $model,
				'command' => 'edit',
			]);
		}

		public function actionDelete($id) {
			$model = Pages::findOne($id);

			if ($model === null) {
				throw new NotFoundHttpException;
			}

			$result = $model->delete();
			if ($result) {
				return $this->setMsg([$this->admin . 'page/'], 'Page Deleted Successfully!');
			} else {
				return $this->setMsg([$this->admin . 'page/'], Yii::$app->params['errorMessage'], 'error');
			}
		}

	}