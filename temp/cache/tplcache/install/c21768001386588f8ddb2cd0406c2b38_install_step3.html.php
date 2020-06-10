<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站信息配置 - <?php echo $this->_var['cms_name']; ?> x<?php echo $this->_var['cms_version']; ?></title>
<script type="text/javascript" src="static/js/jquery.js"></script>
<link href="<?php echo $this->_var['theme_path']; ?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
<?php echo $this->fetch('header.html'); ?>
<div class="tips_box">
	<div class="tips_txt">
<p>蜘蛛池状态默认是关闭的，请到后台配置好添加站点后再自行开启！</p>
</div>
</div>
<form id="form1" name="form1" method="post" action="/?install-step4">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tablebox">

<tr class="head_bg">
	<td colspan="3" align="left">管理员账号设置：</td>
</tr>
<tr>
<td>管理员账号：</td>
<td align="left"><input type="text" class="infor_input" name="con[username]" value="admin"></td>
<td align="left">英文/数字字符，不能包含任何标点符号</td>
</tr>
<tr>
<td>管理员账号：</td>
<td align="left"><input type="text" class="infor_input" name="con[password]" value=""></td>
<td align="left">管理员密码,长度随意</td>
</tr>
</table>
</form>
<div class="btn_wrap">
	<input type="button" id="submit" class="next_btn" value="开始安装" />
	<input type="button" class="prev_btn" value="上一步" onclick="history.go(-1);" />
	<div class="cl"></div>
</div>
<script type="text/javascript">
$(function(){
	$('#submit').click(function(){
		var iserr=false;
		$(":input[type='text']").each(function(){
			if($(this).val()==''){
				iserr=true;
				return false;
			}
		});
		if(iserr){
			alert('请填写完整！');
			return false;
		}
		$('#form1').submit();
	});
});
</script>
<?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>