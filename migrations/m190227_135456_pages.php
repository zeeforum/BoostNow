<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m190227_135456_pages
 */
class m190227_135456_pages extends Migration
{
	private $tableName = 'pages';

	/**
	 * {@inheritdoc}
	 */
	public function up()
	{
		$this->createTable($this->tableName, [
			'id'          => $this->primaryKey(),
			'title'       => $this->string(140)->notNull(),
			'page_title'  => $this->string(140)->notNull(),
			'seo_url'     => $this->string(140)->notNull(),
			'description' => $this->string(255),
			'keywords'    => $this->string(255),
			'content'     => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
			'draft'       => "ENUM('no', 'yes') NOT NULL DEFAULT 'no'",
			'section'     => $this->string(80),
			'created_at'  => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at'  => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'created_by'  => $this->integer()->notNull()->defaultValue(0),
		]);

		//index
		$this->createIndex('title', $this->tableName, 'title');
		$this->createIndex('seo_url', $this->tableName, 'seo_url');

		$this->insert($this->tableName, array(
				'title' => "Test App",
				'page_title' => "Test Application to Show",
				'seo_url' => "test-app",
				'keywords' => 'test, app, keywords',
				'description' => 'test description to show',
				'section' => 'footer',
				'content' => 'Test Content for the application',
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