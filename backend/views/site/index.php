<?php 
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '掌心宝贝内容管理系统';
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
 <body>

  <div class="header">
    
      <div class="dl-title">

          <span class="dl-title-text">掌心宝贝内容管理系统</span>

      </div>

    <div class="dl-log">欢迎您,<span class="dl-log-user"> <?=yii::$app->user->identity->username?></span>
    <a href="<?=Url::to('/site/logout')?>" title=<?=yii::t('app','btn_loginout')?> class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title">贴心小秘书<s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">首页</div></li>
      <!--    <li class="nav-item"><div class="nav-item-inner nav-order">表单页</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-inventory">搜索页</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-supplier">详情页</div></li>-->
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>

<script>

 BUI.use('common/main',function(){

     var config = [{
         id:'menu',
         menu:<?php echo $menu;?>
     }];
     new PageUtil.MainPage({
         modulesConfig : config
     });
 });

 $(function(){

     $('.tab-nav-wrapper').find('ul li').first().find('.tab-item-title').html('首页');
     $('.tab-nav-wrapper').find('ul li').first().find('.tab-item-close').hide();
 });

</script>
 </body>
</html>
