<!--information disclosure begin-->
<div class="company-profile-box">
    <div class="middle-width">
        <div class="company-mains pt2 pb3">
            <?php if ($info) { ?>
            <div class="company-middle">
                <h1 class="company-titleh1"><?=$info->title?></h1>
                <p class="compayn-pictures"><img src="<?=Yii::$app->fileStorage->baseUrl . '/' . $info->thumb?>"></p>
                <br>
                <?=$info->content?>
            </div>
            <?php } ?>
            <!--核心产品 S-->
            <?php if ($product) { ?>
            <div class="corepro-box">
                <div class="safety-title"><h2>核心产品<i class="blue-bar"></i></h2></div>
                <ul class="corepro-content clearfix">
                    <?php foreach ($product as $v) { ?>
                    <li>
                        <img src="<?=Yii::$app->fileStorage->baseUrl . '/' . $v->thumb?>" alt="<?=$v->title?>"/>
                        <h3><?=$v->title?></h3>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
            <!--核心产品 E-->

            <!--<div class="company-other-business pt3 clear clearfix">
                <h2>主营业务</h2>
                <ul>
                    <li>
                        <div class="company-buspic"><img src="img/zyyimg.jpg"></div>
                        <div class="company-busmians">
                            <h3>银行投资</h3>
                            <div class="companyers"><p>股权投资、证券投资、创业投资等，具体包括PE、新股、定增、并购等。</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="company-buspic"><img src="img/zyyimg.jpg"></div>
                        <div class="company-busmians">
                            <h3>银行投资</h3>
                            <div class="companyers"><p>股权投资、证券投资、创业投资等，具体包括PE、新股、定增、并购等。</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="company-buspic"><img src="img/zyyimg.jpg"></div>
                        <div class="company-busmians">
                            <h3>银行投资</h3>
                            <div class="companyers"><p>股权投资、证券投资、创业投资等，具体包括PE、新股、定增、并购等。</p></div>
                        </div>
                    </li>
                </ul>
            </div>-->
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