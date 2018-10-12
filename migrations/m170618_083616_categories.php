<?php

use yii\db\Schema;
use yii\db\Migration;

class m170618_083616_categories extends Migration
{
	private $tableName = 'categories';

	public function up()
	{
		$this->createTable($this->tableName, [
			'id' => $this->primaryKey(),
			'name' => $this->string(100)->notNull()->unique(),
			'description' => $this->string(255),
			'keywords' => $this->string(255),
			'detail' => $this->text(),
			'parent_id' => $this->integer()->notNull()->defaultValue(0),
			'draft' => "ENUM('no', 'yes') NOT NULL DEFAULT 'no'",
			'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'created_by' => $this->integer()->notNull()->defaultValue(0),
		]);

		// $this->addForeignKey('categories_admin_id', 'categories', 'created_by', 'admin', 'id', 'CASCADE');

		$this->insert($this->tableName, array(
				'name' => 'Technology',
				'parent_id' => '0',
				'draft' => 'no',
				'created_by' => '1',
			)
		);

		$this->insert($this->tableName, array(
				'name' => 'Kids',
				'parent_id' => '0',
				'draft' => 'no',
				'created_by' => '1',
			)
		);

		$this->insert($this->tableName, array(
				'name' => 'Mens',
				'parent_id' => '0',
				'draft' => 'no',
				'created_by' => '1',
			)
		);

		$this->insert($this->tableName, array(
				'name' => 'Women',
				'parent_id' => '0',
				'draft' => 'no',
				'created_by' => '1',
			)
		);

		$this->insert($this->tableName, array(
				'name' => 'Jewelry',
				'parent_id' => '0',
				'draft' => 'no',
				'created_by' => '1',
			)
		);
	}

	public function down()
	{
		$this->dropTable($this->tableName);
	}

}