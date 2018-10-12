<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181012_130430_queries
 */
class m181012_130430_queries extends Migration
{
    private $tableName = 'queries';

    /**
	 * {@inheritdoc}
	 */
	public function up()
	{
		$this->createTable($this->tableName, [
			'id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull(),
			'email' => $this->string(255)->notNull(),
            'phone' => $this->string(255),
            'subject' => $this->string(255)->notNull(),
            'question' => $this->string(255),
			'message' => $this->text(),
			'is_read' => "ENUM('no', 'yes') NOT NULL DEFAULT 'no'",
			'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
		]);

		//index
		$this->createIndex('name', $this->tableName, 'name');
		$this->createIndex('email', $this->tableName, 'email');

		$this->insert($this->tableName, array(
				'name' => "Zartash Zulfiqar",
				'email' => "contact@abc.xyz",
				'phone' => '+123456789',
				'subject' => 'Test subject to show',
				'message' => '<h4>Content of the message to show</h4>',
				'is_read' => 'yes',
			)
		);

		$this->insert($this->tableName, array(
				'name' => "Zee Forum",
				'email' => "user@abc.xyz",
				'phone' => '+123456789',
				'subject' => 'Test subject to show',
				'message' => '<h4>Content of the message to show</h4>',
				'is_read' => 'no',
			)
		);

		$this->insert($this->tableName, array(
				'name' => "M Zee",
				'email' => "user2@abc.xyz",
				'phone' => '+223456789',
				'subject' => 'Test subject to show',
				'message' => '<h4>Content of the message to show</h4>',
				'is_read' => 'no',
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
