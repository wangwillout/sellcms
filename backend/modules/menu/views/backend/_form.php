<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\enums\MenuEnum;
use common\services\MenuService;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
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
    <?= $form->field($model, 'name',['options'=>['class'=>'control-group span8']])->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'parent_id',['options'=>['class'=>'control-group span8']])->dropdownList(MenuService::getParentList(MenuEnum::TYPE_BACKEND, $model->isNewRecord ? null : $model->id)
            , ['class' => 'form-control', 'prompt' => '请选择'])?>
    <?= $form->field($model, 'sort',['options'=>['class'=>'control-group span8']])->textInput(['maxlength' => true]) ?>   
    <?php  if(Yii::$app->controller->action->id=='update'){?>
        <?= $form->field($model, 'url',['options'=>['class'=>'control-group span8']])->textInput(['disabled'=>'disabled']) ?>
    <?php }else{ ?>
        <?= $form->field($model, 'url',['options'=>['class'=>'control-group span8']])->textInput(['maxlength' => true]) ?>
    <?php } ?>
</div>

<div class="row">
    <?= $form->field($model, 'status',['options'=>['class'=>'control-group span8']])->dropdownList(MenuEnum::getStatus()
            , ['class' => 'form-control', 'prompt' => '请选择'])?>
    <?= $form->field($model, 'type',['options'=>['class'=>'control-group span8']])->hiddenInput(['value' => MenuEnum::TYPE_BACKEND])->label(false) ?>
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
