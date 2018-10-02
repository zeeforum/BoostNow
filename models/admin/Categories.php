<?php

namespace app\models\admin;

use Yii;
use yii\db\ActiveRecord;

class Categories extends ActiveRecord {

	public static function tableName() {
		return 'categories';
	}

	public function rules() {
		return [
			[['name', 'description', 'keywords'], 'required', 'message' => 'Enter {attribute}'],
			[['detail'], 'string'],
			[['name'], 'string', 'max' => 100],
			['name', 'unique', 'message' => 'Category Name must be unique.'],
			[['description', 'keywords'], 'string', 'max' => 255],
			['parent_id', 'integer', 'message' => 'Please Select Parent Category'],
			['draft', 'required', 'message' => 'Select Draft'],
			['draft', 'in', 'range' => ['no', 'yes']],
		];
	}

	public function attributeLabels() {
		return [
			'name' => 'Category Name',
			'description' => 'Description',
			'keywords' => 'Keywords',
			'detail' => 'Content',
			'parent_id' => 'Parent Category',
		];
	}

	function getAdmin() {
		return $this->hasOne(Admin::className(), ['id' => 'created_by']);
	}

	function getParentCategory() {
		return $this->hasOne(Categories::className(), ['id' => 'parent_id']);
	}

}