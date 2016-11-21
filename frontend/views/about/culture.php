<!--product-detail-main end-->
<div class="middle-width">
    <div class="culture-content">

        <div class="culture-box">
            <?php if ($banner) { ?>
                <div class="ctr-pic">
                    <img src="<?=Yii::$app->fileStorage->baseUrl . '/' . $banner->img?>">
                </div>
            <?php } ?>

            <?php if ($list) { ?>

                <ul class="culture-label clearfix">
                    <?php
                    $i = 1;
                    foreach ($list as $v) { ?>
                    <li <?php if (!($i%2)) { ?> style="border-left-style: none;" <?php } ?> >
                        <div class="safety-title"><h2><?=$v->title?><i class="blue-bar"></i></h2></div>
                        <?=$v->content?>
                    </li>
                    <?php $i++; } ?>
                </ul>
            <?php } ?>
        </div>

    </div>
</div>
<!--product-detail-main end-->

<script type="text/javascript">

    $(function(){
        var $lis=$('.company-other-business ul li');
        $lis.each(function(index){
            index=index+1;
            if(index%3==0){
                $(this).css('margin-right','0');
            }
        });
    })
</script>