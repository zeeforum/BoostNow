<?php
	namespace app\models\admin;

	use Yii;
	use yii\db\ActiveRecord;
	use app\models\UploadImage;
	use app\models\Admin;

	class Profile extends ActiveRecord {

		public $description;
		public $picture;

		public static function tableName() {
			return 'admin';
		}

		public function rules() {
			return [
				['description', 'required', 'message' => 'Enter Description', 'on' => 'profileSave'],
				[['picture'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif, jpeg', 'message' => 'Please select valid image!', 'on' => 'profileSave', 'checkExtensionByMimeType' => false],
			];
		}

		public function saveProfile() {
			if ($this->validate()) {
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
			}
			// print_r($admin_row);
			return false;
		}

	}