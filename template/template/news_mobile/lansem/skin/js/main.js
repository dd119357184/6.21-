
function ycSlider(deJson){
	//wrap-轮播对象;dir-轮播方向left/top;autoplay-切换时间间隔;speed-切换速度;navFn分页按钮点击事件;holdStopObj悬停暂停轮播对象;
	var $dots=$(deJson.wrap+' .navdot li');
	var $lis=$(deJson.wrap+' .slider li');
	var liL=$lis.length;
	var liSize=0;//图片大小
	if(deJson.dir=='left'){
		liSize=$lis.width();
	}else{
		liSize=$lis.height();
	}
	var sNow=0;//当前图片索引
	var deTimer=null;//自动轮播计时器
	var run=true;//判断是否停止自动轮播
	var lr=1;//判断切换方向
	var ani={},d=deJson.dir;//设置animate的参数-json数组
	function turnP(dir,deL){
		$lis.stop(true,true);
		var nextInd=sNow+dir;
		if(nextInd==liL){
			nextInd=0;
		}
		if(nextInd==-1){
			nextInd=liL-1;
		}
		$dots.eq(nextInd).attr('class','active').siblings().attr('class','');
		if(deJson.navFn){deJson.navFn(nextInd);}
		ani[d]=-liSize*dir;
		$lis.eq(sNow).animate(ani,deJson.speed);
		ani[d]=0;
		$lis.eq(nextInd).css(deJson.dir,deL*dir).animate(ani,deJson.speed);
		sNow=nextInd;
	}
	deTimer=setInterval(function(){
		if(run){
			turnP(lr,liSize);
		}
	},deJson.autoplay);
	$dots.click(function(){//分页按钮
		var nowInd=$(this).index();
		$(this).attr('class','active').siblings().attr('class','');
		$lis.stop(true,true);
		if(sNow!=nowInd){
			if(nowInd>sNow){
				ani[d]=-liSize;
				$lis.eq(sNow).animate(ani,deJson.speed);
				ani[d]=0;
				$lis.eq(nowInd).css(deJson.dir,liSize).animate(ani,deJson.speed);
			}else{
				ani[d]=liSize;
				$lis.eq(sNow).animate(ani,deJson.speed);
				ani[d]=0;
				$lis.eq(nowInd).css(deJson.dir,-liSize).animate(ani,deJson.speed);
			}
			sNow=nowInd;
		}
		if(deJson.navFn){deJson.navFn(nowInd);}
	});
	//鼠标悬停，停止自动轮播
	var holdStopObj=deJson.holdStopObj||deJson.wrap;
	$(holdStopObj).on('mouseover',function(){
		run=false;
	});
	$(holdStopObj).on('mouseleave',function(){
		run=true;
	});
	//前后控制按钮
	$(deJson.wrap+' .prev').click(function(){
		lr=-1;
		turnP(lr,liSize);
		lr=1;
	});
	$(deJson.wrap+' .next').click(function(){
		turnP(lr,liSize);
	});
}

//JQ部分

$(function(){
//	图片加载失败
	document.addEventListener("error", function(e){
		var elem = e.target;
		if(elem.tagName.toLowerCase() === 'img'){
			elem.src = "http://img.xde6.net/default.jpg";
		}
	}, true);


	//图片切换
	
	var mtCard=$('.mt-card');
	if(mtCard.length>0){
		var MouseDirection = function (element, opts) {
	
		    var $element = $(element);
		    var mark=1,objA=null;
		
		    //enter leave代表鼠标移入移出时的回调
		    opts = $.extend({}, {
		        enter: $.noop,
		        leave: $.noop
		    }, opts || {});
		
		    var dirs = ['top', 'right', 'bottom', 'left'];
		
		    var calculate = function (e) {
		        var w = $element.outerWidth(),
		            h = $element.outerHeight(),
		            offset = $element.offset(),
		            x = (e.pageX - offset.left - (w / 2)) * (w > h ? (h / w) : 1),
		            y = (e.pageY - offset.top - (h / 2)) * (h > w ? (w / h) : 1);
		
		        return Math.round((((Math.atan2(y, x) * (180 / Math.PI)) + 180) / 90) + 3) % 4;
		    };

		    $element.on('mouseleave', function (e) {
		        var r = calculate(e);
		        objA=element.find('a').eq(mark);
		        opts.leave(objA, dirs[r]);
		        mark==1?mark=0:mark=1;
		    });
		};
		
		
        var leaveEvent=function(element,dirs){
			switch(dirs){
				case 'top': element.stop(true,true).animate({'top':'-100%'},function(){
					    		aniCallback($(this));
					    		$(this).css('top','0');
					        });
				        	break;
				case 'right': element.stop(true,true).animate({'left':'100%'},function(){
					    		aniCallback($(this));
					    		$(this).css('left','0');
					        });
				        	break;
				case 'bottom': element.stop(true,true).animate({'top':'100%'},function(){
					    		aniCallback($(this));
					    		$(this).css('top','0');
					        });
				        	break;
				case 'left': element.stop(true,true).animate({'left':'-100%'},function(){
					    		aniCallback($(this));
					    		$(this).css('left','0');
					        });
				        	break;
			}
        }
        function aniCallback(obj){
        	obj.siblings().css('zIndex','100');
			obj.css('zIndex','0');
        }
        
        for(var i=0;i<mtCard.length;i++){
			MouseDirection(mtCard.eq(i),{leave:leaveEvent});
		}
        MouseDirection($('.mt-big-card'),{leave:leaveEvent});
       
	}
	
	
	
//tab
	var ssTabPic=$('#ss-tab-pic');
	if(ssTabPic.length>0){
		var ssTabs=$('#ss-tab-tit li');
		var ssTabPics=$('#ss-tab-pic li');
		ssTabs.on('mouseenter',function(){
			var $this=$(this);
			$this.attr('class','on').siblings().attr('class','');
			ssTabPics.eq($this.index()).show().siblings().hide();
		})
	}
	
//	侧边导航
	var sideBox=$('.side-box');
	if(sideBox.length==0){
		sideBox=$('.side-box-b');
	}
	if(sideBox.length>0){
		$(window).on('scroll',function(){
			var scrollT=$(this).scrollTop();
			var isLow=scrollT>$(document).height()-1255;
			if(scrollT>690){
				sideBox.show();
				sideBox.css('position','fixed');
			}else{
				sideBox.hide();
			}
		});
	}
	var backTop=$('#back-top');
	if(backTop.length>0){
		backTop.click(function() {
	      $("html,body").animate({scrollTop:0}, 500);
	  }); 
	}
	var sideBoxs=sideBox.find('.turn-link');
	if(sideBoxs.length>0){
		var anchors=null;
		if($('.title-wrap a').length>0){
			anchors=$('.title-wrap a');
		}else if($('.channel-header .anchor').length>0){
			anchors=$('.channel-header .anchor');
		}else if($('.yl-title a').length>0){
			anchors=$('.yl-title a');
		}
		var anchorsL=anchors.length;
		var windowScrollTop=0;
		var topArray=[];
		for(var i=0;i<anchorsL;i++){
			topArray.push(anchors.eq(i).offset().top-60);
		}
		$(window).on('scroll',function(){
			windowScrollTop=$(window).scrollTop()
			for(var i=0;i<anchorsL;i++){
				onView(i);
			}
		});
		function onView(i){
			if(windowScrollTop>topArray[i]){
				sideBoxs.eq(i).attr('class','turn-link on').siblings('.turn-link').attr('class','turn-link');
				return;
			}
		}
		
	}
//	关于我们
	var aboutTabs=$('.left-tab li');
	var aboutLis=$('.right-body li');
	var aboutTabOnInd=$('.left-tab .on').index();
	aboutLis.eq(aboutTabOnInd).attr('class','on').siblings().attr('class','');
	if(aboutTabs.length>0){
		aboutTabs.on('click',function(){
			$(this).attr('class','on').siblings().attr('class','');
			aboutLis.eq($(this).index()).attr('class','on').siblings().attr('class','');
		})
	}
//	文章侧边bar
	var rightbar=$('#fixed-rightbar');
	if(rightbar.length>0){
		var rightbarT=rightbar.offset().top-20;
		$(window).on('scroll',function(){
			if($(window).scrollTop()>rightbarT){
				rightbar.attr('class','fixed-rightbar');
			}else{
				rightbar.attr('class','channelRightFocus');
			}
		})
	}
	var sideAB=$('#sideArticleBtn');
	if(sideAB.length>0){
		var pageRight=$('#pageRight');
		var bottomDis=pageRight.offset().top+pageRight.height()-500;
		$(window).on('scroll',function(){
			if($(window).scrollTop()>bottomDis){
				sideAB.css('bottom','0');
			}else{
				sideAB.css('bottom','-210px');
			}
		})
	}
});

//图片点击下一页
window.onload=function(){
	var pageWrap=document.getElementById("page-wrap");
	if(pageWrap){
		var nextlink=document.getElementById("gonext");
		addPicLinkToNext();
		function addPicLinkToNext(){
			if(nextlink==null||!nextlink.href||nextlink.href==""){
				var newPage=document.querySelector("#next-page");
				if(newPage){
					nextlink=newPage;
				}else{
					nextlink=document.querySelector("#prev-page");
				}
			}
			allpic=pageWrap.getElementsByTagName("img");
			for(i=0;i<allpic.length;i++){
				if(allpic[i].parentNode!="a"){
					allpic[i].onclick=function(){
						if(document.all) {
							nextlink.click();
						}else {
							var e = document.createEvent("MouseEvents");
							e.initEvent("click", true, true);
							nextlink.dispatchEvent(e);
						}
					}
				}
			}
		}
	}
}



