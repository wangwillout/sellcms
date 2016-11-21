<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\Menu;
use common\services\MenuService;
use common\enums\MenuIdEnum;
use common\models\Banners;
use common\models\BasicSetting;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--[if IE 8]><link rel="stylesheet" href="/css/ie8.css"><![endif]-->
</head>
<body>
<?php $this->beginBody() ?>

<?php
    $menu = MenuService::getFrontMenu();
    //查询基本信息
    $basic = BasicSetting::find()->one();
?>

<!--头部 S-->
<div class="header">
    <div class="hd1">
        <div class="main clearfix">
            <div class="logo fl"><a href="/"><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$basic->logo?>"/></a></div>
            <div class="phone fr"><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$basic->phone_img?>"/></div>
        </div>
    </div>
    <div class="hd2">
        <div class="nav-box">
            <ul class="z-nav">
                <li class="nav-li"><a href="/site/index" <?php if ($this->context->id == 'site' && $this->context->action->id == 'index') { ?> class="cur" <?php } ?> >首页</a></li>
                <?php if ($menu) {foreach ($menu as $v_top) {
                        $active = $v_top['active'];
                        $next = $v_top['next'];

                        if ($this->context->action->id == 'index' &&
                             $this->context->id == 'site'
                        ) {
                            if ($v_top['name'] == '关于我们') {
                                $next = true;
                            }
                        }

                        if (!$active && $this->context->action->id == 'dynamics' ||
                             $this->context->action->id == 'media'
                        ) {
                            if ($v_top['name'] == '集团动态') {
                                $active = true;
                            } else if ($v_top['name'] == '产品中心') {
                                $next = true;
                            }
                        }

                        if (!$active && $this->context->action->id == 'product-detail'
                        ) {
                            if ($v_top['name'] == '产品中心') {
                                $active = true;
                            } else if ($v_top['name'] == '投资案例') {
                                $next = true;
                            }
                        }
                    ?>
                    <li class="nav-li">
                        <a
                        <?php if ($v_top['url']) { ?> href="<?=$v_top['url']?>" <?php } ?>
                        <?php if ($active) { ?> class="cur" <?php } ?>
                        <?php if ($next) { ?> class="nextcur" <?php } ?>
                         ><?=$v_top['name']?></a>
                        <?php if ($v_top['items']) { ?>
                        <ul class="z-subnav">
                            <?php foreach ($v_top['items'] as $v_top_item) { ?>
                                <li>
                                    <a href="<?=$v_top_item['href']?>"><?=$v_top_item['name']?></a>
                                </li>
                            <?php } ?>
                            <img src="/img/zhiyin.png"/>
                        </ul>
                        <?php } ?>
                    </li>
                <?php } }?>
            </ul>
        </div>
        <div class="ie8-shadow"></div>
    </div>
</div>

<?php
    if ($this->context->id == 'about') {
        $mlist = MenuService::getSecondMenu(MenuIdEnum::ID_ABOUT);
        $banner = Banners::findOne([
            'menu_id' => MenuIdEnum::ID_ABOUT,
            'status' => 1
        ]);
    } else if ($this->context->action->id == "contact-us" || $this->context->action->id == "join-us") {
        $mlist = MenuService::getSecondMenu(MenuIdEnum::ID_CONTACT);
        $banner = Banners::findOne([
            'menu_id' => MenuIdEnum::ID_CONTACT,
            'status' => 1
        ]);
    } else if ($this->context->action->id == "case") {
        $mlist = MenuService::getSecondMenu(MenuIdEnum::ID_CASE);
        $banner = Banners::findOne([
            'menu_id' => MenuIdEnum::ID_CASE,
            'status' => 1
        ]);
    } else if ($this->context->action->id == "product-list" || $this->context->action->id == "disclosure-list" || $this->context->action->id == "product-detail" ) {
        $mlist = MenuService::getSecondMenu(MenuIdEnum::ID_PRODUCT);
        $banner = Banners::findOne([
            'menu_id' => MenuIdEnum::ID_PRODUCT,
            'status' => 1
        ]);
    } else if ($this->context->action->id == "dynamics-list" || $this->context->action->id == "media-list" || $this->context->action->id == "dynamics" || $this->context->action->id == "media") {
        $mlist = MenuService::getSecondMenu(MenuIdEnum::ID_DYNAMIC);
        $banner = Banners::findOne([
            'menu_id' => MenuIdEnum::ID_DYNAMIC,
            'status' => 1
        ]);
    } else {
        $banner = false;
        $mlist = false;
    }
?>

<?php if ($banner) { ?>
    <!--menu-banner begin-->
    <div class="s-banner-pic"><img src="<?=Yii::$app->fileStorage->baseUrl . '/' . $banner->img?>"> </div>
    <!--menu-banner end-->
<?php } ?>

<?php if ($mlist) { ?>
<!--second-list-menu begin-->
<div class="s-list-menu">
    <div class="middle-width">
        <ul class="clearfix menu-queue clear">
            <?php foreach ($mlist as $v) { ?>
                <?php
                    $action = "/" . $this->context->id . "/" . $this->context->action->id;
                    $active = $v->url == $action;

                    if (!$active &&
                        ($this->context->action->id == 'dynamics' && $v->url == '/site/dynamics-list') ||
                        ($this->context->action->id == 'media' && $v->url == '/site/media-list') ||
                        ($this->context->action->id == 'product-detail' && $v->url == '/site/product-list')
                        ) {
                        $active = true;
                    }
                ?>
                <li <?php if ($active) { ?> class="menu-actives" <?php } ?> ><a href="<?=$v->url?>"><?=$v->name?></a></li>
           <?php } ?>
        </ul>
    </div>
</div>
<!--second-list-menu end-->
<?php } ?>

<?= $content ?>

<!--头部 E-->

<div class="footer">
    <div class="fd-top">
        <div class="main z-w clearfix">
            <div class="logo-box fl">
                <!--<div class="logo"><img src="" alt="中创资本"/></div>-->
                <div class="text">
                    <h2>中视微影创投管理（深圳）有限公司</h2>
                    <p><span class="fd-icon1"></span>深圳市福田区金田路2028号皇岗商务中心20楼</p>
                    <p><span class="fd-icon2"></span>0755-25327888</p>
                    <p><span class="fd-icon3"></span>touzi@zhongshichuangtou.com</p>
                </div>
            </div>
            <div class="license-box fr">
                <div class="license"><img class="ft-pic" src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$basic->fund_img?>" alt="基金管理人牌照"/></div>
                <p>基金管理人牌照</p>
            </div>
            <div class="wechat-box fr">
                <div class="ft-pic wechat"><img class="ft-pic" src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$basic->wx_img?>" alt="中视创投官方微信"/></div>
                <p>中视创投官方微信</p>
            </div>
            
        </div>
    </div>

    <div class="fd-bottom">
        <div class="main z-w">
            <div class="footer-menu">
                <?php if ($menu) {$i = 1; foreach ($menu as $v_bot) { ?>
                    <span>
                        <a href="<?=$v_bot['defaultUrl']?>"><?=$v_bot['name']?></a>
                        <?php if ($i < count($menu)) { ?>
                            <i class="footer-bar"></i>
                        <?php } ?>
                    </span>
                <?php $i++; } } ?>
            </div>
            <div class="z-rightcopy">版权所有：<?=$basic->Copyright?>   <?=$basic->record?></div>
        </div>
    </div>

</div>
<!--回到顶部--S-->   <!--提示：把回到顶部放在公共部分里-->
<div class="back-top" id="toolBackTop">
    <a title="返回顶部" onclick="window.scrollTo(0,0);return false;" href="#top" class="backtop"></a>
</div>
<!--回到顶部--E-->
<!--弹框 S-->
<div class="zm-bomb">
     <div class="main">
          <div class="pic">
          	<img class="bomb-close" src="/img/close.png"/>
          	<img class="bomb-img" src=""/>
          </div>
     </div>
</div>
<!--弹框 E-->
<?php $this->endBody() ?>
<script>
	$(".nav-li").load(function(){
       	   $(".nav-li").eq(2).find('a').addClass('nextcur');
       });
   $(function(){
    	$('.ft-pic').click(function(){
    		var src=$(this).attr('src');
    		$('.zm-bomb .bomb-img').attr('src',src);
    		$('.zm-bomb').show();
    	});
    	$('.bomb-close').click(function(){
    		$('.zm-bomb').hide();
    	});
    })
</script>
</body>
</html>
<?php $this->endPage() ?>
