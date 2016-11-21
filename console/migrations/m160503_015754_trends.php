<?php

use console\migrations\Migration;

class m160503_015754_trends extends Migration
{
    public function up()
    {
        $this->createTable('{{%trends}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "动态id"',
            0 => 'PRIMARY KEY (`id`)',
            'title' => 'varchar(32) NOT NULL DEFAULT "" COMMENT "主题"',
            'sort' => 'int(11) NOT NULL DEFAULT "0" COMMENT "排序"',
            'abstract' => 'varchar(150) NOT NULL DEFAULT "" COMMENT "摘要"',
            'status' => 'tinyint(1) NOT NULL DEFAULT "1" COMMENT "状态：0不显示;1显示"',
            'menu_id' => 'int(11) NOT NULL DEFAULT "0" COMMENT "菜单ID"',
            'img' => 'varchar(255) NOT NULL DEFAULT "" COMMENT "图片"',
            'create_time' => 'int(11) NOT NULL COMMENT "创建时间"',
            'update_time' => 'int(11) NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);

    }

    public function down()
    {
         $this->dropTable('{{%trends}}');
    }

}
