<?php
	
	//for grid view
	use yii\grid\GridView;
	echo GridView::widget([
		'dataProvider' => $dataProvider,
		//columns for modfication columns which you want to show how to combine them

		//serial, action and checkbox columns
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'name',
			['class' => 'yii\grid\ActionColumn'],
			['class' => 'yii\grid\CheckboxColumn'],
		],

		//data column
		/*'columns' => [
			'id',
			[
				'class' => 'yii\grid\DataColumn',
				'label' => 'Name and Email',
				'value' => function($data) {
					return $data->name . ' writes from ' . $data->email;
				},
			],
		],*/
	]);

	//for list view
	/*use yii\widgets\ListView;

	echo ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => '_user',
	]);*/


	//detail view of the data widget
	/*use yii\widgets\DetailView;
	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'name:html',
			[
				'label' => 'E-mail',
				'value' => $model->email,
			],
		],
	]);*/
?>