<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\enums\MenuEnum;
use common\services\MenuService;

?>

<div class="search-form">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'parent_id')->dropdownList(MenuService::getParentList(MenuEnum::TYPE_FRONTEND), ['prompt' => '请选择']) ?>

    <?= $form->field($model, 'status')->dropdownList(MenuEnum::getStatus(), ['prompt' => '请选择']) ?>

<div class='clear'></div>
    <?= $form->field($model, 'level')->dropdownList(MenuEnum::getLevels(), ['prompt' => '请选择']) ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'type') ?>

    <div class="form-group search-button">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
