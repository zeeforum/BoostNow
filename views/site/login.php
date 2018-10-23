<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-page">
    <div class="page-title text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-xs-12 col-sm-4 col-sm-offset-4">
        <p>Please fill out the following fields to login:</p>

        <?php 
            $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]);
        ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-lg-12\">{input} {label}</div>\n<div class=\"col-lg-12\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div class="col-lg-12">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-boostnow', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>

        <div class="login-text" style="color:#999;">
            You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
            To modify the username/password, please check out the code <code>app\models\User::$users</code>.
        </div>
    </div>
</div>
