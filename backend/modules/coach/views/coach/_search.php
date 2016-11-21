<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\enums\TypeEnum;
use common\models\NewsType;
use yii\helpers\ArrayHelper;

$typeList = NewsType::find()->asArray()->all();
?>

<div class="search-form">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(($typeList), 'id', 'name'), ['prompt' => '全部']) ?>

    <?= $form->field($model, 'display')->dropDownList(TypeEnum::getDisplay(),['prompt' => '全部']) ?>

    <?=$form->field($model, 'create_time')->widget(common\widgets\datepicker\DatePicker::className(), [
        'options' => [
            'istime' => true,
            'readonly' => true,
            'format' => 'YYYY-MM-DD',
        ],
    ])?>

    <?=$form->field($model, 'create_time_end')->widget(common\widgets\datepicker\DatePicker::className(), [
        'options' => [
            'istime' => true,
            'readonly' => true,
            'format' => 'YYYY-MM-DD',
        ],
    ])?>

    <div class="form-group search-button">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
