<?php

use yii\db\Migration;

class m170609_182522_User extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull(),
            'email' => $this->string(255)->notNull(),
            'auth_key' => $this->string(100)->notNull(),
            'password_hash' => $this->string(100)->notNull(),
            'access_token' => $this->string(100)->notNull(),
            'password_reset_token' => $this->string(100),
            'status' => "ENUM('active', 'inactive', 'expire', 'ban', 'block') NOT NULL DEFAULT 'active'",
        ]);

        $this->insert('users', array(
                'username' => 'admin',
                'email' => 'zartashzulfiqar@gmail.com',
                'auth_key' => Yii::$app->security->generateRandomString(),
                'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
                'access_token' => Yii::$app->security->generateRandomString() . time(),
                'password_reset_token' => '',
                'status' => 'active',
            )
        );
    }

    public function down()
    {
        $this->dropTable('users');
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
