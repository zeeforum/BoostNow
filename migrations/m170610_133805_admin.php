<?php

use yii\db\Schema;
use yii\db\Migration;

class m170610_133805_admin extends Migration
{

    private $tableName = 'admin';

    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull(),
            'email' => $this->string(255)->notNull(),
            'description' => $this->string(255),
            'picture' => $this->string(33),
            'auth_key' => $this->string(100)->notNull(),
            'password_hash' => $this->string(100)->notNull(),
            'access_token' => $this->string(100)->notNull(),
            'password_reset_token' => $this->string(100),
            'settings' => Schema::TYPE_TEXT,
            'status' => "ENUM('active', 'inactive', 'expire', 'ban', 'block') NOT NULL DEFAULT 'active'",
            'role' => "ENUM('admin', 'editor', 'author', 'contributor') NOT NULL DEFAULT 'author'",
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->insert($this->tableName, array(
                'username' => 'admin',
                'email' => 'admin@abc.xyz',
                'picture' => '1538425078908466.png',
                'auth_key' => Yii::$app->security->generateRandomString(),
                'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
                'access_token' => Yii::$app->security->generateRandomString() . time(),
                'password_reset_token' => '',
                'status' => 'active',
                'role' => 'admin',
            )
        );

        $this->insert($this->tableName, array(
                'username' => 'test',
                'email' => 'test@abc.xyz',
                'auth_key' => Yii::$app->security->generateRandomString(),
                'password_hash' => Yii::$app->security->generatePasswordHash('test'),
                'access_token' => Yii::$app->security->generateRandomString() . time(),
                'password_reset_token' => '',
                'status' => 'active',
                'role' => 'editor',
            )
        );

        $this->insert($this->tableName, array(
                'username' => 'testuser',
                'email' => 'testuser@abc.xyz',
                'auth_key' => Yii::$app->security->generateRandomString(),
                'password_hash' => Yii::$app->security->generatePasswordHash('test'),
                'access_token' => Yii::$app->security->generateRandomString() . time(),
                'password_reset_token' => '',
                'status' => 'active',
                'role' => 'editor',
            )
        );
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
