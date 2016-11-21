<?php

use console\migrations\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->tableOptions);

        /**
         * 初始化管理用户(密码为123456)
         */
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => 'S21OxHz6KVPfZSQs5qWRzng49Bw_JpCf',
            'password_hash' => '$2y$13$icM.sVaY/R62ZSTpADcuYeHxz82PwSq/hUYPKueT7yZs1u7GK41yC',
            'email' => 'admin@admin.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
