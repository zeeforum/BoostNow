<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Categories extends ActiveRecord {

	public static function tableName() {
		return 'categories';
	}

	public function rules() {
		return [
            [['name', 'description', 'keywords'], 'required'],
            [['detail'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['description', 'keywords'], 'string', 'max' => 255],
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

}