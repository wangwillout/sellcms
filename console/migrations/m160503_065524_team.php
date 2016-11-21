<?php

use console\migrations\Migration;

class m160503_065524_team extends Migration
{
    public function up()
    {
        $this->createTable('{{%team}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "管理团队id"',
            0 => 'PRIMARY KEY (`id`)',
            'zh_name' => 'varchar(32) NOT NULL DEFAULT "" COMMENT "中文名字"',
            'en_name' => 'varchar(32) NOT NULL DEFAULT "" COMMENT "英文名字"',
            'sort' => 'int(11) NOT NULL DEFAULT "0" COMMENT "排序"',
            'position' => 'varchar(20) NOT NULL DEFAULT "" COMMENT "职位"',
            'img' => 'varchar(255) NOT NULL DEFAULT "" COMMENT "图片"',
            'create_time' => 'int(11) NOT NULL COMMENT "创建时间"',
            'update_time' => 'int(11) NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%team}}');
    }

}
