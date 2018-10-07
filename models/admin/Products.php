<?php

namespace app\models\admin;

use Yii;
use yii\db\ActiveRecord;

class Products extends ActiveRecord {

	public static function tableName() {
		return 'products';
	}

	public function rules() {
		return [
			[['name', 'title', 'description', 'keywords'], 'required', 'message' => 'Enter {attribute}'],
			[['detail'], 'string'],
			[['name', 'title', 'description', 'keywords'], 'string', 'max' => 255],
            ['category_id', 'integer', 'message' => 'Please Select Category'],
            ['quantity', 'integer', 'message' => 'Please Select Category'],
			['draft', 'required', 'message' => 'Select Draft'],
			['draft', 'in', 'range' => ['no', 'yes']],
		];
	}

	public function attributeLabels() {
		return [
            'name' => 'Product Name',
            'title' => 'Title',
			'description' => 'Description',
			'keywords' => 'Keywords',
			'detail' => 'Content',
			'category_id' => 'Category',
		];
	}

	function getAdmin() {
		return $this->hasOne(Admin::className(), ['id' => 'created_by']);
	}

	function getCategory() {
		return $this->hasOne(Categories::className(), ['id' => 'category_id']);
	}

}