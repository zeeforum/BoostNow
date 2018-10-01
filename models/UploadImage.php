<?php
	namespace app\models;

	use yii\base\Model;
	use yii\web\UploadedFile;

	class UploadImage extends Model {

		private $profileImages = 'images/profile/';

		public function upload($image) {
			$imageName = time() . rand(9999, 999999) . '.' . $image->extension;
			$data = $image->saveAs($this->profileImages . $imageName);
			if ($data) {
				return $imageName;
			}
			
			return false;
		}

	}