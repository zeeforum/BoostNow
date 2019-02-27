<?php

namespace app\models\admin;

use Yii;
use yii\db\ActiveRecord;

class Pages extends ActiveRecord {

	const SCENARIO_SEARCH = 'search';
	const SCENARIO_ACTION = 'add';

	public static function tableName() {
		return 'pages';
	}

	public function rules() {
		return [
			[['title', 'page_title', 'description', 'keywords'], 'required', 'message' => 'Enter {attribute}', 'on' => self::SCENARIO_ACTION],
			[['content'], 'string', 'on' => self::SCENARIO_ACTION],
			[['title', 'page_title', 'description', 'keywords', 'section'], 'string', 'max' => 140, 'on' => self::SCENARIO_ACTION],
			['title', 'string', 'max' => 140, 'on' => self::SCENARIO_SEARCH],
			['draft', 'required', 'message' => 'Select Draft', 'on' => self::SCENARIO_ACTION],
			['draft', 'in', 'range' => ['no', 'yes'], 'on' => [self::SCENARIO_ACTION, self::SCENARIO_SEARCH]],
		];
	}

	public function attributeLabels() {
		return [
			'title' => 'Title',
			'page_title' => 'Page Title',
			'description' => 'Description',
			'keywords' => 'Keywords',
			'content' => 'Content',
			'draft' => 'Draft',
		];
	}

	function getAdmin() {
		return $this->hasOne(Admin::className(), ['id' => 'created_by']);
	}

	function getCategory() {
		return $this->hasOne(Categories::className(), ['id' => 'category_id']);
	}

}