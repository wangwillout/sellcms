<?php

use console\migrations\Migration;

class m160503_034257_joinus extends Migration
{
    public function up()
    {
        $this->createTable('{{%joinus}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "加入我们id"',
            0 => 'PRIMARY KEY (`id`)',
            'position' => 'varchar(32) NOT NULL DEFAULT "" COMMENT "职位名称"',
            'work_type' => 'tinyint(4) NOT NULL COMMENT "工作类型"',
            'work_place' => 'varchar(50) NOT NULL COMMENT "工作地点"',
            'sort' => 'int(11) NOT NULL DEFAULT "0" COMMENT "排序"',
            'status' => 'tinyint(1) NOT NULL DEFAULT "1" COMMENT "状态：0不显示;1显示"',
            'detail' => 'text NULL COMMENT "详情"',
            'menu_id' => 'int(11) NOT NULL DEFAULT "0" COMMENT "菜单ID"',
            'create_time' => 'int(11) NOT NULL COMMENT "创建时间"',
            'update_time' => 'int(11) NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%joinus}}');
    }

}
