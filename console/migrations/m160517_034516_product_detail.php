<?php

use console\migrations\Migration;

class m160517_034516_product_detail extends Migration
{
    public function up()
    {
        $this->createTable('{{%product_detail}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "产品详情id"',
            0 => 'PRIMARY KEY (`id`)',
            'title' => 'varchar(32) NOT NULL  COMMENT "标题"',
            'content' => 'text NOT NULL  COMMENT "内容"',
            'status' => 'tinyint(1) NOT NULL DEFAULT "1" COMMENT "是否显示：0不显示;1显示"',
            'sort' => 'int(11) NOT NULL DEFAULT "0" COMMENT "排序"',
            'create_time' => 'int(11) NOT NULL COMMENT "创建时间"',
            'update_time' => 'int(11) NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%product_detail}}');
    }

}
