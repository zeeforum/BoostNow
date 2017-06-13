<?php
	namespace app\models;

	use Yii;
	use yii\base\Model;

	class RegistrationForm extends Model {

		public $username;
		public $password;
		public $email;
		public $country;
		public $city;
		public $subscriptions;
		public $photos;

		public function rules() {
			return [
				[['username', 'email', 'password'], 'required'],
				['email', 'email'],
				['city', \app\components\CityValidator::className()]
			];
		}

	}