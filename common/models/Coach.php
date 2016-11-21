<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%coach}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $type
 * @property string $img
 * @property integer $display
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $join_cost
 * @property string $content
 * @property integer $create_time
 * @property integer $update_time
 */
class Coach extends \yii\db\ActiveRecord
{
    public $img_file;
    public $pic_;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%coach}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'type', 'display', 'create_time'], 'required'],
            [['type', 'display', 'join_cost', 'create_time', 'update_time','recommend'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['img'], 'string', 'max' => 255],
            [['img_file'],'safe']
        ];
    }

    /**
     **图片上传
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'img_file',
                'pathAttribute' => 'img',
                'baseUrlAttribute' => false,
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '幼儿辅导ID'),
            'title' => Yii::t('app', '标题'),
            'type' => Yii::t('app', '类型'),
            'img' => Yii::t('app', '图片'),
            'img_file' => Yii::t('app', '图片'),
            'display' => Yii::t('app', '是否显示'),
            'start_time' => Yii::t('app', '活动开始时间'),
            'end_time' => Yii::t('app', '活动结束时间'),
            'join_cost' => Yii::t('app', '参与人数'),
            'recommend' => Yii::t('app', '是否推荐'),
            'content' => Yii::t('app', '内容'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '修改时间'),
        ];
    }
}
