<?php
/* @var $this yii\web\View */
/* @var $user common\models\User */
$resetLink = Yii::$app->params['adminUrl'] . 'main/reset-password?token=' . $user->password_reset_token;
?>
Hello <b><?= $user->username ?></b>,

<p>Follow the link below to reset your password:</p>

<a href="<?= $resetLink ?>">Reset Password</a>