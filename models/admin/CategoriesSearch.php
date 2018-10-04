<?php
namespace app\models\admin;

use app\models\admin\Categories;
use yii\data\ActiveDataProvider;

class CategoriesSearch extends Categories {

	public function rules() {
		return [
			[['name'], 'string', 'max' => 100],
		];
	}

	public function attributeLabels() {
		return [
			'name' => 'Category Name',
		];
	}

	public function search($params) {
		$query = Categories::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => ['attributes' => ['name', 'created_at']],
			'pagination' => [
				'pageSize' => 30,
			],
		]);

		// load the search form data and validate
		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		// adjust the query by adding the filters
		$query->andFilterWhere(['like', 'name', $this->name]);

		return $dataProvider;
	}

}