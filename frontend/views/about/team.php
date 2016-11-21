<?php
$this->title = '关于我们--管理团队';
?>

<!--information disclosure begin-->
<div class="infor-disclo">
    <div class="middle-width">
        <ul class="clearfix clear team-main-box">
            <?php if ($teams) {?>
                <?php foreach ($teams as $team):?>
                    <li class="clearfix clear">
                        <div class="fl team-pic"><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$team->img?>"></div>
                        <div class="fl team-mains-content">
                            <div class="team-title-name"><span><?=$team->zh_name?></span><small><?=$team->position?></small>
                                 <p><?=$team->en_name?></p>
                            </div>
                            <div class="team-mainer"><?=$team->presentation?></div>
                        </div>
                    </li>
                <?php endforeach;?>
            <?php }?>
        </ul>
        <!--分页 begin-->

        <!--分页 end-->
    </div>
</div>
<!--information disclosure end-->