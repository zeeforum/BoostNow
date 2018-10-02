<?php
	namespace app\models\admin;

	use yii\db\ActiveRecord;

	class Admin extends ActiveRecord {

		public static function tableName() {
			return 'admin';
		}

	}