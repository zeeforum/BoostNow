<?php
namespace app\models\admin;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class Queries extends ActiveRecord {

	public function rules() {
		return [
            ['name', 'string', 'max' => 255],
            ['email', 'string', 'max' => 255],
		];
	}

	public function attributeLabels() {
		return [
            'name' => 'Name',
            'email' => 'Email',
		];
	}

	public function search($params) {
		$query = Queries::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => [
                'attributes' => [
                    'id',
                    'name', 
                    'email', 
                    'created_at',
                ],
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
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
        $query->andFilterWhere(['like', 'email', $this->email]);

		return $dataProvider;
	}

}