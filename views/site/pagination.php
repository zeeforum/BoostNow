<?php 

	use yii\widgets\LinkPager;

?>

<?php foreach ($models as $model): ?>
	<?= $model->id; ?>
	<?= $model->name; ?>
	<?= $model->email; ?>
	<br />
<?php endforeach; ?>

<?php 
	//pagination
	echo LinkPager::widget([
		'pagination' => $pagination,
	]);
?>