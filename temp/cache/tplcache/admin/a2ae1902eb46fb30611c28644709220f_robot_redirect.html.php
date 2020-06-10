<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)">蜘蛛强引记录</a></li>
	<li class="unsub"><a href="?admin-robot-redirect_del" onclick='return confirm("确定删除?删除后不可恢复!");'>删除强引记录</a></li>
	<li class="tips">注：仅显示最近5000条记录</li>
</ul>
<style type="text/css">
table td{ word-break: keep-all;white-space:nowrap;}
</style>
<div id="admin_right_b" style="90%">

<table border="0" align="center" cellpadding="3" cellspacing="1" class="table_b" style="margin-top:10px">
	<tbody>
	<tr>
	  <td width="50" align='center' class="title_bg">id</td>
	  <td width="100" align='center' class="title_bg">蜘蛛名称</td>
	  <td width="100" align='center' class="title_bg">网站分组</td>
	  <td width="110" align='center' class="title_bg">IP地址</td>
      <td class="title_bg">访问地址</td>
	  <td class="title_bg">强引地址</td>
	  <td width="140" align='center' class="title_bg">访问时间</td>
    </tr>
	</tbody>
	<tbody id="rlist">
	<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['vo']):
?>
		<tr class="tdbg">
			<td align="center"><?php echo $this->_var['vo']['id']; ?></td>
			<td align="center"><?php echo $this->_var['vo']['name']; ?></td>
			<td align="center"><?php echo empty($this->_var['vo']['typename']) ? '无' : $this->_var['vo']['typename']; ?></td>
			<td align="center"><?php echo $this->_var['vo']['ip']; ?></td>
			<td><?php echo $this->_var['vo']['url']; ?></td>
			<td><?php echo $this->_var['vo']['jumpurl']; ?></td>
			<td align="center"><?php echo $this->_var['vo']['time']; ?></td>
		</tr>
	<?php endforeach; else: ?>
		<tr bgcolor='#ffffff'>
			<td colspan='7' height="25" align="center">暂无记录！</td>
		</tr>
	<?php endif; unset($_from); ?><?php $this->pop_vars(); ?>
	</tbody>
	<tbody>
	<tr>
      <td colspan="7" class="tdbg content_page" align="center"><a>共 <font id="total"><?php echo empty($this->_var['total']) ? 0 : $this->_var['total']; ?></font> 条</a>&nbsp;<span id="pages"><?php echo $this->_var['pages']; ?></span></td>
	</tr>
	</tbody>
</table>

<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>