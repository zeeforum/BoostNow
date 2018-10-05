<?php

use yii\db\Schema;
use yii\db\Migration;

class m170618_083616_categories extends Migration
{
	public function up()
	{
		$this->createTable('categories', [
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

		$this->addForeignKey('categories_admin_id', 'categories', 'created_by', 'admin', 'id', 'CASCADE');
	}

	public function down()
	{
		$this->dropTable('categories');
	}

}