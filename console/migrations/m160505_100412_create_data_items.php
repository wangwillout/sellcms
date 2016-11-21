<?php

use console\migrations\Migration;

class m160505_100412_create_data_items extends Migration
{
    public function up()
    {
        $this->createTable('{{%data_items}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->comment('标题'),
            'content' => $this->text()->comment('内容'),
            'thumb' => $this->string(128)->comment('略缩图'),
            'sort' => $this->integer()->comment('排序'),
            'menu_id' => $this->integer()->notNull()->comment('菜单id'),
            'status' => $this->smallInteger()->defaultValue(1)->comment('0无效，1有效，2删除'),
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%data_items}}');
    }
}
