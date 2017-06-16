<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class AdminLoginForm extends Model {

	public $email;
	public $username;
	public $password;
	public $confirm_password;
	public $token;
	public $rememberMe = true;

	private $_user;


	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			['username', 'required', 'message' => 'Enter Your Username/Email', 'on' => ['login']],
			['email', 'required', 'message' => 'Enter Your Email', 'on' => ['forgotPassword']],
			['email', 'email', 'message' => 'Enter Valid Email'],
			['email', 'exist',
				'targetClass' => 'app\models\Admin',
				'filter' => ['status' => Admin::STATUS_ACTIVE],
				'message' => 'There is no user with this email address.',
				'on' => 'forgotPassword'
			],
			
			['password', 'required', 'message' => 'Enter Your Password', 'on' => ['resetPassword', 'login']],
			['confirm_password', 'required', 'message' => 'Confirm Your Password', 'on' => ['resetPassword']],
			['confirm_password', 'validateConfirmPassword', 'message' => 'Password and Confirm Password Should be same.', 'on' => ['resetPassword']],
			
			// rememberMe must be a boolean value
			['rememberMe', 'boolean', 'on' => ['login']],
			// password is validated by validatePassword()
			['password', 'validatePassword', 'on' => ['login']],
		];
	}

	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated
	 * @param array $params the additional name-value pairs given in the rule
	 */
	public function validatePassword($attribute, $params) {
		if (!$this->hasErrors()) {
			$user = $this->getUser();

			if (!$user || !$user->validatePassword($this->password)) {
				$this->addError($attribute, 'Incorrect username or password.');
			}
		}
	}

	public function validateConfirmPassword($attribute, $params) {
		if (!$this->hasErrors()) {
			if ($this->password != $this->confirm_password) {
				$this->addError($attribute, 'Password and Confirm Password Should be same.');
			}
		}
	}

	/**
	 * Logs in a user using the provided username and password.
	 * @return bool whether the user is logged in successfully
	 */
	public function login() {
		if ($this->validate()) {
			return Yii::$app->admin->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
		}
		return false;
	}

	/**
	 * Finds user by [[username]]
	 *
	 * @return User|null
	 */
	public function getUser() {
		if ($this->_user === null) {
			$this->_user = Admin::findByUsername($this->username);
		}

		return $this->_user;
	}

	public function resetPassword() {
		return $this->sendEmail();
	}

	public function changePassword() {
		$admin = Admin::findByPasswordResetToken($this->token);
		
		if ($admin) {
			$admin->setPassword($this->password, true);
			if ($admin->update() !== false) {
				return true;
			} else {
				return false;
			}
		}

		return false;
	}

	public static function findByPasswordResetToken($token) {
		return Admin::findByPasswordResetToken($token);
	}

	public function sendEmail() {
		$user = Admin::findOne([
				'status' => Admin::STATUS_ACTIVE,
				'email' => $this->email,
		]);

		if (!$user) {
			return false;
		}

		if (!Admin::isPasswordResetTokenValid($user->password_reset_token)) {
			$user->generatePasswordResetToken();
			if (!$user->save()) {
				return false;
			}
		}
		
		return Yii::$app
			->mailer
			->compose(
				['html' => 'forgot-password'],
				['user' => $user]
			)
			->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name])
			->setTo($this->email)
			->setSubject('Password reset for ' . Yii::$app->name)
			->send();
	}
}
