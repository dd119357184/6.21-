<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>正在安装 - <?php echo $this->_var['cms_name']; ?> x<?php echo $this->_var['cms_version']; ?></title>
<script type="text/javascript" src="static/js/jquery.js"></script>
<link href="<?php echo $this->_var['theme_path']; ?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
<?php echo $this->fetch('header.html'); ?>
<?php if($this->_var['errmsg']): ?>
<div class="tips_box">
	<div class="tips_txt">
<p><?php echo $this->_var['errmsg']; ?></p>
</div>
</div>
<?php else: ?>
<div class="install_ok">
	恭喜你，程序安装完成！<button onclick="location.href='./xxfseo_admin.php';" class="ok_btn">点击进入后台</button>
</div>
<?php endif; ?>
<?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>