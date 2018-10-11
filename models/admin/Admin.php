<?php
	namespace app\models\admin;

	use yii\db\ActiveRecord;

	class Admin extends ActiveRecord {

		public $password;

		public static function tableName() {
			return 'admin';
		}

		public function rules() {
			return [
				[['username', 'email'], 'required', 'on' => 'add', 'message' => 'Enter {attribute}'],
				['username', 'string', 'max' => 100, 'on' => ['search', 'add']],
				['email', 'string', 'max' => 255, 'on' => ['search', 'add']],
				[['username', 'email'], 'unique', 'message' => '{attribute} must be unique.', 'on' => 'add'],
				['description', 'string', 'max' => 255, 'on' => 'add'],
				[['picture'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif, jpeg', 'message' => 'Please select valid image!', 'on' => 'add', 'checkExtensionByMimeType' => false],
				['status', 'in', 'range' => ['active', 'inactive', 'expire', 'block', 'ban'], 'on' => 'add'],
				['role', 'in', 'range' => ['admin', 'editor', 'author', 'contributor'], 'on' => 'add'],
			];
		}

		public function attributeLabels() {
			return [
				'username' => 'Username',
				'email' => 'Email',
			];
		}

	}