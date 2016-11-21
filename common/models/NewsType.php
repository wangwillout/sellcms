<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%newstype}}".
 *
 * @property integer $id
 * @property string $name
 */
class NewsType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%newstype}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '类型ID'),
            'name' => Yii::t('app', '类型名称'),
        ];
    }
}
