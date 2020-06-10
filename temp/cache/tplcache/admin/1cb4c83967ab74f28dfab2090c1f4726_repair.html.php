<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">

<ul id="admin_sub_title">
	<li class="sub"><a>系统修复工具</a></li>
</ul>
<style type="text/css">
.update_box{ font-family: Microsoft Yahei;margin:20px auto;text-align: center;width: 800px;height: 300px;border:2px solid #eee;background:#f8f8f8}
.update_box .inbox{ margin-top: 100px;vertical-align: middle;}
.inbox button{ padding:20px 30px;height:80px;font-size:25px; }
.inbox button i { font-size:35px; }
.inbox {line-height:25px;}
#loadajax,.msgbox,.loadtext{ display:none}
.msgtext{ border-bottom: 1px solid #eee;border-top: 1px solid #eee;text-align: left;padding:10px;margin-bottom:10px;font-size:13px;height:180px;overflow:auto;background:#fff;line-height:22px;}
</style>
<div id="admin_right_b">
<div style="font-family: Microsoft Yahei;width: 800px;margin:20px auto;color:blue;font-size:15px;">
	修复特殊情况下可能的网站出错（空白、采集错误等）
</div>
<div class="update_box">
	<div class="msgbox">
		<h2>系统修复工具</h2>
		<div class="msgtext">
			<div class="returntext"></div>
			<div class="loadtext"><img src="./static/images/load_blue.gif" /></div>
		</div>
		<div class="msgfoot"><button type="button" id="repair2" class="button repairbtn" ><i class="typcn typcn-spanner"></i> 重新修复</button></div>
	</div>
	<div class="inbox" id="inbox">
		<div id="loadajax"><p><img src="./static/images/ajax_loader.gif" /></p><p>正在修复...</p></div>
		<button type="button" id="repair" class="button button_warning repairbtn" ><i class="typcn typcn-spanner"></i> 点击修复</button>
	</div>
</div>
<script type='text/javascript'>
$(function() {
	$(".repairbtn").click(function(){
		$('#loadajax').show();
		$('.msgbox').hide();
		$(".repairbtn").hide();
		$('.returntext').html('');
		repair("<?php echo url('admin/repair/run'); ?>");
	});
});
function repair(gurl){
	$.ajax({
		url:gurl,
		dataType:'json',
		timeout:28000,
		global:false,
		success:function(data){
			$('#loadajax').hide();
			$('.loadtext').hide();
			$('.msgbox').show();
			var oldmsg=$('.returntext').html();
			$('.returntext').html(oldmsg+'<p>'+data.info+'<p>');
			if(data.url!=''){
				$('.loadtext').show();
				repair(data.url);
			}else{
				$("#repair2").show();
			}
		}
	});
}
</script>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>