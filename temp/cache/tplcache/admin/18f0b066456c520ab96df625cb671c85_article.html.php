<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a>文章库管理</a></li>
	<li class="unsub"><a href="javascript:uptxt();"><i class="typcn typcn-upload" style="font-size:15px;"></i> 导入文章库</a></li>
	<li class="tips">注：文章库导入时需要注意格式</li>
</ul>
<div id="admin_right_b">
<ul class="classlist">
<li <?php if($this->_var['type'] == ''): ?>class="cur"<?php endif; ?>><a href="?admin-txtdata-<?php echo $this->_var['action']; ?>">全部分类</a></li>
<?php $_from=$this->_var['class_list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<li <?php if($this->_var['type'] == $this->_var['vo']['dirname']): ?>class="cur"<?php endif; ?>><a href="?admin-txtdata-<?php echo $this->_var['action']; ?>-type-<?php echo $this->_var['vo']['dirname']; ?>"><?php echo $this->_var['vo']['name']; ?>(<b><?php echo empty($this->_var['vo']['num']) ? 0 : $this->_var['vo']['num']; ?></b>)</a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
</ul>
<form action="<?php echo url('admin/txtdata/delall'); ?>" method="post" id="form" name="form"> 
  <table border="0" align="center" cellpadding="3" cellspacing="1" class="table_b">
   <input type="hidden" name="d" value="<?php echo $this->_var['input_dir']; ?>" />
	<tr>
	  <td align='center' width="30" class="title_bg">选择</td>
	  <td width="50" align='center' class="title_bg">id</td>
      <td width="200" class="title_bg">文件名</td>
	  <td width="100" align='center' class="title_bg">所属分类</td>
	  <td width="100" align='center' class="title_bg">行数</td>
	  <td width="100" align='center' class="title_bg">文件大小</td>
	  <td width="50" align='center' class="title_bg">内容库</td>
	  <td width="150" align='center' class="title_bg">修改时间</td>
      <td width="180" align='center' class="title_bg">管理</td>
	  <td class="title_bg"></td>
    </tr>
<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
    <tr onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
	  <td height="25" align="center"><input name="f[]" type="checkbox" value="<?php echo $this->_var['vo']['path_encode']; ?>"></td>
	  <td align="center"><?php echo $this->_var['vo']['id']; ?></td>
      <td>&nbsp;&nbsp;<?php echo $this->_var['vo']['filename']; ?></td>
	  <td align="center"><a href="?admin-txtdata-<?php echo $this->_var['action']; ?>-type-<?php echo $this->_var['vo']['dirname']; ?>"><?php echo $this->_var['vo']['typename']; ?></a></td>
	  <td align="center"><?php echo $this->_var['vo']['count']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['filesize']; ?></td>
	  <td align="center"><?php if($this->_var['vo']['hasbody']): ?><font color="green">有</font><?php else: ?><font color="red">无</font><?php endif; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['filemtime']; ?></td>
      <td align="center"><a class="button button_small" href="javascript:" onclick="review('<?php echo $this->_var['vo']['path_encode']; ?>','<?php echo $this->_var['vo']['filename']; ?>');">查看文章</a>&nbsp;&nbsp;<a href="?admin-txtdata-del-f-<?php echo $this->_var['vo']['path_encode']; ?>" class="button button_small button_remove" onclick='return confirm("确定删除?删除后不可恢复!");'>删除</a></td>
	  <td></td>
    </tr>
<?php endforeach; else: ?>
	<tr bgcolor='#ffffff'>
		<td colspan='10' height="25" align="center">暂无文档！</td>
	</tr>
<?php endif; unset($_from); ?><?php $this->pop_vars(); ?>
	<tr>
      <td colspan="10" height='30' class="tdbg">
	  <span class="right"></span>&nbsp;&nbsp;<input name="chkall" type="checkbox" id="chkall" onclick=checkall(this.form) value="checkbox">&nbsp;<label for="chkall">全选</label>  
      <button type="submit" class="button button_remove" onClick="if(confirm('确定要删除吗?')){ form.action='?admin-txtdata-delall';}else{ return false}"><i class="typcn typcn-delete"></i>批量删除</button>
</td>
    </tr>
	
	<tr>
      <td colspan="10" class="tdbg content_page" align="center"><?php echo $this->_var['pages']; ?></td>
	</tr>
	<tr>
      <td colspan="10" class="tdbg">
		<p class="divtips">当网站内容模式的内容类型为“文章库内容”时，此处文件才会被调用</p>
		<div style="padding:10px;font-size:14px;line-height:25px">
		<p style="font-weight:bold;">文章库的标题和内容是分开存储的（导入时只需要导入一个内容的即可）：</p>
		<p>· 标题文件保存在 “<font color="blue">/temp/data/article</font>” 文件夹，每个模型一个文件夹</p>
		<p>· 内容文件保存在 “<font color="blue">/temp/data/body</font>” 文件夹，每个模型一个文件夹</p>
		<p style="color:red;">注：标题和内容的文件名相同，且内容每行都是一一对应的，这些导入的时候系统会自动帮你处理好（点击上面的导入文章库）</p>
		</div>
	  </td>
	</tr>
  </table>
</form>
<script type="text/javascript">
$('a.download').click(function(){
	$.download('?admin-txtdata-download','f='+$(this).attr('f')+'&d=<?php echo $this->_var['input_dir']; ?>');
	return false;
});
function review(file,title){
	top.art.dialog.open('?admin-txtdata-review-f-'+file,{ lock:true,opacity:0.3,title:'文章库查看 ['+title+']',id:'reviewifrm',width:'800px'});
}
function uptxt(){
	top.art.dialog.data('title', '文章库');
	top.art.dialog.data('type', '<?php echo $this->_var['type']; ?>');
	top.art.dialog.open('?admin-txtdata-upload_more-d-<?php echo $this->_var['input_dir']; ?>',{ lock:true,opacity:0.3,title:'上传文章库',id:'uptxtifrm',width:'750px',height:'400px',close: function () {
		location.reload();
	}});
}
</script>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>