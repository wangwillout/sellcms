<?php if ($model) { ?>
<div class="infor-disclo">
    <div class="middle-width">
        <div class="z-content-main organize-box">
            <img src="<?=Yii::$app->fileStorage->baseUrl . '/' . $model->thumb?>" alt="<?=$model->title?>"/>
            <h2 class="organize-title"><?=$model->title?></h2>
        </div>
    </div>
</div>
<?php } ?>