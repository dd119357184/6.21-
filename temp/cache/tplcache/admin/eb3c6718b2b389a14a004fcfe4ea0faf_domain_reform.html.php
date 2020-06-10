<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)">站点优化管理</a></li>
</ul>
<div id="admin_right_b">
<style type="text/css">
.boxlist dl{ min-width:180px;width:auto;}
.red{ color:red}
</style>
<table border="0" align="center" cellpadding="8" cellspacing="1" class="tableConfig">
<tr class="item_title">
	<td colspan="5"><i class="typcn typcn-cog"></i>站点优化配置（一个网站分组一个配置） (<span class="tips" style="color:red">注：如果网站分组未设置，则使用默认配置</span>)</td>
</tr>
<tr>
	<td colspan="5">
	<div class="boxlist">
	<dl class="default">
		<dt>
			<p class="title">默认的调用配置</p>
			<p>标题重组：<?php if($this->_var['default']['reform_title']): ?><b style="color:green"><?php echo $this->_var['default']['reform_titlename']; ?></b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>打散基数：<font color="blue"><?php echo $this->_var['default']['reform_title_base']; ?></font></p>
			<p>内容句子打乱：<?php if($this->_var['default']['shuffle_content']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>内容关联标题：<?php if($this->_var['default']['insert_title2content']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>内容库繁体转换：<?php if($this->_var['default']['tobig5']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>unicode转码：<b><?php echo $this->_var['default']['unicode']; ?></b></p>
			<p>ASCII特殊码(内容)：<?php if($this->_var['default']['insert_bodyascii']): ?><font style="color:green">已开启</b><?php else: ?><font class="red">已关闭</font><?php endif; ?></p>
			<p>ASCII特殊码(标题)：<?php if($this->_var['default']['insert_titleascii']): ?><font style="color:green">已开启</b><?php else: ?><font class="red">已关闭</font><?php endif; ?></p>
			<p>插入模板干扰标签：<?php if($this->_var['default']['insert_randtags'] == 1): ?>老版干扰<?php elseif($this->_var['default']['insert_randtags'] == 2): ?><b style="color:green">新版干扰</b><?php else: ?><font class="red">已关闭</font><?php endif; ?></p>
			<p>图片url本地化：<?php if($this->_var['default']['localpic']): ?><font style="color:green">已开启</b><?php else: ?><font class="red">已关闭</font><?php endif; ?></p>
			<p>文章发布时间：<?php if(!$this->_var['default']['addtime_type']||$this->_var['default']['addtime_type'] == '1'): ?>内置<?php else: ?>系统<?php endif; ?></p>
			<p>企业名称自动生成：<?php if($this->_var['default']['auto_make_webname']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
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
			<p>标题重组：<?php if($this->_var['vo']['data']['reform_title']): ?><b style="color:green"><?php echo $this->_var['vo']['data']['reform_titlename']; ?></b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>打散基数：<font color="blue"><?php echo $this->_var['vo']['data']['reform_title_base']; ?></font></p>
			<p>内容句子打乱：<?php if($this->_var['vo']['data']['shuffle_content']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>内容关联标题：<?php if($this->_var['vo']['data']['insert_title2content']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>内容库繁体转换：<?php if($this->_var['vo']['data']['tobig5']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<p>unicode转码：<b><?php echo $this->_var['vo']['data']['unicode']; ?></b></p>
			<p>ASCII特殊码(内容)：<?php if($this->_var['vo']['data']['insert_bodyascii']): ?><font style="color:green">已开启</b><?php else: ?><font class="red">已关闭</font><?php endif; ?></p>
			<p>ASCII特殊码(标题)：<?php if($this->_var['vo']['data']['insert_titleascii']): ?><font style="color:green">已开启</b><?php else: ?><font class="red">已关闭</font><?php endif; ?></p>
			<p>插入模板干扰标签：<?php if($this->_var['vo']['data']['insert_randtags'] == 1): ?>老版干扰<?php elseif($this->_var['vo']['data']['insert_randtags'] == 2): ?><b style="color:green">新版干扰</b><?php else: ?><font class="red">已关闭</font><?php endif; ?></p>
			<p>图片url本地化：<?php if($this->_var['vo']['data']['localpic']): ?><font style="color:green">已开启</b><?php else: ?><font class="red">已关闭</font><?php endif; ?></p>
			<p>文章发布时间：<?php if(!$this->_var['vo']['addtime_type']||$this->_var['vo']['addtime_type'] == '1'): ?>内置<?php else: ?>系统<?php endif; ?></p>
			<p>企业名称自动生成：<?php if($this->_var['vo']['auto_make_webname']): ?><b style="color:green">已开启</b><?php else: ?><b class="red">已关闭</b><?php endif; ?></p>
			<?php else: ?>
			<p>标题重组：未设置</p>
			<p>打散基数：未设置</p>
			<p>内容句子打乱：未设置</p>
			<p>内容关联标题：未设置</p>
			<p>内容库繁体转换：未设置</p>
			<p>unicode转码：未设置</p>
			<p>ASCII特殊码(内容)：未设置</p>
			<p>ASCII特殊码(标题)：未设置</p>
			<p>插入模板干扰标签：未设置</p>
			<p>图片url本地化：未设置</p>
			<p>文章发布时间：未设置</p>
			<p>企业名称自动生成：未设置</p>
			<?php endif; ?>
		</dt>
        <dd><?php if($this->_var['vo']['isset']): ?><a class="button button_small button_success" href="javascript:" onclick="edit('<?php echo $this->_var['vo']['id']; ?>','<?php echo $this->_var['vo']['name']; ?>');">修改</a>&nbsp;&nbsp;<a href="?admin-domain-reform_del-cid-<?php echo $this->_var['vo']['id']; ?>" class="button button_small button_remove" onclick='return confirm("确定清除该配置？!");'>清除</a><?php else: ?><a class="button button_small" href="javascript:" onclick="edit('<?php echo $this->_var['vo']['id']; ?>','<?php echo $this->_var['vo']['name']; ?>');">未设置，点击设置</a><?php endif; ?></dd>
      </dl>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?></div>
	</td>
</tr>
</table>
<script type="text/javascript">
function edit(id,typename){
	var title=id?'修改':'添加';
	art.dialog.open('?admin-domain-reform_edit-cid-'+id,{
		lock:true,opacity:0.3,title:title+'站点优化配置【'+typename+'】',id:'openifrm',width:'650px',height:'520px'});
}
</script>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>