<?php
namespace common\enums;

/**
* 菜单枚举
* @author xiaomalover <xiaomalover@gmail.com>
*/
class MenuEnum
{
    /**
     * 不显示状态
     */
    const STATUS_DISPLAY_NO = 0;

    /**
     * 显示状态
     */
    const STATUS_DISPLAY_YES = 1;

    /**
     * 删除状态
     */
    const STATUS_DELETED = 2;

    /**
     * 前端菜单
     */
    const TYPE_FRONTEND = 0;

    /**
     * 后端菜单
     */
    const TYPE_BACKEND = 1;

    /**
     * 获取状态
     */
    public static function getStatus($status = null)
    {
        $data = [
            self::STATUS_DISPLAY_NO => '不显示',
            self::STATUS_DISPLAY_YES => '显示',
        ];
        return is_null($status) ? $data : $data[$status];
    }

    /**
     * 获取等级
     */
    public static function getLevels($level = null)
    {
        $data = [
            1 => '一级菜单',
            2 => '二级菜单',
        ];
        return is_null($level) ? $data : $data[$level];
    }
}
