<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>安装协议 - <?php echo $this->_var['cms_name']; ?> x<?php echo $this->_var['cms_version']; ?></title>
<script type="text/javascript" src="static/js/jquery.js"></script>
<link href="<?php echo $this->_var['theme_path']; ?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
<?php echo $this->fetch('header.html'); ?>
<div class="agreement"><textarea><?php echo $this->_var['licenceText']; ?></textarea></div>
<script type="text/javascript">
function submit_next(){
	if(!$("#agree").is(":checked")){
		alert("请勾选同意本站安装协议");
		return false;
		}
	window.location.href = "?install-step2";
}
</script>
<div class="btn_wrap">
	<label class="choose_check"><input id="agree" checked type="checkbox" />我已阅读并接受该服务条款</label>
	<input name="" type="button" class="next_btn" value="下一步" onclick="submit_next()" />
	<input name="" type="button" class="prev_btn" value="上一步" disabled />
	<div class="cl"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>