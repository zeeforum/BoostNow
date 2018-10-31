<?php
	namespace app\models;

	use yii\base\Model;
	use yii\web\UploadedFile;
	use yii\imagine\Image;

	class UploadImage extends Model {

		private $imagePath = 'images/profile/';

		public function setImagePath($imagePath = 'images/profile/') {
			$this->imagePath = $imagePath;
		}

		public function upload($image, $productThumb = false) {
			$imageName = time() . rand(9999, 999999) . '.' . $image->extension;
			$data = $image->saveAs($this->imagePath . $imageName);
			if ($data) {
				if ($productThumb) {
					$this->createProductThumbnail($imageName);
				}
				return $imageName;
			}
			
			return false;
		}

		public function uploadProductImages($images) {
			$result = false;
			if ($images) {
				$result = array();
				foreach ($images as $img) {
					$imageName = time() . rand(9999, 999999) . '.' . $img->extension;
					$data = $img->saveAs($this->imagePath . $imageName);
					if ($data) {
						$this->createProductThumbnail($imageName);
						$result[] = $imageName;
					}
				}
			}

			return $result;
		}

		public function createProductThumbnail($imageName) {
			$originalFile = $this->imagePath . $imageName;

			$thumb = $this->imagePath . 'thumb-' . $imageName;
			Image::thumbnail($originalFile, 450, 450)->save($thumb, ['quality' => 80]);

			$thumbmd = $this->imagePath . 'thumbmd-' . $imageName;
			Image::thumbnail($originalFile, 300, 300)->save($thumbmd, ['quality' => 80]);

			$thumbsm = $this->imagePath . 'thumbsm-' . $imageName;
			Image::thumbnail($originalFile, 150, 150)->save($thumbsm, ['quality' => 80]);
		}

	}