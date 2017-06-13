<?php

	use yii\helpers\Html;
	use yii\helpers\HtmlPurifier;

?>

<div class="users">
	<?= $model->id ?>
	<?= Html::encode($model->name) ?>
	<?= HtmlPurifier::process($model->email) ?>
</div>