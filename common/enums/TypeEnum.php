<?php
namespace common\enums;

/**
* 类型枚举
* @author wangshunfeng
*/
class TypeEnum
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
     * 获取状态
     */
    public static function getDisplay($display = null)
    {
        $data = [
            self::STATUS_DISPLAY_NO => '不显示',
            self::STATUS_DISPLAY_YES => '显示',
        ];
        return is_null($display) ? $data : $data[$display];
    }
}
