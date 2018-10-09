<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181009_132316_preferences
 */
class m181009_132316_preferences extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function up()
	{
		$this->createTable('preferences', [
			'id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull()->unique(),
			'label' => $this->string(255)->notNull(),
			'value' => $this->text(),
			'field_type' => $this->string(255),
			'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'created_by' => $this->integer()->notNull()->defaultValue(0),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function down()
	{
		$this->dropTable('products');
	}
}
