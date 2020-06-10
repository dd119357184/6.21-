<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a>后台操作日志</a></li>
	<li class="tips"><a href="?admin-aclogs-del7day">清除7天前的日志</a></li>
</ul>
<div id="admin_right_b">

  <table border="0" align="center" cellpadding="3" cellspacing="1" class="table_b">
	<tr align='center'>
	  <td width="70" align='center' class="title_bg">id</td>
	  <td width="150" class="title_bg">管理员</td>
	  <td width="150" class="title_bg">ip地址</td>
	  <td width="50" class="title_bg">类型</td>
	  <td width="500" class="title_bg">操作地址</td>
	  <td width="130" align='center' class="title_bg">操作时间</td>
      <td class="title_bg">&nbsp;</td>
    </tr>
<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['vo']):
?>
    <tr class="tdbg" onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
	  <td align="center"><?php echo $this->_var['vo']['id']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['username']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['ip']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['method']; ?></td>
      <td title="<?php echo $this->_var['vo']['action']; ?>"><?php echo $this->_var['vo']['action_short']; ?></td>
	  <td align="center"><?php echo now_date_color($this->_var['vo']['addtime'],'Y-m-d H:i'); ?></td>
	  <td>&nbsp;</td>
    </tr>
<?php endforeach; else: ?>
	<tr bgcolor='#ffffff'>
		<td colspan='7' height="25" align="center">暂无日志！</td>
	</tr>
<?php endif; unset($_from); ?><?php $this->pop_vars(); ?>
	<tr>
      <td colspan="7" class="tdbg content_page" align="center"><a>共 <?php echo $this->_var['total']; ?> 条</a>&nbsp;<?php echo $this->_var['pages']; ?></td>
	</tr>
  </table>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>