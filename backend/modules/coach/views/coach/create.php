<?php

use yii\helpers\Html;

$this->title = '添加育儿辅导';
?>
<div class="create-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
