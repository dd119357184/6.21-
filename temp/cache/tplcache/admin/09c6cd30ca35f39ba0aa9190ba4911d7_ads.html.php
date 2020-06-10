<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:">广告管理</a></li>
	<li class="unsub"><a href="<?php echo url('admin/ads/edit'); ?>">添加广告</a></li>
</ul>

<div id="admin_right_b">

  <table border="0" align="center" cellpadding="3" cellspacing="1" class="table_b">
	<tr>
	  <td width="80" align='center' class="title_bg">id</td>
      <td class="title_bg" width="120">标识(唯一)</td>
	  <td class="title_bg" width="150">模板调用标签</td>
	   <td class="title_bg" width="100">所属分组</td>
	  <td class="title_bg" width="120">广告说明</td>
	  <td align='center' class="title_bg" width="120">自动插入位置</td>
      <td class="title_bg" width="80">屏蔽蜘蛛</td>
      <td width="150" align='center' class="title_bg">管理</td>
	  <td class="title_bg">&nbsp;</td>
    </tr>
<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['vo']):
?>
    <tr onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
	  <td align="center" height="25"><?php echo $this->_var['vo']['id']; ?></td>
	  <td><?php echo $this->_var['vo']['mark']; ?></td>
	  <td style="color:#ff6600">{<a></a>$myad.<?php echo $this->_var['vo']['mark']; ?><a></a>}</td>
	  <td align="center"><?php echo $this->_var['vo']['groupname']; ?></td>
	  <td><?php echo $this->_var['vo']['name']; ?></td>
	  <td align='center'>
		<?php if(! $this->_var['vo']['insert_position']): ?>不插入<?php endif; ?>
		<?php if($this->_var['vo']['insert_position'] == '1'): ?>插入页面头部<?php endif; ?>
		<?php if($this->_var['vo']['insert_position'] == '2'): ?>插入页面底部<?php endif; ?>
		<?php if($this->_var['vo']['insert_position'] == '3'): ?>插入内容前面<?php endif; ?>
		<?php if($this->_var['vo']['insert_position'] == '4'): ?>插入内容后面<?php endif; ?>
	  </td>
	  <td align="center" height="25"><?php if($this->_var['vo']['ban_robot']): ?><font color="green">开启</font><?php else: ?><font color="red">关闭</font><?php endif; ?></td>
      <td align="center"><a href="?admin-ads-preview-id-<?php echo $this->_var['vo']['id']; ?>" target='_blank' class="button button_small button_inverse">预览</a> <a href="?admin-ads-edit-id-<?php echo $this->_var['vo']['id']; ?>" class="button button_small">编辑</a> <a href="?admin-ads-del-id-<?php echo $this->_var['vo']['id']; ?>" onclick='return confirm("确定删除?删除后不可恢复!");' class="button button_small button_remove">删除</a></td>
	  <td>&nbsp;</td>
    </tr>
<?php endforeach; else: ?>
	<tr bgcolor='#ffffff'>
		<td colspan='9' height="25" align="center">暂无广告！</td>
	</tr>
<?php endif; unset($_from); ?><?php $this->pop_vars(); ?>

  </table>
<div class="divtips" style="margin-top:10px;">
<p>注：使用自动插入无需修改模板，如自动插入的位置不满意可手动使用调用标签写入模板中</p>
</div>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>