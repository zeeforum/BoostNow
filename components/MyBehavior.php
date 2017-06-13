<?php

	namespace app\components;

	use yii\db\ActiveRecord;
	use yii\base\Behavior;

	class MyBehavior extends Behavior {

		private $_prop1;

		public function events() {
			return [
				ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
			];
		}

		public function beforeValidate($event) {
			$this->owner->name = strtoupper($this->owner->name);
		}

		public function setProp1($prop) {
			$this->_prop1 = $prop;
		}

		public function getProp1() {
			return $this->_prop1;
		}

		public function myFunction() {

		}

	}