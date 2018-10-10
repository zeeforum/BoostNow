<?php

namespace app\models\admin;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class PreferencesSearch extends Preferences {

	public function rules() {
		return [
            ['label', 'string', 'max' => 255],
            ['field_type', 'string', 'max' => 255],
		];
	}

	public function attributeLabels() {
		return [
			'label' => 'Field Label',
			'field_type' => 'Field Type',
		];
	}

	function search($params) {
		$query = Preferences::find();
        
        $dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => ['attributes' => ['label', 'field_type', 'created_at']],
			'pagination' => [
				'pageSize' => 30,
			],
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

        $query->andFilterWhere(['like', 'field_type', $this->field_type]);
		$query->andFilterWhere(['like', 'label', $this->label]);

		return $dataProvider;
	}

}