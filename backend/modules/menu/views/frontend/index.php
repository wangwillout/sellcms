<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\enums\MenuEnum;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\menu\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建菜单', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'parent_id',
                'value' => 'parent.name',
            ],
            'sort',
            [
                'attribute'=>'status',
                'value' => function($data) {
                    return MenuEnum::getStatus($data->status);
                },
            ],
            [
                'attribute'=>'level',
                'value' => function($data) {
                    return MenuEnum::getLevels($data->level);
                },
            ],
            // 'url:url',
            // 'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
