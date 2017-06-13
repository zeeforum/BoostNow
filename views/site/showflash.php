<?php
	
	use yii\bootstrap\Alert;

	echo Alert::widget([
		'options' => ['class' => 'alert-info'],
		'body'	  => Yii::$app->session->getFlash('greeting')
	]);

?>