<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$this->title = '404页面';

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

<!--头部 S-->
<!-- <div class="header">
    <div class="hd1">
        <div class="main clearfix">
            <div class="logo fl"><img src="/img/logo.jpg"/></div>
            <div class="phone fr"><img src="/img/phone.png"/></div>
        </div>
    </div>
</div> -->
<!--头部 E-->
<!--err S-->
<div class="err-content">
    <div class="err-main">
        <div class="err-box">
            <div class="pic"><img src="/img/404.png"/></div>
            <p>非常遗憾，您访问的页面不存在，请尝试：</p>
            <a href="/">返回首页<span class="b-cl">（<span id="b-time">5</span>s）</span></a>
        </div>
    </div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
<!--err E-->
<script type="text/javascript">
    /*定时跳转页面 S*/
   $(function(){
        var obj = {
            time:5,
            run:function(){
                var $this=this;
                setInterval(function(){
                    $this.time=$this.time-1;
                    $("#b-time").text($this.time);
                    if($this.time==0){
                        window.location.href="/";
                    }
                },1000);
            }
        };
        obj.run();
    })
   /*定时跳转页面 E*/ 
</script>


<!--回到顶部--E-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
