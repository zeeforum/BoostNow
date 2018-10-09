<?php
    namespace app\controllers;

    use Yii;
    use yii\web\Controller;

    class WebController extends Controller {
        
        public function beforeAction() {
            Yii::$app->params['imageUrl'] = Yii::$app->params['base_url'] . Yii::$app->params['imageUrl'];
        }

    }