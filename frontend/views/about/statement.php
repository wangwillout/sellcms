<?php if ($model) { ?>
    <!--information disclosure begin-->
    <div class="company-profile-box">
        <div class="middle-width">
            <div class="board-main-content clearfix clear pt3 pb3">
                <div class="fl board-main-left">
                    <div class="board-name-pictures"><img src="<?=Yii::$app->fileStorage->baseUrl . '/' . $model->thumb?>"></div>
                </div>
                <div class="fl board-main-right">
                    <div class="board-content-middle">
                        <h1><?=$model->title?></h1>
                        <br>
                        <?=$model->content?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--information disclosure end-->
<?php } ?>