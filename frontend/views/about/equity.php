<!--information disclosure begin-->
<div class="company-profile-box">
    <div class="middle-width">
        <div class="company-mains pt2 pb3">
            <?php if ($banner) { ?>
            <div class="company-middle">
                <p style="text-align: center;"><img src="<?=Yii::$app->fileStorage->baseUrl . '/' . $banner->img?>"></p>
            </div>
            <?php } ?>
            
            <?php if ($list) { ?>
            <div class="pt3">
                <?php foreach ($list as $v) { ?>
                    <div class="safety-title">
                        <h2><?=$v->title?><i class="blue-bar"></i></h2>
                    </div>
                    <div class="safety-label">
                        <?=$v->content?>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>

    </div>
</div>
<!--information disclosure end-->

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