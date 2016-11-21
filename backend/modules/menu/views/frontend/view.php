<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\enums\MenuEnum;

?>
<div class="detail-view">

    <p>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除此菜单?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app','Goback list'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th>{label}</th><td>{value}</td></tr>',
        'attributes' => [
            'id',
            'name',
            'sort',
            [
                'attribute'=>'status',
                'value' => MenuEnum::getStatus($model->status),
            ],
            [
                'attribute'=>'parent_id',
                'value' => $model->parent ? $model->parent->name : '-',
            ],
            [
                'attribute'=>'level',
                'value' => MenuEnum::getLevels($model->level),
            ],
            'url:url',
        ],
    ]) ?>

</div>
