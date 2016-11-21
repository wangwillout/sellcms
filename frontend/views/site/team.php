<?php

$this->title = '中创资本--管理团队';
?>
<!--menu-banner begin-->
<div class="s-banner-pic"><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$banner->img?>"> </div>
<!--menu-banner end-->

<!--second-list-menu begin-->
<div class="s-list-menu">
    <div class="middle-width">
        <ul class="clearfix menu-queue clear">
            <?php if ($seconds) {?>
                <?php foreach ($seconds as $second):?>
                    <?php 
                        $action = '/'.$this->context->id.'/'.$this->context->action->id;
                        $active = $second->url == $action;
                    ?>
                    <li <?php if ($active) {?> class="menu-actives" <?php }?> ><a href="<?=$second->url?>"><?=$second->name?></a></li>
                <?php endforeach;?>
            <?php }?>
        </ul>
    </div>
</div>
<!--second-list-menu end-->

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