<?php
namespace common\services;

use yii;
use common\models\Menu;
use common\enums\MenuEnum;
use yii\helpers\ArrayHelper;

/**
 * 系统管理服务
 * @author xiaomalover <xiaomalover@gmail.com>
 */
class MenuService
{
    /**
     * 获取后端菜单
     */
    public static function getMenu()
    {
        $list = Menu::find()->where([
            'status' => MenuEnum::STATUS_DISPLAY_YES,
            'type' => MenuEnum::TYPE_BACKEND
        ])->orderBy('sort asc')->all();
        $menu = [];
        foreach ($list as $v) {
            if ($v->parent_id == 0) {
                $item['text'] = $v->name;
                $item['collapsed'] = true;
                $child = [];
                foreach ($list as $v_child) {
                    if ($v_child->parent_id == $v->id) {
                        $c['id'] = $v_child->id;
                        $c['text'] = $v_child->name;
                        $c['href'] = $v_child->url;
                        $child[] = $c;
                    }
                }
                $item['items'] = $child;
                $menu[] = $item;
            }
        }
        return json_encode($menu);
    }

    /**
     * 获取父类菜单
     * 本系统只两级菜单
     * @param Int $type 菜单类型是前端还是后端
     * @param Int $self_id 修改时当前菜单自已的id
     */
    public static function getParentList($type, $self_id = null)
    {
        $query = Menu::find()->where([
            'type' => $type,
            'parent_id' => 0,
        ])->andWhere(['<>', 'status', MenuEnum::STATUS_DELETED]);
        if ($self_id) {
            $query->andWhere(['<>', 'id', $self_id]);
        }
        $query->orderBy('sort asc');
        $parent = $query->all();
        return ArrayHelper::map($parent, 'id', 'name');
    }

    /**
     * 获取前端二级菜单
     */
    public static function getSecondMenu($parent_id)
    {
        $list = Menu::find()->where([
            'status' => MenuEnum::STATUS_DISPLAY_YES,
            'type' => MenuEnum::TYPE_FRONTEND,
            'parent_id' => $parent_id,
        ])->orderBy('sort asc')->all();
        return $list;
    }

    /**
     * 获取前端底部菜单
     */
    public static function getFrontMenu()
    {
        $list = Menu::find()->where([
            'status' => MenuEnum::STATUS_DISPLAY_YES,
            'type' => MenuEnum::TYPE_FRONTEND
        ])->orderBy('sort asc')->all();
        $menu = [];
        $setNext = false;
        foreach ($list as $v) {
            if ($v->parent_id == 0) {
                $item['name'] = $v->name;
                $item['active'] = false;
                $item['url'] = $v->url;
                $item['next'] = false;
                $item['defaultUrl'] = false;
                if ($setNext) {
                    $item['next'] = true;
                    $setNext = false;
                }
                $child = [];
                foreach ($list as $v_child) {
                    if ($v_child->parent_id == $v->id) {
                        $c['id'] = $v_child->id;
                        $c['name'] = $v_child->name;
                        $c['href'] = $v_child->url;
                        $child[] = $c;
                        //判断是否激活父菜单样式
                        if (!$item['active']) {
                            $url = Yii::$app->request->getUrl();
                            if ($url == $v_child->url) {
                                $item['active'] = true;
                                $setNext = true;
                            }
                        }

                        //设置第一个子菜单的url为默认url
                        if (!$item['defaultUrl']) {
                            $item['defaultUrl'] = $v_child->url;
                        }
                    }
                }
                $item['items'] = $child;
                //  如果没有子菜单
                if (!$item['items']) {
                    $url = Yii::$app->request->getUrl();
                    if ($url == $v->url) {
                        $item['active'] = true;
                        $setNext = true;
                    }
                    //如果主菜单没有子菜单，但自已有url，就把默认主菜单url设置为自己的url
                    $item['defaultUrl'] = $item['url'];
                }

                $menu[] = $item;
            }
        }
        return $menu;
    }
}
