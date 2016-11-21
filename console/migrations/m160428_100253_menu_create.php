<?php

use console\migrations\Migration;

class m160428_100253_menu_create extends Migration
{
    public function up()
    {
        $this->createTable('{{%menu}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "菜单id"',
            0 => 'PRIMARY KEY (`id`)',
            'name' => 'varchar(32) NOT NULL DEFAULT "" COMMENT "菜单名"',
            'sort' => 'int(11) NOT NULL DEFAULT "0" COMMENT "排序"',
            'status' => 'tinyint(1) NOT NULL DEFAULT "1" COMMENT "菜单状态：0不显示;1显示;2删除"',
            'parent_id' => 'int(11) NOT NULL DEFAULT "0" COMMENT "父菜单ID"',
            'level' => 'tinyint(4) NOT NULL DEFAULT "1" COMMENT "菜单级别"',
            'url' => 'varchar(100) NOT NULL COMMENT "链接地址"',
            'type' => 'tinyint(4) NOT NULL COMMENT "菜单类型（0为前端，1为后端）"',
        ], $this->tableOptions);

        $this->execute("INSERT INTO {{%menu}} VALUES
            ('1', '菜单管理', '8', '1', '0', '1', '', '1'),
            ('2', '前端菜单', '1', '1', '1', '2', '/menu/frontend/index', '1'),
            ('3', '后端菜单', '2', '1', '1', '2', '/menu/backend/index', '1')"
        );
    }

    public function down()
    {
        $this->dropTable('{{%menu}}');
    }
}
