<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181005_124221_products
 */
class m181005_124221_products extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function up()
	{
		$this->createTable('products', [
			'id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull(),
			'title' => $this->string(255)->notNull(),
			'description' => $this->string(255),
			'keywords' => $this->string(255),
			'detail' => $this->text(),
			'json' => $this->text(),
			'quantity' => $this->integer()->notNull()->defaultValue(0),
			'category_id' => $this->integer()->notNull()->defaultValue(0),
			'draft' => "ENUM('no', 'yes') NOT NULL DEFAULT 'no'",
			'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'created_by' => $this->integer()->notNull()->defaultValue(0),
		]);

		//index
		$this->createIndex('name', 'products', 'name');
		$this->createIndex('title', 'products', 'title');
		$this->createIndex('category_id', 'products', 'category_id');

		//foreign keys
		$this->addForeignKey('products_category_id', 'products', 'category_id', 'categories', 'id', 'CASCADE');
		// $this->addForeignKey('products_admin_id', 'products', 'created_by', 'admin', 'id', 'CASCADE');
	}

	/**
	 * {@inheritdoc}
	 */
	public function down()
	{
		$this->dropTable('products');
	}

}