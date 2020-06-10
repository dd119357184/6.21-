<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)">外链调用设置</a></li>
</ul>
<div id="admin_right_b">

<table border="0" align="center" cellpadding="8" cellspacing="1" class="tableConfig">
<tr class="item_title">
	<td colspan="5"><i class="typcn typcn-cog"></i> 外链调用配置（一个网站分组一个配置） (<span class="tips" style="color:red">注：如果网站分组未设置，则使用默认配置</span>)</td>
</tr>
<tr>
	<td colspan="5">
	<div class="boxlist">
	<dl class="default">
		<dt>
			<p class="title">默认的调用配置</p>
			<p>外链开关：<?php if($this->_var['default']['links_open']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>调用条数：<b style="color:red"><?php echo $this->_var['default']['links_default_num']; ?></b> 条</p>
			<p>&nbsp;&nbsp;&nbsp;描文本：<b><?php echo $this->_var['default']['links_titlename']; ?></b></p>
		</dt>
		<dd><a class="button button_small button_warning" href="javascript:" onclick="edit('0','默认的调用配置');">点击修改</a></dd>
	  </dl>
	<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<dl>
        <dt>
			<p class="title"><?php echo $this->_var['vo']['name']; ?></p>
			<?php if($this->_var['vo']['isset']): ?>
			<p>外链开关：<?php if($this->_var['vo']['data']['links_open']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>调用条数：<b style="color:red"><?php echo $this->_var['vo']['data']['links_default_num']; ?></b> 条</p>
			<p>&nbsp;&nbsp;&nbsp;描文本：<b><?php echo $this->_var['vo']['data']['links_titlename']; ?></b></p>
			<?php else: ?>
			<p>外链开关：未设置</p>
			<p>调用条数：未设置</p>
			<p>&nbsp;&nbsp;&nbsp;描文本：未设置</p>
			<?php endif; ?>
		</dt>
        <dd><?php if($this->_var['vo']['isset']): ?><a class="button button_small button_success" href="javascript:" onclick="edit('<?php echo $this->_var['vo']['id']; ?>','<?php echo $this->_var['vo']['name']; ?>');">修改</a>&nbsp;&nbsp;<a href="?admin-links-del-cid-<?php echo $this->_var['vo']['id']; ?>" class="button button_small button_remove" onclick='return confirm("确定清除该配置？!");'>清除</a><?php else: ?><a class="button button_small" href="javascript:" onclick="edit('<?php echo $this->_var['vo']['id']; ?>','<?php echo $this->_var['vo']['name']; ?>');">未设置，点击设置</a><?php endif; ?></dd>
      </dl>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?></div>
	</td>
</tr>
</table>
<script type="text/javascript">
function edit(id,typename){
	var title=id?'修改':'添加';
	art.dialog.open('?admin-links-edit-cid-'+id,{
		lock:true,opacity:0.3,title:title+'外链配置【'+typename+'】',id:'openifrm',width:'750px',height:'320px'});
}
</script>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>