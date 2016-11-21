<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $route
 * @property integer $order
 * @property resource $data
 *
 * @property Menu $parent0
 * @property Menu[] $menus
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
            [['name'], 'required'],
            [['parent', 'order'], 'integer'],
            [['data'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['route'], 'string', 'max' => 255],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '菜单ID',
            'name' => '名称',
            'parent' => '父类ID',
            'route' => '路径',
            'order' => 'Order',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Menu::className(), ['id' => 'parent']);
    }

     /**
     * Parent relation
     */
    public function getParent()
    {
        return $this->hasOne(Menu::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['parent' => 'id']);
    }

    /**
     * 查询菜单
     */
    public static function getMenu() {

        $list = self::find()
                ->where(['parent'=>0])
                ->orderBy('order asc')
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
                ->where(['parent'=>$pid])
                ->orderBy('order asc')
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
            if ($v['parent'] == $pid) {
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
