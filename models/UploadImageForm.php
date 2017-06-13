<?php
	namespace app\models;

	use yii\base\Model;

	class UploadImageForm extends Model {

		public $image;

		public function rules() {
			return [
				[['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png'],
			];
		}

		public function upload() {
			if ($this->validate()) {
				$data = $this->image->saveAs('../uploads/' . md5($this->image->baseName . 'demo'));
				return $data;
			} else {
				return false;
			}
		}

	}