<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<?php echo $this->fetch('collect_head.html'); ?>
<div id="admin_right_b">
<form action="?admin-collect-index" method="post" method="post" id="form" name="form"> 
<table border="0" align="center" cellpadding="3" cellspacing="1" class="table_b">
	<tr align='center'>
	  <td align='center' width="30" class="title_bg">选择</td>
	  <td width="30" align='center' class="title_bg">id</td>
	  <td width="250" class="title_bg">规则名称</td>
	  <td width="80" class="title_bg">模型</td>
	  <td width="50" class="title_bg">类型</td>
	  <td width="70" class="title_bg">每日上限(条/次)</td>
	  <td width="50" class="title_bg">已采次数</td>
	  <td width="60" align='center' class="title_bg">自动采集</td>
	  <td width="80" align='center' class="title_bg">修改时间</td>
	  <td width="110" align='center' class="title_bg">最近采集</td>
      <td width="280" align='center' class="title_bg">管理</td>
	  <td class="title_bg">&nbsp;</td>
    </tr>
<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['vo']):
?>
    <tr onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
	  <td height="25" align="center"><input name="ids[]" type="checkbox" value="<?php echo $this->_var['vo']['id']; ?>"></td>
	  <td align="center"><?php echo $this->_var['vo']['id']; ?></td>
      <td>&nbsp;&nbsp;<a href="?admin-collect-edit-id-<?php echo $this->_var['vo']['id']; ?>" title="点击修改"><?php echo $this->_var['vo']['name']; ?></a></td>
	  <td align="center" title="<?php echo $this->_var['vo']['typename2']; ?>"><?php echo $this->_var['vo']['typename']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['modelname']; ?></td>
	  <td align="center"><?php if($this->_var['vo'] [ 'maxnum' ]): ?><?php echo $this->_var['vo']['maxnum']; ?><?php else: ?><font class="c9">不限</font><?php endif; ?>/<?php if(isset ( $this->_var['vo']['rules']['collect_day_num'] )): ?><?php echo $this->_var['vo']['rules']['collect_day_num']; ?><?php else: ?>1<?php endif; ?></td>
	  <td align="center"><?php echo empty($this->_var['vo']['numlog']) ? 0 : $this->_var['vo']['numlog']; ?></td>
	  <td align="center"><?php if($this->_var['vo'] [ 'status' ]): ?><a href="?admin-collect-status-id-<?php echo $this->_var['vo']['id']; ?>-sid-0" title="点击设为关闭"><font color="red">已开启</font></a><?php else: ?><a href="?admin-collect-status-id-<?php echo $this->_var['vo']['id']; ?>-sid-1" title="点击设为开启"><font class="c9">已关闭</font></a><?php endif; ?></td>
	  <td align="center"><?php echo now_date_color($this->_var['vo']['addtime'],'Y/m/d H:i'); ?></td>
	  <td align="center"><?php if($this->_var['vo'] [ 'lasttime' ]): ?><?php echo now_date_color($this->_var['vo']['lasttime'],'Y/m/d H:i'); ?><?php else: ?><font class="c9">未采集</font><?php endif; ?></td>
      <td align="center">
		<a href="javascript:" onclick="nodeTest('<?php echo $this->_var['vo']['id']; ?>','<?php echo $this->_var['vo']['name']; ?>');" title="测试规则" class="button button_small button_inverse">测试</a>
		<a href="javascript:" onclick="nodeAction('<?php echo $this->_var['vo']['id']; ?>','<?php echo $this->_var['vo']['name']; ?>');" title="采集" class="button button_small button_warning">采集</a>
		<a href="?admin-collect-edit-id-<?php echo $this->_var['vo']['id']; ?>" class="button button_small" title="修改规则">修改</a>
		<a href="javascript:" onclick="nodeExport('<?php echo $this->_var['vo']['id']; ?>','<?php echo $this->_var['vo']['name']; ?>');" class="button button_small button_primary" title="导出规则">导出</a>
		<a href="javascript:" onclick="nodeImport('<?php echo $this->_var['vo']['id']; ?>','导入规则：<?php echo $this->_var['vo']['name']; ?>');" class="button button_small button_grey" title="导入覆盖此规则">导入</a>
		<a href="?admin-collect-del-id-<?php echo $this->_var['vo']['id']; ?>" onclick='return confirm("确定删除?删除后不可恢复!");' class="button button_small button_remove">删除</a>
	  </td>
	  <td>&nbsp;</td>
    </tr>
<?php endforeach; else: ?>
	<tr bgcolor='#ffffff'>
		<td colspan='12' height="25" align="center">暂无采集规则！</td>
	</tr>
<?php endif; unset($_from); ?><?php $this->pop_vars(); ?>
	<tr>
      <td colspan="12" height='40' class="tdbg" style="padding:20px 0;">
	  <span class="right"></span>&nbsp;&nbsp;<input name="chkall" type="checkbox" id="chkall" onclick=checkall(this.form) value="checkbox">&nbsp;<label for="chkall">全选</label>  
	  <b>批量操作：</b><select name="action" id="action">
		<option disabled>----------------</option>
		<option value="delall">批量删除</option>
		<option disabled>----------------</option>
		<option value="replace_on">开启伪原创</option>
		<option value="replace_off">关闭伪原创</option>
		<option disabled>----------------</option>
		<option value="autocollect_on">开启自动采集</option>
		<option value="autocollect_off">关闭自动采集</option>
	  </select>
	  <button type="submit" class="button button_primary" onClick="return actionf();">执行操作</button>
</td>
    </tr>
	<tr bgcolor='#ffffff'>
		<td colspan='12' height='30'><font color="red">- 开启自动采集后，将在后端触发采集！<br>- 采集规则不限制模型<br>- 如果修改节点新增网址，则可能需要清除自动采集缓存</font></td>
	</tr>
	<tr>
      <td colspan="12" class="tdbg content_page" align="center"><a>共 <?php echo $this->_var['total']; ?> 条</a>&nbsp;<?php echo $this->_var['pages']; ?></td>
	</tr>
  </table>
</form>
<div class="runtime"></div>  
</div>
<script type="text/javascript">
function actionf(){
	var actionname=$('#action').val();
	if(actionname=='delall'){
		if(confirm('确定要删除吗?')){
			form.action='?admin-collect-delmore';
		}else{
			return false;
		}
	}else if(actionname=='replace_on'){
		form.action='?admin-collect-replaceword-sid-1';
	}else if(actionname=='replace_off'){
		form.action='?admin-collect-replaceword-sid-0';
	}else if(actionname=='autocollect_on'){
		form.action='?admin-collect-statusAll-sid-1';
	}else if(actionname=='autocollect_off'){
		form.action='?admin-collect-statusAll-sid-0';
	}
}
function nodeTest(nid,title){
	top.art.dialog.open('?admin-collect-test-nid-'+nid,{ lock:true,title:'采集测试 ['+title+', ID:'+nid+']',id:'nodeTestifrm',width:'800px',height:'500px'});
}
function nodeExport(nid,title){
	art.dialog.open('?admin-collect-export-nid-'+nid,{lock:true,title:'规则导出 ['+title+', ID:'+nid+']',id:'nodeTestifrm',width:'700px',height:'400px'});
}
function nodeAction(nid,title){
	art.dialog.open('?admin-collect-run-nid-'+nid,{lock:true,title:'正在采集 ['+title+', ID:'+nid+']',id:'nodeActionifrm',width:'700px',height:'400px',close: function () {
		window.location.reload();
	}});
}
</script>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>