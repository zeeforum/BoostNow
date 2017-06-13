<?php

namespace app\models;

use app\components\MyBehavior;
use Yii;

/**
 * This is the model class for table "new_users".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 */
class NewUsers extends \yii\db\ActiveRecord
{
	const NEW_USER_EVENT = 'new-user';

	public function init() {
		$this->on(SELF::NEW_USER_EVENT, [$this, 'sendMailToAdmin']);
	}

	public function behaviors() {
		return [
			// anonymous behavior, behavior class name only
			MyBehavior::className(),
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'new_users';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name', 'email'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'email' => 'Email',
		];
	}

	public function sendMailToAdmin($event) {
		echo 'Mail send to admin using the event';
	} 
}
