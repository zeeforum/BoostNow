<?php 

	namespace app\components;

	use app\components\MyInterface;

	class Second implements MyInterface {

		public function test() {
			echo 'Second Class <br>';
		}

	}