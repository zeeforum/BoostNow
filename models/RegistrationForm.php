<?php
	namespace app\models;

	use Yii;
	use yii\base\Model;

	class RegistrationForm extends Model {

		public $firstName;
		public $lastName;
		public $username;
		public $password;
		public $confirmPassword;
		public $email;
		public $country;
		public $city;
		public $rememberMe;
		public $photos;

		public function rules() {
			return [
				[['firstName', 'lastName', 'username', 'email', 'password'], 'required'],
				['email', 'email'],
				['city', \app\components\CityValidator::className()]
			];
		}

	}