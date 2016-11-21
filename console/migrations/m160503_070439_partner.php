<?php

use console\migrations\Migration;

class m160503_070439_partner extends Migration
{
    public function up()
    {
        $this->createTable('{{%partner}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "合作伙伴id"',
            0 => 'PRIMARY KEY (`id`)',
            'name' => 'varchar(32) NOT NULL DEFAULT "" COMMENT "名称"',
            'sort' => 'int(11) NOT NULL DEFAULT "0" COMMENT "排序"',
            'url' => 'varchar(150) NOT NULL DEFAULT "" COMMENT "链接地址"',
            'img' => 'varchar(255) NOT NULL DEFAULT "" COMMENT "图片"',
            'create_time' => 'int(11) NOT NULL COMMENT "创建时间"',
            'update_time' => 'int(11) NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%partner}}');
    }

}
