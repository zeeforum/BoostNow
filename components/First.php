<?php 
	
	namespace app\components;

	use app\components\MyInterface;

	class First implements MyInterface {

		public function test() {
			echo 'First Class <br>';
		}
		
	}