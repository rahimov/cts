<?php

use yii\db\Schema;
use yii\db\Migration;

class m150209_121355_create_cat extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%cat}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'intro' => Schema::TYPE_TEXT . ' NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'address' => Schema::TYPE_TEXT . ' NOT NULL',
            'published' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            'createdon' => Schema::TYPE_DATETIME . ' NOT NULL',
            'editedon' => Schema::TYPE_DATETIME . ' NOT NULL'
        ], $tableOptions);
        $this->createIndex('username', '{{%user}}', 'username', true);

        $this->createTable('{{%photo}}', [
            'id' => Schema::TYPE_PK,
            'cat_id' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'file' => Schema::TYPE_STRING . ' NOT NULL',
            'sort' => Schema::TYPE_INTEGER . ' NOT NULL',
            'createdon' => Schema::TYPE_DATETIME . ' NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%cat}}');
        $this->dropTable('{{%photo}}');
    }
}
