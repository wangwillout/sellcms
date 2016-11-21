<?php

use console\migrations\Migration;

class m160509_072542_carousel extends Migration
{
    public function up()
    {
        $this->createTable('{{%carousel}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "id"',
            0 => 'PRIMARY KEY (`id`)',
            'img' => 'varchar(255) NOT NULL DEFAULT "" COMMENT "图片"',
            'status' => 'tinyint(1) NOT NULL DEFAULT "1" COMMENT "状态：0不显示;1显示"',
            'create_time' => 'int(11) NOT NULL COMMENT "创建时间"',
            'update_time' => 'int(11) NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%carousel}}');
    }

}
