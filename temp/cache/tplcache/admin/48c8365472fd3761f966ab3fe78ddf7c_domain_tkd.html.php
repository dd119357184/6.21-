<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)">自定义域名TKD</a></li>
</ul>
<div id="admin_right_b">
<form method="post" action="?admin-domain-update_tkd">
<table border="0" align="center" cellpadding="8" cellspacing="0" class="tableConfig" id="config0">
<tr>
	<td>
		<font style="line-height:25px;">
			<p style="color:blue;">本功能可以自定义指定域名首页的TKD，即：首页标题、首页关键词、首页描述</p>
			<p>每行为一个域名的设置，格式：<font color="#cc0000">域名----网站名称----首页标题----关键词----描述</font>，例子：<font color="#cc0000">seo.com----seo教程网----首页标题----seo关键词,关键词2----seo描述巴拉巴拉</font></p>
			<p>如只设置标题，则可以这样：<font color="#cc0000">域名----网站名称</font></p>
			<p>支持泛域名，格式： <font color="#cc0000">*.seo.com</font>，<font color="#cc0000">支持使用模板标签《<a href="https://www.xxfseo.com/spider/universal-spiderpool-template-tags.html" target="_blank">模板调用标签说明文档</a>》</font></p>
		</font>
	</td>
</tr>
<tr class="tdbg">
  <td><textarea name="list" type="text" style="height:350px;width:98%;"><?php echo $this->_var['list']; ?></textarea></td>
</tr>
<tr>
	<td><button type="submit" id="dosave" class="button button_submit">保存设置</button></td>
</tr>
</table>
</form>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>