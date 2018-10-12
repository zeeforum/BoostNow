<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181009_132316_preferences
 */
class m181009_132316_preferences extends Migration
{
	private $tableName = 'preferences';

	/**
	 * {@inheritdoc}
	 */
	public function up()
	{
		$this->createTable($this->tableName, [
			'id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull()->unique(),
			'label' => $this->string(255)->notNull(),
			'value' => $this->text(),
			'field_type' => $this->string(255),
			'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'created_by' => $this->integer()->notNull()->defaultValue(0),
		]);

		$this->insert($this->tableName, array(
				'name' => "website_title",
				'label' => "Website Title",
				'value' => 'Sample Content',
				'field_type' => 'text',
				'created_by' => '1',
			)
		);

		$this->insert($this->tableName, array(
				'name' => "logo",
				'label' => "Logo",
				'value' => '1539139566287179.png',
				'field_type' => 'image',
				'created_by' => '1',
			)
		);

		$this->insert($this->tableName, array(
				'name' => "copyright_text",
				'label' => "Copyright Text",
				'value' => 'Test Apps',
				'field_type' => 'textarea',
				'created_by' => '1',
			)
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function down()
	{
		$this->dropTable($this->tableName);
	}
}
