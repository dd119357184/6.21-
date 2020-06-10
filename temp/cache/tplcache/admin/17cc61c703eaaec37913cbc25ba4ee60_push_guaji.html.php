<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">

<ul id="admin_sub_title">
	<li class="sub"><a>挂机推送工具</a></li>
</ul>
<div id="admin_right_b">
<div class="divtips">
	<p>本工具用于后台挂机推送链接给百度等平台，挂机需要保持页面打开状态！</p>
	<p>挂机带有自动检测机制，失败、错误、无响应等可自动重启，无需人工操作</p>
</div>
<div style="width:500px;margin:100px auto;line-height:50px;">
	<p><font color="red">百度·MIP</font>推送链接数量，每次：<input id="urlnum_mip" type="text" value="100" class="input" size="10"> 条 ，一般100-1000</p>
	<p><font color="red">百度·熊掌</font>推送链接数量，每次：<input id="urlnum_yd" type="text" value="10" class="input" size="10"> 条 ，一般10-1000</p>
	<p><font color="red">百度·平台</font>推送链接数量，每次：<input id="urlnum_zz" type="text" value="1000" class="input" size="10"> 条 ，一般2000以内</p>
	<p><font color="red">神马·MIP</font>推送链接数量，每次：<input id="urlnum_smmip" type="text" value="100" class="input" size="10"> 条 ，一般100-1000</p>
	<p>每次推送间隔时间：<input id="interval" type="text" value="60" class="input" size="10"> 秒，建议大于5秒</p>
	<p style="margin-top:20px;"><button type="button" id="pushbtn" class="button button_success" style="width:300px;height:60px;"><i class="typcn typcn-wi-fi"></i> 点击开始推送</button></p>
</div>
<script type='text/javascript'>
$(function() {
	$("#pushbtn").click(function(){
		var urlnum=$('#urlnum_yd').val()+'.'+$('#urlnum_mip').val()+'.'+$('#urlnum_zz').val()+'.'+$('#urlnum_smmip').val(),interval=$('#interval').val();
		art.dialog.open('?admin-push-guaji_run-urlnum-'+urlnum+'-interval-'+interval,{lock:true,title:'挂机推送工具（已开启失败重试机制）',id:'nodeTestifrm',width:'700px',height:'400px'});
	});
});
</script>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>