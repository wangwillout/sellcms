<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\NewsType;
use common\enums\TypeEnum;
?>
<div class="detail-view">

    <p>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app','Goback list'), ['index'], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th>{label}</th><td>{value}</td></tr>',
        'attributes' => [
            'title',
            ['attribute' => 'type', 'value' => NewsType::findOne($model->type)->name],
            'img',
            //['attribute' => 'img', 'value' => 'Html::img(Yii::$app->params['domain'].$model->img,['width'=>'100px','height'=>'60px']) ],
            ['attribute' => 'start_time', 'value' => !empty($model->start_time) ? date("Y-m-d H:i:s",$model->start_time) : ''],
            ['attribute' => 'end_time', 'value' => !empty($model->end_time) ? date("Y-m-d H:i:s",$model->end_time) : ''],
            ['attribute' => 'join_cost', 'value' => !empty($model->join_cost) ? $model->join_cost : ''],
            ['attribute' => 'display', 'value' => TypeEnum::getDisplay($model->display)],
            ['attribute' => 'create_time', 'value' => date("Y-m-d H:i:s",$model->create_time)],
            ['attribute' => 'update_time', 'value' => !empty($model->update_time) ? date("Y-m-d H:i:s",$model->update_time) : ''],
        ],
    ]) ?>

</div>
