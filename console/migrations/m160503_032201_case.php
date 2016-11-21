<?php

use console\migrations\Migration;

class m160503_032201_case extends Migration
{
    public function up()
    {
        $this->createTable('{{%case}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "案例id"',
            0 => 'PRIMARY KEY (`id`)',
            'name' => 'varchar(50) NOT NULL DEFAULT "" COMMENT "名称"',
            'presentation' => 'varchar(50) NOT NULL DEFAULT "" COMMENT "介绍"',
            'detail' => 'varchar(50) NOT NULL DEFAULT "" COMMENT "详情"',
            'sort' => 'int(11) NOT NULL DEFAULT "0" COMMENT "排序"',
            'status' => 'tinyint(1) NOT NULL DEFAULT "1" COMMENT "状态：0不显示;1显示"',
            'menu_id' => 'int(11) NOT NULL DEFAULT "0" COMMENT "菜单ID"',
            'logo' => 'varchar(255) NOT NULL DEFAULT "" COMMENT "logo"',
            'url' => 'varchar(100) NOT NULL DEFAULT "" COMMENT "链接地址"',
            'create_time' => 'int(11) NOT NULL COMMENT "创建时间"',
            'update_time' => 'int(11) NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%case}}');
    }

}
