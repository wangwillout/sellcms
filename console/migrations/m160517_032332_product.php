<?php

use console\migrations\Migration;

class m160517_032332_product extends Migration
{
    public function up()
    {
        $this->createTable('{{%product}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "产品id"',
            0 => 'PRIMARY KEY (`id`)',
            'name' => 'varchar(32) NOT NULL  COMMENT "产品名称"',
            'content' => 'text NOT NULL  COMMENT "产品内容"',
            'remark' => 'text NULL COMMENT "备注"',
            'img' => 'varchar(255) NOT NULL DEFAULT "" COMMENT "图片"',
            'de_img' => 'varchar(255) NOT NULL DEFAULT "" COMMENT "详情图片"',
            'sort' => 'int(11) NOT NULL DEFAULT "0" COMMENT "排序"',
            'status' => 'tinyint(1) NOT NULL DEFAULT "1" COMMENT "状态：1出售;2售罄"',
            'display' => 'tinyint(1) NOT NULL DEFAULT "1" COMMENT "是否显示：0不显示;1显示"',
            'create_time' => 'int(11) NOT NULL COMMENT "创建时间"',
            'update_time' => 'int(11) NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
