<?php

/* @var $this yii\web\View */

$this->title = '中创资本';
?>    
<div class="z-content">
    <!--轮播 S-->
    <div class="z-slider">
        <div class="banner">
            <ul>
                <?php if ($carousels) {?>
                    <?php foreach ($carousels as $carousel):?>
                        <li><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$carousel->img?>" alt="" width="100%" height="447"></li>
                    <?php endforeach;?>
                <?php }?>
            </ul>
            <div class="arrow-box">
                <a href="javascript:void(0);" class="unslider-arrow prev"><span class="arrow" id="al" ></span></a>
                <a href="javascript:void(0);" class="unslider-arrow next"><span class="arrow" id="ar" ></span></a>
            </div>
        </div>
    </div>
    <!--轮播 E-->
    <!--中视创投 S-->
    <div class="z-modul1">
        <div class="zsct-main z-w clearfix">
            <div class="zsct-text fl">
                <h2><?=$index->title?></h2>
                <span>（中视微影创投管理（深圳）有限公司）<i></i></span>
                    <?=$index->content?>
                <a class="more-btn" href="/about/company">了解更多</a>
            </div>
            <div class="pic fr"><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$index->thumb?>" alt="中视创投"/></div>
        </div>
    </div>
    <!--中视创投 E-->
   
    <!--团队管理 S-->
     <div class="z-modul mng-team">
        <div class="main z-w">
            <div class="z-h2-title">
                <h2>管理团队  <span>management team</span></h2>
            </div>
            <div class="team-content">
                <div class="team-bigbox">
                    <?php if ($teams) {?>
                        <?php foreach($teams as $t):?>
                            <div class="team-bigpic clearfix">
                                 <div class="pic fl"><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$t->img?>" alt="<?=$t->zh_name?>"/></div>
                                 <div class="team-text-box fr">
                                     <div class="team-text">
                                        <h4><?=$t->zh_name?>  <span><?=$t->position?></span></h4>
                                        <span class="eng"><?=$t->en_name?></span>
                                        <?=$t->presentation?>
                                        <a class="more-btn more-btnp" href="/about/team">了解更多</a>
                                     </div>
                                 </div>
                            </div>
                        <?php endforeach;?>
                    <?php }?>
                </div>
                <ul class="team-smallpic clearfix">
                    <?php if ($teams) {?>
                        <?php foreach ($teams as $k => $team):?>
                            <?php if ($k == 0) {?>
                                <li class="cur"><a><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$team->img?>" alt="<?=$team->zh_name?>"/><span class="bomb"></span><div class="pos"><span class="name"><?=$team->zh_name?></span></div></a></li>
                            <?php } else {?>
                                <li><a><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$team->img?>" alt="<?=$team->zh_name?>"/><span class="bomb"></span><div class="pos"><span class="name"><?=$team->zh_name?></span></div></a></li>
                            <?php }?>
                        <?php endforeach;?>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
    <!--团队管理 E-->
    <!--合作伙伴 S-->
    <div class="z-modul partner">
        <div class="main z-w">
            <div class="z-h2-title">
                <h2>合作伙伴  <span>partners</span></h2>
            </div>
            <ul class="partner-content clearfix">
                <?php if ($partner) {?>
                    <?php foreach ($partner as $v):?>
                        <li><a href="<?=$v->url?>" target="_blank"><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$v->img?>"/></a></li>
                    <?php endforeach;?>
                <?php } else {?>  
                        <li><a href="javaccript::void(0);">无合作伙伴</a></li>
                <?php }?>           
            </ul>
        </div>
    </div>
    <!--合作伙伴 E-->
</div>
<!--底部 S-->

<!--弹框 S-->
<div class="bomb-box block">
    <div class="bomb-bg">
    </div>
    <div class="bomb-main">
        <div class="bomb-top">
            <div class="title clearfix">
                <h3 class="tips fl">重要提示<span> IMPORTANT</span><i class="bomb-bar"></i></h3>
                <div class="fr"><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$logo->logo?>" alt="中创资本"/></div>

            </div>
        </div>
        <div class="bomb-center">
            <?=$bomb->content?>
            <!--p class="bomb-lable"> 中视微影创投管理（深圳）有限公司</p-->
        </div>
        <div class="bomb-bottom">
            <div class="main">
                <a class="sure" href="/site/index">我知道了</a>
                <a class="giveup-btn" onclick="custom_close()">放弃</a>
                <!--<span><i class="check"></i>记住选择，不再提醒</span>-->
            </div>
        </div>
    </div>
</div>
<!--弹框 E-->
<script type="text/javascript">
    /*弹框 S*/
    $(function(){
        host = "http://"+window.location.host+"/";
        url = window.location.href;
        if(url==host){
        	$('.bomb-box').show();
        	$('body').addClass('pfixed');
        }
        $('.bomb-bottom .sure').click(function(){
            $('.bomb-box').removeClass('block').hide();
            $('body').removeClass('pfixed');
            /*window.location.href="/site/index";*/
        });
    })
    
    function custom_close() {
        if (confirm("您确定要关闭本页吗？")) {
            window.opener = null;
            window.open('', '_self');
            window.close()
        } else { }
    }
    /*弹框 E*/
     /*partner S*/
       $(function(){
        var $lis=$('.partner-content li');
        $lis.each(function(index){
            index=index+1;
            if(index%5==0){
                $(this).css('margin-right','0');
                }
            });
       })
      /*partner E*/
   
</script>
