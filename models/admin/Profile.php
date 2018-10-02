<?php
	namespace app\models\admin;

	use Yii;
	use yii\db\ActiveRecord;
	use app\models\UploadImage;
	use app\models\Admin;

	class Profile extends ActiveRecord {

		public $description;
		public $picture;
		public $oldPassword;
		public $password;
		public $confirmPassword;

		public static function tableName() {
			return 'admin';
		}

		public function rules() {
			return [
				['description', 'required', 'message' => 'Enter Description', 'on' => 'profileSave'],
				[['picture'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif, jpeg', 'message' => 'Please select valid image!', 'on' => 'profileSave', 'checkExtensionByMimeType' => false],
				['oldPassword', 'required', 'message' => 'Enter Old Password', 'on' => ['changePassword']],
				['oldPassword', 'validatePassword', 'on' => ['changePassword']],
				['password', 'required', 'message' => 'Enter New Password', 'on' => ['changePassword']],
				['confirmPassword', 'required', 'message' => 'Confirm New Password', 'on' => ['changePassword']],
				['confirmPassword', 'validateConfirmPassword', 'message' => 'Password and Confirm Password Should be same.', 'on' => ['changePassword']],
			];
		}

		public function attributeLabels() {
			return [
				'oldPassword' => 'Current Password',
				'password' => 'New Password',
				'confirmPassword' => 'Confirm New Password',
			];
		}

		public function saveProfile() {
			$id = Yii::$app->admin->id;
			$admin_row = Admin::findOne($id);

			if ($admin_row) {
				if ($this->picture) {
					$image = new UploadImage();
					$pictureName = $image->upload($this->picture);
					if ($pictureName != '') {
						$admin_row->picture = $pictureName;
					}
				}

				$admin_row->description = $this->description;
				$result = $admin_row->save();
				return $result;
			}
			// print_r($admin_row);
			return false;
		}

		public function changePassword() {
			$id = Yii::$app->admin->id;
			$admin_row = Admin::findOne($id);
			if ($admin_row) {
				$admin_row->password_hash = $this->generatePasswordHash($this->password);
				return $admin_row->save();
			}

			return false;
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
				$user = Yii::$app->admin;
				$userPassword = $user->identity->password_hash;
				$validPassword = Yii::$app->security->validatePassword($this->oldPassword, $userPassword);
				
				if (!$user || !$validPassword) {
					$this->addError($attribute, 'Incorrect Old Password.');
				}
			}
		}

		public function validateConfirmPassword($attribute, $params) {
			if (!$this->hasErrors()) {
				if ($this->password != $this->confirmPassword) {
					$this->addError($attribute, 'Password and Confirm Password Should be same.');
				}
			}
		}

		public function generatePasswordHash($password) {
			return Yii::$app->security->generatePasswordHash($password);
		}

	}