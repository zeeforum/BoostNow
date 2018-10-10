<?php
	namespace app\models;

	use yii\base\Model;
	use yii\web\UploadedFile;

	class UploadImage extends Model {

		private $imagePath = 'images/profile/';

		public function setImagePath($imagePath = 'images/profile/') {
			$this->imagePath = $imagePath;
		}

		public function upload($image) {
			$imageName = time() . rand(9999, 999999) . '.' . $image->extension;
			$data = $image->saveAs($this->imagePath . $imageName);
			if ($data) {
				return $imageName;
			}
			
			return false;
		}

	}