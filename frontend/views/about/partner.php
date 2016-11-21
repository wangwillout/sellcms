<?php
$this->title = '关于我们--合作伙伴';
?>
<!--case begin-->
<div class="infor-disclo">
    <div class="middle-width">
        <div class="z-content-main">
            <ul class="partner-box clearfix">
                <?php if ($partners) {?>
                    <?php foreach ($partners as $partner):?>
                        <li><a href="<?=$partner->url?>" target="_blank"><img src="<?= \Yii::$app->fileStorage->baseUrl.'/'.$partner->img?>" alt="aa"/><?=$partner->name?></a></li>
                    <?php endforeach;?>
                <?php }?>
            </ul>
                        
        </div>
    </div>
</div>
<!--case end-->
<script type="text/javascript">
    $(function(){
        var $lis=$('.partner-box li');
        $lis.each(function(index){
            index=index+1;
            if(index%5==0){
                $(this).css('margin-right','0');
                }
            });
       })
</script>