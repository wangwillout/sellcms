<?php
use yii\helpers\Html;


$this->title='编辑育儿辅导' . ':  ' . $model->title;
?>
<div class="create-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
