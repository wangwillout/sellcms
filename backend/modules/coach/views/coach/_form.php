<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use trntv\filekit\widget\Upload;
use common\models\NewsType;
use yii\helpers\ArrayHelper;
use common\enums\TypeEnum;
use \kucha\ueditor\UEditor;
/* @var $this yii\web\View */
/* @var $model common\models\Coach */
/* @var $form yii\widgets\ActiveForm */
$typeList = NewsType::find()->asArray()->all();
?>

<div class="update-form">

    <?php $form = ActiveForm::begin([
        'id' => 'member-form',
        'options' => ['class' => 'form-horizontal bui-form-horizontal bui-form bui-form-field-container'], 
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"controls\">{input}<span class=\"valid-text\">{error}</span></div>",
            'labelOptions' => ['class' => 'lable-text control-label'],
            'errorOptions'=>['class'=>'valid-text']
        ],
    ]); ?>

    
    
    
<div class="row">
    <?= $form->field($model, 'title')->textInput(['style' => 'width:200px;']) ?>
</div>
<div class="row">
    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(($typeList), 'id', 'name'), ['prompt' => '请选择']) ?>
</div>
<div class="row">    
    <?php
        echo $form->field($model, 'img_file')->widget(
        Upload::className(),
        [
            'url' => ['upload'],
            'maxFileSize' => 50000000, // 5 MiB
        ]);
    ?>    
</div>
<div class="row" style="color:red;margin-left:100px;">上传图片的尺寸:750×360</div><br>
<div class="row">
    <?=$form->field($model, 'start_time')->widget(common\widgets\datepicker\DatePicker::className(), [
        'options' => [
            'istime' => true,
            'readonly' => true,
            'format' => 'YYYY-MM-DD',
        ],
    ])?>
</div>
<div class="row">    
    <?=$form->field($model, 'end_time')->widget(common\widgets\datepicker\DatePicker::className(), [
        'options' => [
            'istime' => true,
            'readonly' => true,
            'format' => 'YYYY-MM-DD',
        ],
    ])?>
</div>
<div class="row">    
    <?= $form->field($model, 'display')->radioList(TypeEnum::getDisplay()) ?>
</div>
<?php if (Yii::$app->controller->action->id == 'update') { ?>
<div class="row">    
    <?= $form->field($model, 'join_cost')->textInput() ?>
</div>
<?php } ?>
<div class="row">   
    <?php
        echo $form->field($model, 'content')->widget(
            \yii\imperavi\Widget::className(),
            [
                'plugins' => ['fullscreen', 'fontcolor', 'video','image'],
                'options' => [
                    'minHeight' => 600,
                    'maxHeight' => 600,
                    'buttonSource' => true,
                    'convertDivs' => false,
                    'removeEmptyTags' => false,
                    'imageUpload' => Url::to(['upload-imperavi'])
                ]
            ]
        );
        /*echo $form->field($model,'content')->widget('kucha\ueditor\UEditor',[
                'clientOptions' => [
                    //编辑区域大小
                    //'initialFrameHeight' => '200',
                    //设置语言
                    'lang' =>'zh-cn', //中文为 zh-cn
                    //定制菜单
                    'toolbars' => [
                        [
                            'fullscreen', 'source', 'undo', 'redo', '|',
                            'fontsize',
                            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                            'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                            'forecolor', 'backcolor', '|',
                            'lineheight', '|',
                            'indent', '|'
                        ],
                    ]
                ]
            ]);*/
    ?>
</div>


<div class="row-btn">
    <div class="btn-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
    </div>
     <div class="btn-group">
    <?= Html::a(Yii::t('app', 'Goback list'), ['index'], ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
