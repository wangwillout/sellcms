<!--advantage begin-->
<div class="infor-disclo">
    <div class="middle-width">
        <div class="z-advantage-main">
            <?php if ($list) { ?>
                <ul class="advantage-box clearfix">
                    <?php foreach ($list as $v) { ?>
                        <li>
                            <img src="<?=Yii::$app->fileStorage->baseUrl . '/' . $v->thumb?>" alt="<?=$v->title?>"/>
                            <h3><?=$v->title?></h3>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>
<!--advantage end-->