<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property string $id
 * @property string $name
 * @property string $sort
 * @property integer $status
 * @property integer $parent_id
 * @property integer $level
 * @property string $url
 * @property integer $type
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'level', 'type', 'sort'], 'integer'],
            [['name', 'status', 'sort'], 'required'],
            [['name'], 'string', 'max' => 32],
            [['url'], 'string', 'max' => 100],
            [['parent_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '菜单名',
            'sort' => '排序',
            'status' => '菜单状态',
            'parent_id' => '父菜单',
            'level' => '菜单等级',
            'url' => '链接',
            'type' => '菜单类型',
        ];
    }

    /**
     * Parent relation
     */
    public function getParent()
    {
        return $this->hasOne(Menu::className(), ['id' => 'parent_id']);
    }

    /**
     * 查询菜单
     */
    public static function getMenu() {

        $list = self::find()
                ->where(['status'=>1,'parent_id'=>0,'level'=>1,'type'=>0])
                ->orderBy('sort asc')
                ->all();
        if ($list) {
            return $list;
        } else {
            return false;
        }
    }

    /**
     * 查询二级菜单
     */
    public static function getSecondMenu($pid = 0) {

        $slist = self::find()
                ->where(['status'=>1,'parent_id'=>$pid,'level'=>2,'type'=>0])
                ->orderBy('sort asc')
                ->all();
        if ($slist) {
            return $slist;
        } else {
            return false;
        }   
    }


   /**
     * 查询全部分类
     */
    public static function getAllMenuList($pid = 0, $array = [], $deep = 0, $add = 2, $repeat = '－'){
        $strRepeat = '';
        if($deep > 1 ){
            for ($i=0; $i < $deep; $i++) { 
                $strRepeat .= $repeat;
            }
        }

        $newArray = array();
        foreach((array)$array as $v) {
            if ($v['parent_id'] == $pid) {
                $item = (array)$v;
                $item['label'] = '|－'.$strRepeat . $v['name'];
                $newArray[] = $item;

                $tempArray = self::getAllMenuList($v['id'], $array,($deep + $add), $add, $repeat);
                if ($tempArray) {
                    $newArray = array_merge($newArray,$tempArray);
                }
            }
        }
        return $newArray;
    }


}
