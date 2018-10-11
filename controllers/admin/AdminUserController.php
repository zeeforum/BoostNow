<?php
namespace app\controllers\admin;

use Yii;
use app\models\admin\Admin;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use app\models\UploadImage;

class AdminUserController extends AdminController {

    public function actionIndex() {
        $searchModel = new Admin();
        $searchModel->scenario = 'search';

        $adminQuery = Admin::find()->orderBy('id desc');
        if (Yii::$app->params['adminId'] != '') {
            $adminQuery->where('id <> ' . Yii::$app->params['adminId']);
        }

        if ($searchModel->load(Yii::$app->request->get()) && $searchModel->validate()) {
            if ($searchModel->username != '') {
                $adminQuery->where(['like', 'username', $searchModel->username]);
            }
            
            if ($searchModel->email != '') {
                $adminQuery->where(['like', 'email', $searchModel->email]);
            }
        }
        
        $model = $adminQuery->all();

        return $this->render('browse', [
            'searchModel' => $searchModel,
            'model' => $model,
        ]);
    }

    public function actionView($id) {
        $adminId = intval(Yii::$app->params['adminId']);
        $model = Admin::find()->where(['id' => $id])->andWhere('id <> ' . $adminId)->one();
        if ($model === NULL) {
            throw new NotFoundHttpException;
        }

        return $this->render('detail', [
            'model' => $model,
        ]);
    }

    public function actionAdd() {
        $model = new Admin();
        $model->scenario = 'add';

        $data = Yii::$app->request->post();
        if ($model->load($data) && $model->validate()) {
            $password = isset($data['Admin']['password']) ? $data['Admin']['password'] : '';
            $picture = UploadedFile::getInstance($model, 'picture');
            if ($picture) {
                $image = new UploadImage();

                $pictureName = $image->upload($picture);
                if ($pictureName != '') {
                    $model->picture = $pictureName;
                }
            }

            if ($password != '') {
                $model->password_hash = Yii::$app->security->generatePasswordHash($password);
            }
            
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->access_token = Yii::$app->security->generateRandomString() . time();
            $model->password_reset_token = null;
            $result = $model->save();

            if ($result) {
                return $this->setMsg([$this->admin . 'admin-user/'], 'Admin User Created Successfully!');
            } else {
                return $this->setMsg([$this->admin . 'admin-user/add/'], Yii::$app->params['errorMessage'], 'error');
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id) {
        $adminId = intval(Yii::$app->params['adminId']);
        $model = Admin::find()->where(['id' => $id])->andWhere('id <> ' . $adminId)->one();
        if ($model === null) {
            throw new NotFoundHttpException;
        }

        $model->scenario = 'add';
        $data = Yii::$app->request->post();
        if ($model->load($data) && $model->validate()) {
            $password = isset($data['Admin']['password']) ? $data['Admin']['password'] : '';
            $picture = UploadedFile::getInstance($model, 'picture');
            if ($picture) {
                $image = new UploadImage();

                $pictureName = $image->upload($picture);
                if ($pictureName != '') {
                    $model->picture = $pictureName;
                }
            }

            if ($password != '') {
                $model->password_hash = Yii::$app->security->generatePasswordHash($password);
            }
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->access_token = Yii::$app->security->generateRandomString() . time();
            $model->password_reset_token = null;
            $result = $model->save();

            if ($result) {
                return $this->setMsg([$this->admin . 'admin-user/'], 'Admin User Updated Successfully!');
            } else {
                return $this->setMsg([$this->admin . 'admin-user/add/'], Yii::$app->params['errorMessage'], 'error');
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $adminId = intval(Yii::$app->params['adminId']);
        $model = Admin::find()->where(['id' => $id])->andWhere('id <> ' . $adminId)->one();

        if ($model === null) {
            throw new NotFoundHttpException;
        }

        $result = $model->delete();
        if ($result) {
            return $this->setMsg([$this->admin . 'admin-user/'], 'Admin User Deleted Successfully!');
        } else {
            return $this->setMsg([$this->admin . 'admin-user/add/'], Yii::$app->params['errorMessage'], 'error');
        }
    }

}