//web width auto
var _set = function(){
	var _body = document.body;
	var _type = _body.getAttribute("data-type");
	var _width = Math.max(document.documentElement.clientWidth, _body.clientWidth);
		
	if (_type || _width<1251){
		_body.className = "sg-w1000";
	}else{
		_body.className = "";
	}
};
	
if (window.addEventListener) {
	window.addEventListener('resize', _set);
} else if (window.attachEvent) {
	window.attachEvent('onresize', _set);
};

_set();

//navFixed
var no_logo = $('.header_top.logo_wrap').length==0;

if(no_logo) logo.style.display="block";

var navFixed = document.getElementById("navFixed");

var mt = navFixed.offsetTop;
window.onscroll = function () {
	var t = document.documentElement.scrollTop || document.body.scrollTop;
	if (t > mt) {
		navFixed.style.position = "fixed";
		navFixed.style.margin = "0";
		navFixed.style.top = "0";
		
		logo.style.display="block";
	} else {
		navFixed.style.position = "static";
		
		if(!no_logo) logo.style.display="none";
	}
	
	if($(window).scrollTop() >= 580){
		$('.actGotop').fadeIn(300); 
	}else{    
		$('.actGotop').fadeOut(300);    
	} 
}

$('.actGotop').click(function(){ $('html,body').animate({scrollTop: '0px'}, 800); }); 

document.writeln('<div style="display:none"><script src="https://s22.cnzz.com/z_stat.php?id=1263957745&web_id=1263957745" language="JavaScript"></script></div>');


//360鑷姩鏀跺綍
(function(){
var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?14d16504f5fd89757045f5c66ed25a11":"https://jspassport.ssl.qhimg.com/11.0.1.js?14d16504f5fd89757045f5c66ed25a11";
document.write('<script src="' + src + '" id="sozz"><\/script>');
})();

document.writeln("<script src=\'/js/ggpc.js\'></script>");