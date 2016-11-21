/****回到顶部的设置* S***/
$(function(){
	var bt = $('.back-top');
	var sw = $(document.body)[0].clientWidth;

	var limitsw = (sw - 840) / 2 - 80;
	if (limitsw > 0) {
		limitsw = parseInt(limitsw);
		bt.css("right", limitsw);
	}
	$(window).scroll(function() {
		var st = $(window).scrollTop();
		if (st > 300) {
			bt.show();
		} else {
			bt.hide();
		}
	});
	/****回到顶部的设置* E***/
})
/*导航nav S*/
  $(function(){
  	var len=$('.z-nav>li').length;
	var liwidth=1200/len-20;
	$('.z-subnav').width(liwidth);
	var leftw=liwidth/2-11;
	$('.z-subnav img').css('left',leftw);
	
	$('.z-nav>.nav-li').bind({
	    mouseover:function(){
	        $(this).find('.z-subnav').show();
	    },
	    mouseout:function(){
	    	$(this).find('.z-subnav').hide();
	        }
	    });
	    
	   $('.z-nav>.nav-li a').bind({
	    mouseover:function(){
	        $(this).parent().next().find('a').addClass('nextcur');
	    },
	    mouseout:function(){
	    	if(!$(this).hasClass('cur')){
		    	  $(this).parent().next().find('a').removeClass('nextcur');
		    	}
	        }
	    });
	  /* $("nav-li>a").each(function(){
            $this = $(this);
            if($this[0].href==String(window.location)){
            	$(".nav-li>a").removeClass('cur').removeClass('nextcur');
	        	$this.addClass('cur');
	        	$this.parent().next().find('a').addClass('nextcur');
            }
        });*/
       
       $(".nav-li>a").click(function(){
            $this = $(this);
        	$(".nav-li>a").removeClass('cur').removeClass('nextcur');
        	$this.addClass('cur');
        	$this.parent().next().find('a').addClass('nextcur');
        });
  })
/*导航nav E*/
/*banner 轮播 S*/
$(document).ready(function(e) {
	    var unslider = $('.z-slider .banner').unslider({
			dots: true
		}),
		data = unslider.data('unslider');
		
		$('.unslider-arrow').click(function() {
	        var fn = this.className.split(' ')[1];
	        data[fn]();
	    });
	    $('.z-slider .banner').bind({
	    	mouseover:function(){$('.z-slider .unslider-arrow').css('display','block')},
	    	mouseout:function(){$('.z-slider .unslider-arrow').css('display','none')}
	    });
	    
	    var dotlen=$('.dot').length;
	    if(dotlen<2){
	    	$('.dots').hide();
	    	$('.z-slider .banner').mouseover(function(){
	    		$('.z-slider .unslider-arrow').css('display','none')
	    	});
	    }
	})
/*banner 轮播 E*/
		
	
/*mng-team S*/
 $(function(){	
 	var $lis=$('.team-smallpic li'),
 	    $divs=$('.team-bigpic');   	
	   	$('.team-smallpic li').mouseover(function(){
	   		var index=$(this).index();
	   		$lis.removeClass('cur');
	   		$(this).addClass('cur');
	   		$divs.eq(index).show().siblings().hide();
	   	});
	   	
     })
   /*mng-team E*/
  
/*wenzi length S*/
 /*文字过多用省略号代替 S*/
	  $(function(){
		 function cutStr(obj,count){ 
			for (var i = 0,len=obj.length ;i<len;i++){
				var text = obj[i].innerHTML;
				var newText = text.substring(0,count);
				var n = obj[i].innerHTML.length;
				
					if(n>count){
						obj[i].innerHTML = newText + "...";
						}
				}
			}
			cutStr($('.z-modul1 .zsct-text p'),250);
			cutStr($('.team-text p'),120);
			cutStr($('.like-text p'),50);
			cutStr($('.case-content p'),34);
			cutStr($('.info-mains-content'),120);
			
			}) 
	/*文字过多用省略号代替 E*/
/*wenzi length E*/