<?php

namespace app\models\admin;

use Yii;
use yii\db\ActiveRecord;

class Preferences extends ActiveRecord {

	public static function tableName() {
		return 'preferences';
	}

	public function rules() {
		return [
			['name', 'required', 'message' => 'Enter Field Name', 'on' => 'field'],
			['name', 'string', 'max' => 255, 'on' => 'field'],
			['label', 'required', 'message' => 'Enter Field Label', 'on' => 'field'],
			['label', 'string', 'max' => 255, 'on' => 'field'],
			['name', 'unique', 'message' => 'Field Name must be unique.', 'on' => 'field'],
		];
	}

	public function attributeLabels() {
		return [
			'name' => 'Field Name',
			'value' => 'Content',
			'field_type' => 'Field Type',
		];
	}

	function getAdmin() {
		return $this->hasOne(Admin::className(), ['id' => 'created_by']);
	}

}