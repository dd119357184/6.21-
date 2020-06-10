<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)">自定义域名https</a></li>
</ul>
<div id="admin_right_b">
<form method="post" action="?admin-domain-update_https">
<table border="0" align="center" cellpadding="8" cellspacing="0" class="tableConfig" id="config0">
<tr>
	<td>
		<font style="line-height:25px;">
			<p style="color:blue;">本功能可以自定义域名使用https协议开头的URL，即生成的链接都是https的</p>
			<p>每行为一个域名的设置，如：<font color="#cc0000">www.xxfseo.com</font></p>
			<p>支持泛域名，格式： <font color="#cc0000">*.xxfseo.com</font></p>
		</font>
	</td>
</tr>
<tr class="tdbg">
  <td><textarea name="list" type="text" style="height:350px;width:98%;"><?php echo $this->_var['https_list']; ?></textarea></td>
</tr>
<tr>
	<td><button type="submit" class="button button_submit">保存设置</button></td>
</tr>
</table>
</form>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>