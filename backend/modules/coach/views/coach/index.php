<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\enums\TypeEnum;
use common\models\NewsType;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\coach\models\CoachSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '育儿辅导';
$this->params['breadcrumbs'][] = $this->title;

//图片域名
//$domain = 'http://7xjmzj.com1.z0.glb.clouddn.com/';
?>
<div class="list-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php if(Yii::$app -> user -> can('/coach/coach/create')){ ?>
        <p>
            <?= Html::a('+ 添加', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php } ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            ['attribute' => 'type', 'content' => function($data) {
                    return NewsType::findOne($data->type)->name;
                }
            ],
            ['attribute'=>'img','content'=> function($data) {
                    return '<img src="'.Yii::$app->params['domain'].$data->img.'" width=100 height=60 />';
                    //return '<img src='.$domain.'/'.$data->img.' width=100 height=60 />';
                }
            ],
            ['attribute' => 'display', 'content' => function($data) {
                    return TypeEnum::getDisplay($data->display);
                }
            ],
            ['attribute' => 'recommend', 'content' => function($data) {
                    return $data->recommend < 2 ? ($data->recommend < 1 ? '不推荐' : '推荐') : '最优推荐';
                }
            ],
            ['attribute' => 'create_time', 'content' => function($data) {
                    return date("Y-m-d H:i:s",$data->create_time);
                }
            ],

            //['class' => 'yii\grid\ActionColumn'],
             [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {groom} {bgroom} {ngroom}',
                'buttons' => [
                    'view' => function($url, $model, $key) {
                        if(Yii::$app -> user -> can('/coach/coach/view')){ 
                            return Html::a('<span class="glyphicon glyphicon-eye-open">查看</span>', $url, ['title' => '查看'] );  
                        }
                    },
                    'update' => function ($url) {
                        $options = [
                            'title' => Yii::t('yii', '编辑'),
                            'aria-label' => Yii::t('yii', 'update'),
                            'data-pjax' => '0',
                        ];
                        if(Yii::$app -> user -> can('/coach/coach/update')){ 
                            return Html::a('<span class="glyphicon glyphicon-pencil">编辑</span>', $url, $options);
                        }
                    },
                    'delete' => function($url, $model){
                        $html = '';
                            $html = Html::a('<span class="glyphicon glyphicon-trash">删除</span>', $url, [
                                'title' => '删除',
                                'data-confirm' => '您确定要删除？',
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                        if(Yii::$app -> user -> can('/coach/coach/delete')){ 
                            return $html;
                        }
                    },
                    'groom' => function($url, $model){
                        $html = '';
                        if ($model->recommend != 1) {
                            $html = Html::a('<span class="glyphicon glyphicon-hand-right">推荐</span>', $url, [
                                'title' => '推荐',
                                'data-confirm' => '您确定要把该文章设置为推荐？',
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                        } 
                        return $html;
                    },
                    'bgroom' => function($url, $model){
                        $html = '';
                        if ($model->recommend != 2) {
                            $html = Html::a('<span class="glyphicon glyphicon-thumbs-up">最优推荐</span>', $url, [
                                'title' => '最优推荐',
                                'data-confirm' => '您确定要把该文章设置为最优推荐？',
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                        } 
                        return $html;
                    },
                    'ngroom' => function($url, $model){
                        $html = '';
                        if ($model->recommend != 0) {
                            $html = Html::a('<span class="glyphicon glyphicon-thumbs-down">不推荐</span>', $url, [
                                'title' => '不推荐',
                                'data-confirm' => '您确定要把该文章设置为不推荐？',
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                        } 
                        return $html;
                    },
                ],
                'header' => '操作'
            ],
        ],
    ]); ?>

</div>
