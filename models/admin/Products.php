<?php

namespace app\models\admin;

use Yii;
use yii\db\ActiveRecord;

class Products extends ActiveRecord {

	const SCENARIO_SEARCH = 'search';
	const SCENARIO_ACTION = 'add';

	public static function tableName() {
		return 'products';
	}

	public function rules() {
		return [
			[['name', 'title', 'description', 'keywords'], 'required', 'message' => 'Enter {attribute}', 'on' => self::SCENARIO_ACTION],
			[['detail'], 'string', 'on' => self::SCENARIO_ACTION],
			[['name', 'title', 'description', 'keywords'], 'string', 'max' => 255, 'on' => self::SCENARIO_ACTION],
			['name', 'string', 'max' => 255, 'on' => self::SCENARIO_SEARCH],
			['category_id', 'integer', 'message' => 'Please Select Category', 'on' => [self::SCENARIO_ACTION, self::SCENARIO_SEARCH]],
			['quantity', 'integer', 'message' => 'Please Enter Quantity', 'on' => self::SCENARIO_ACTION],
			['draft', 'required', 'message' => 'Select Draft', 'on' => self::SCENARIO_ACTION],
			['draft', 'in', 'range' => ['no', 'yes'], 'on' => [self::SCENARIO_ACTION, self::SCENARIO_SEARCH]],
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