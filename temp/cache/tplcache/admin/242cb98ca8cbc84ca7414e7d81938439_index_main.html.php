<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="static/js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="static/js/highcharts/themes/txtcms.js"></script>
<body class="body-main" style="background: #eee;">
<div class="welcome"><i class="typcn typcn-adjust-brightness"></i>HELLO，BOSS！欢迎使用 「<b><?php echo $this->_var['cms_name']; ?> x<?php echo $this->_var['cms_version']; ?></b>」，今天是 <?php echo $this->_var['today']; ?>！<font color="red">使用本程序请遵守国家法律法规、并遵守本软件使用协议！</font><a href="javascript:" onclick="read_licence();"><font color="green">「点此查看协议」</font></a></div>
<style type="text/css">
table .firstalt td{ height: 40px;padding: 0 10px;}
</style>
<table border="0" cellpadding="8" cellspacing="0" width="100%">
<tr>
	<td width="40%" valign="top" style="padding:0">
		<table border="0" cellpadding="8" cellspacing="1" id="config0" style="width:100%;background:#ddd;">
			<tr>
			  <td class="title_bg" colspan="4" style='text-align:left'>系统信息</td>
			</tr>
			<tr class="firstalt">
				<td width="120">蜘蛛池状态：</td><td><b><?php if(config ( 'web_open' )): ?>开启<?php else: ?><font color="red">已关闭</font><?php endif; ?></b></td>
				<td>域名库统计：</td><td><b><?php echo $this->_var['domains_count']; ?></b></td>
			</tr>
			<tr class="firstalt">
				<td>蜘蛛防火墙：</td><td><?php if(config ( 'web_robot_ban' )): ?>开启<?php else: ?>关闭<?php endif; ?></td>
				<td>磁盘剩余空间：</td><td><b><?php echo $this->_var['disk_free']; ?> GB</b></td>
			</tr>
			<tr class="firstalt">
				<td>蜘蛛强引劫持：</td><td><?php if(config ( 'robot_redirect_open' )): ?>开启<?php else: ?>关闭<?php endif; ?></td>	
				<td>今日蜘蛛统计：</td> <td><font color="red"><?php echo $this->_var['robot_count']; ?></font></td>
			</tr>
			<tr class="firstalt">
				<td>调试模式：</td> <td><?php if(APP_DEBUG || config ( 'web_debug' ) == 1): ?><font color="red">已开启</font><?php else: ?>关闭<?php endif; ?></td>
				<td><font color="red">CC防御记录<sup> new</sup></font></td> <td><font color="red"><?php echo $this->_var['ccnum']; ?></font> 条( <?php if($this->_var['web_cc']): ?><font color="green">已开启</font><?php else: ?><font color="red">未开启</font><?php endif; ?> )</td>
			</tr>
			<tr class="firstalt">
				<td>IP黑名单：</td> <td><?php if($this->_var['web_banip']): ?>开启<?php else: ?>关闭<?php endif; ?></td>
				<td><font color="red">UA黑名单<sup> new</sup></font></td> <td><?php if($this->_var['web_banua']): ?>已开启<?php else: ?>关闭<?php endif; ?></td>
			</tr>
			<tr class="firstalt">
				<td>目录权限检查：</td>
				<td colspan="3" align="left"><?php echo $this->_var['tips']; ?>&nbsp;&nbsp;</td>
			</tr>
		</table>
	</td>
	<td width="25%" valign="top" style="padding:0 0 0 10px">
		<table border="0" cellpadding="8" cellspacing="1" style="width:100%;background:#ddd;">
			<tr>
			  <td class="title_bg" colspan="2" style='text-align:left'>登陆信息</td>
			</tr>
			<tr class="firstalt"><td>管理员：</td><td><b><?php echo $this->_var['adminid']; ?></b></td></tr>
			<tr class="firstalt"><td>上次登录时间：</td><td><b><?php echo $this->_var['logtime']; ?></b></td></tr>
			<tr class="firstalt"><td>上次登录IP：</td> <td><b><?php echo $this->_var['logip']; ?></b></td></tr>
			<tr class="firstalt"><td>授权用户：</td> <td><font color="red"><?php echo $this->_var['vipqq']; ?></font> [<a href="JavaScript:" onclick="licence_update();">更新</a>]</td></tr>
			<tr class="firstalt"><td>授权程序：</td> <td><b><?php echo $this->_var['cms_name']; ?> x<?php echo $this->_var['cms_version']; ?></b></td></tr>
			<tr class="firstalt"><td>授权到期时间：</td> <td><font color="red"><?php echo $this->_var['licence_expdate']; ?></font></td></tr>
		</table>
	</td>
	<td width="35%" valign="top" style="padding:0 0 0 10px">
		<table border="0" cellpadding="8" cellspacing="1" style="width:100%;background:#ddd;">
			<tr>
			  <td class="title_bg" style='text-align:left'>官网资讯 (<a href="https://www.xxfseo.com/" target="_blank">打开官网</a>)</td>
			</tr>
			<tr class="firstalt">
				<td style="padding:0"><iframe scrolling="auto" width="100%" height="224" src="https://www.xxfseo.com/admin-news.html" frameborder="0"></iframe></td>
			</tr>
		</table>
	</td>
</tr>
</table>
<div id="chart_line_day" style="min-width: 310px; height: 300px; margin: 10px auto;"></div>
<table border="0" cellpadding="8" cellspacing="1" style="width:100%;background:#ddd;">
    <tr>
      <td class="title_bg" colspan="2" style='text-align:left'>服务器信息</td>
    </tr>
	<tr class="firstalt">
      <td height="20"  width='200' align="right">当前域名 (IP地址：端口)</td>
      <td align="left"><b><?php echo $this->_var['SERVER_NAME']; ?></b> (<?php echo $this->_var['SERVER_ADDR']; ?>:<?php echo $this->_var['SERVER_PORT']; ?>)</td>
    </tr>
	<tr class="firstalt">
		<td height="20"align="right">程序目录绝对路径</td> 
		<td><?php echo dirname($this->_var['SCRIPT_FILENAME']); ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">服务器解译引擎</td> 
		<td><?php echo $this->_var['SERVER_SOFTWARE']; ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">服务器操作系统( 服务器时间 )</td> 
		<td><?php echo $this->_var['php_os']; ?>(<?php echo date('Y-m-d H:i:s'); ?>)</td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">PHP 运行方式( 版本 )</td> 
		<td><?php echo PHP_SAPI;?>(<?php echo PHP_VERSION;?>)</td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">php zlib扩展</td> 
		<td><?php echo $this->_var['php_libz']; ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">iconv编码转换</td> 
		<td><?php echo $this->_var['iconv']; ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">mbstring扩展</td> 
		<td><?php echo $this->_var['mbstring']; ?></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">display_errors</td> 
		<td><span style="color:green"><?php echo $this->_var['display_errors']; ?></span></td>
	</tr>
	<tr class="firstalt">
		<td height="20"align="right">采集函数</td> 
		<td><span style="color:green"><?php echo $this->_var['fetch_mode']; ?></span></td>
	</tr>
  </table>
<script type="text/javascript">
function read_licence(){
	top.art.dialog.open('?admin-index-read_licence',{ lock:true,opacity:0.3,title:'阅读软件使用协议',id:'reviewifrm',width:'800px'});
}
$(function () {
	if(getcookie('updatetips')!='0'){
		update_check();
	}
	$('#chart_line_day').highcharts({
		chart: {
            type: 'line',
			borderColor:'#ddd',
        },
        credits:{
            enabled:false
        },
        title: {
            text: '今日蜘蛛爬行走势图'
        },
		subtitle: {
            text: '今日爬行数量：<?php echo $this->_var['robot_count']; ?>'
        },
        xAxis: {
            categories: ['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23']
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
			{
				name: '蜘蛛爬行次数（次/小时）',
				data: [<?php echo $this->_var['hour']; ?>]
			}
		]
    });
});
function get_lscode(){
	
}
function licence_update(){
	top.art.dialog({
		content: '<div id="licence-box"><p>《<font color="green">小旋风万能蜘蛛池</font>》为商业程序，需购买授权才能使用</p><p>请输入授权码：(<a href="http://www.xxfseo.com" target="_blank"><font color="red">点击在线购买</font></a>)</p>'
			+ '<p><textarea name="code" class="inputs" id="licence-code"></textarea></p><p id="licence-msg"></p></div>',
		fixed: true,
		title: '请输入授权码',
		lock: true,
		id: 'licencebox',
		okVal: '提交授权',
		init: function(){
			if(top.$('#dialog_foot').length<1){
				top.$('<span style="float: left;line-height: 25px;" id="dialog_foot">客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=66781670&amp;site=qq&amp;menu=yes" target="_blank"><font color="red">66781670</font></a> 官网：<a href="http://www.xxfseo.com" target="_blank"><font color="red">xxfseo.com</font></a></span>').prependTo(".aui_dialog .aui_footer .aui_buttons");	
			}
		},
		ok: function () {
			var input = top.$('#licence-code');
			var okthis=this;
			$.ajax({
				url:'?admin-index-licence',
				type:'post',
				data: 'code='+$.trim(input.val()),
				success:function(data){
					if(data.status==1){
						alert('授权成功！');
						top.location.reload();
					}else{
						okthis.shake && okthis.shake();
						input.select();
						input.focus();
						$('#licence-msg').html(data.info).show().fadeOut(3000);
					}
				}
			});
			return false;
		},
		cancel: true
	});
}
</script>

<?php echo $this->fetch('footer.html'); ?>
</body>
</html>