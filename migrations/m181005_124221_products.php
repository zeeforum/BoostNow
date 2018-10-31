<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181005_124221_products
 */
class m181005_124221_products extends Migration
{
	private $tableName = 'products';

	/**
	 * {@inheritdoc}
	 */
	public function up()
	{
		$this->createTable($this->tableName, [
			'id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull(),
			'title' => $this->string(255)->notNull(),
			'description' => $this->string(255),
			'keywords' => $this->string(255),
			'main_picture' => $this->string(255),
			'detail' => $this->text(),
			'pictures' => $this->text(),
			'json' => $this->text(),
			'quantity' => $this->integer()->notNull()->defaultValue(0),
			'price' => $this->double()->notNull()->defaultValue(0),
			'cut_price' => $this->double()->notNull()->defaultValue(0),
			'cut_price_type' => "ENUM('value', 'percentage') NOT NULL DEFAULT 'value'",
			'category_id' => $this->integer()->notNull()->defaultValue(0),
			'draft' => "ENUM('no', 'yes') NOT NULL DEFAULT 'no'",
			'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'created_by' => $this->integer()->notNull()->defaultValue(0),
		]);

		//index
		$this->createIndex('name', $this->tableName, 'name');
		$this->createIndex('title', $this->tableName, 'title');
		$this->createIndex('category_id', $this->tableName, 'category_id');

		//foreign keys
		// $this->addForeignKey('products_category_id', 'products', 'category_id', 'categories', 'id', 'CASCADE');
		// $this->addForeignKey('products_admin_id', 'products', 'created_by', 'admin', 'id', 'CASCADE');

		$this->insert($this->tableName, array(
				'name' => "Hot S3X - 6.2'' - 32GB ROM - 3GB RAM - Milan Black",
				'title' => "Hot S3X - 6.2'' - 32GB ROM - 3GB RAM - Milan Black",
				'keywords' => 'infinix, infinix mobile',
				'detail' => 'Installment: Up to 12 months, as low as Rs. 1,875 per month.',
				'quantity' => '40',
				'price' => '22499',
				'category_id' => '7',
				'draft' => 'no',
				'created_by' => '1',
			)
		);

		$this->insert($this->tableName, array(
				'name' => "Nova 3I - 6.3\" Full View Display 4Gb-Ram, 128Gb Rom, 4 Cameras- Iris Purple",
				'title' => "Nova 3I - 6.3\" Full View Display 4Gb-Ram, 128Gb Rom, 4 Cameras- Iris Purple",
				'keywords' => 'huawei, huawei mobile',
				'detail' => 'Installment: Up to 12 months, as low as Rs. 1,875 per month.',
				'quantity' => '10',
				'price' => '45000',
				'category_id' => '7',
				'draft' => 'no',
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