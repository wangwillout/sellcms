<?php
use yii\helpers\Html;


$this->title='更新菜单' . ':  ' . $model->name;
?>
<div class="create-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
