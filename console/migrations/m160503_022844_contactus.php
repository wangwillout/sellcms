<?php

use console\migrations\Migration;

class m160503_022844_contactus extends Migration
{
    public function up()
    {
        $this->createTable('{{%contactus}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "联系我们id"',
            0 => 'PRIMARY KEY (`id`)',
            'company_name' => 'varchar(32) NOT NULL DEFAULT "" COMMENT "公司名称"',
            'content' => 'text NULL COMMENT "内容"',
            'menu_id' => 'int(11) NOT NULL DEFAULT "0" COMMENT "菜单ID"',
            'img' => 'varchar(255) NOT NULL DEFAULT "1" COMMENT "图片"',
            'create_time' => 'int(11) NOT NULL COMMENT "创建时间"',
            'update_time' => 'int(11) NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%contactus}}');
    }

}
