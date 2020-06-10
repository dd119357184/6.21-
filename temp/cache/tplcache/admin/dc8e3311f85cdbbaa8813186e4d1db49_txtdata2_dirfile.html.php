<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a><?php echo $this->_var['title']; ?>管理</a></li>
	<li class="unsub"><a href="javascript:uptxt();"><i class="typcn typcn-upload" style="font-size:15px;"></i> 上传文件</a></li>
	<li class="tips">注：一行一个，为了性能，每个文件最好不要超过2M</li>
</ul>
<div id="admin_right_b">
<style type="text/css">
.classlist li .common{ font-weight:bold;}
</style>
<ul class="classlist">
<?php if($this->_var['class_list']): ?>
<li <?php if($this->_var['type'] == ''): ?>class="cur"<?php endif; ?>><a href="?admin-txtdata2-<?php echo $this->_var['action']; ?>">全部分组</a></li>
<li <?php if($this->_var['type'] == '_common'): ?>class="cur"<?php endif; ?>><a class="common" href="?admin-txtdata2-<?php echo $this->_var['action']; ?>-type-_common">全局<?php echo $this->_var['title']; ?></a></li>
<?php $_from=$this->_var['class_list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
	<li <?php if($this->_var['type'] == $this->_var['vo']['dirname']): ?>class="cur"<?php endif; ?>><a href="?admin-txtdata2-<?php echo $this->_var['action']; ?>-type-<?php echo $this->_var['vo']['dirname']; ?>"><?php echo $this->_var['vo']['name']; ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
<?php else: ?>
	<li class="divtips">帅哥，当前设置是基于网站分组的，请先添加网站！去 站群管理->网站管理 添加</li>
<?php endif; ?>
</ul>
<form action="<?php echo url('admin/txtdata2/delall'); ?>" method="post" id="form" name="form"> 
  <table border="0" align="center" cellpadding="3" cellspacing="1" class="table_b">
   <input type="hidden" name="d" value="<?php echo $this->_var['input_dir']; ?>" />
	<tr>
	  <td align='center' width="30" class="title_bg">选择</td>
	  <td width="50" align='center' class="title_bg">id</td>
      <td width="200" class="title_bg">文件名</td>
	  <td width="100" align='center' class="title_bg">所属分类</td>
	  <td width="100" align='center' class="title_bg">行数</td>
	  <td width="100" align='center' class="title_bg">文件大小</td>
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
	  <td align="center"><a href="?admin-txtdata2-<?php echo $this->_var['action']; ?>-type-<?php echo $this->_var['vo']['dirname']; ?>"><?php echo $this->_var['vo']['typename']; ?></a></td>
	  <td align="center"><?php echo $this->_var['vo']['count']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['filesize']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['filemtime']; ?></td>
      <td align="center"><a class="button button_small" href="javascript:" onclick="review('<?php echo $this->_var['vo']['path_encode']; ?>','<?php echo $this->_var['vo']['filename']; ?>');">预览</a>&nbsp;&nbsp;<a class="button button_small button_primary download" f="<?php echo $this->_var['vo']['path_encode']; ?>">下载</a>&nbsp;&nbsp;<a href="?admin-txtdata-del-f-<?php echo $this->_var['vo']['path_encode']; ?>" class="button button_small button_remove" onclick='return confirm("确定删除?删除后不可恢复!");'>删除</a></td>
	  <td></td>
    </tr>
<?php endforeach; else: ?>
	<tr bgcolor='#ffffff'>
		<td colspan='9' height="25" align="center">暂无文档！</td>
	</tr>
<?php endif; unset($_from); ?><?php $this->pop_vars(); ?>
	<tr>
      <td colspan="9" height='30' class="tdbg">
	  <span class="right"></span>&nbsp;&nbsp;<input name="chkall" type="checkbox" id="chkall" onclick=checkall(this.form) value="checkbox">&nbsp;<label for="chkall">全选</label>  
      <button type="submit" class="button button_remove" onClick="if(confirm('确定要删除吗?')){ form.action='?admin-txtdata2-delall';}else{ return false}"><i class="typcn typcn-delete"></i>批量删除</button>
	  <button type="submit" class="button button_primary" onclick="form.action='?admin-txtdata-download';"><i class="typcn typcn-download"></i>批量下载</button>
</td>
    </tr>
	
	<tr>
      <td colspan="9" class="tdbg content_page" align="center"><?php echo $this->_var['pages']; ?></td>
	</tr>
	<tr>
      <td colspan="9" class="tdbg">
		<div class="divtips">
		<p><?php echo $this->_var['title']; ?>的文件保存在 “/temp/data/<?php echo ACTION_NAME;?>” 文件夹，每个网站分组一个文件夹</p>
		<p>全局<?php echo $this->_var['title']; ?>的文件保存在 “/temp/data/<?php echo ACTION_NAME;?>/_common” 文件夹，全局<?php echo $this->_var['title']; ?>每个分组都会调用到</p>
		</div>
	  </td>
	</tr>
	<?php if(ACTION_NAME == 'link'): ?><tr>
      <td colspan="9" class="tdbg">
		<div style="color:#cc0000;padding:10px;font-size:14px;line-height:25px">
		<p>设置说明：</p>
		<p>1. <b>索引池格式</b>：<font color="#2288cc">http://xxfseo.com/1.html</font>（只有网址）</p>
		<p>2. <b>繁衍池格式</b>：<font color="#2288cc">http://xxfseo.com/2019/{数字8}/{日期}.html</font>（带标签的网址）</p>
		<p>3. <b>权重池格式</b>：用符号|分隔，如：<font color="#2288cc">http://xxfseo.com/1.html|描文本标题</font>（带标题的网址）</p>
		<p>4. <b>外推格式</b>：根据需要改变，例子：<font color="#2288cc">http://xxfseo.com/1.html?kw={随机关键词}</font>（外推留痕）</p>
		<p>5. <b>支持的url标签（文件需为utf8编码）</b>： <font color="#2288cc">{数字}、{字母}、{大写字母}、{大小写字母}、{大写字母数字}、{大小写字母数字}、{数字字母}、<br>{日期}、{年}、{月}、{日}、{时}、{分}、{秒}、{随机字符}、{随机关键词}</font>，数字和字母标签后面加数字是位数，如： <font color="#2288cc">{数字8}</font>表示8个数字、<font color="#2288cc">{数字1-8}</font>示随机1-8个数字</p>
		</div>
	  </td>
	</tr><?php endif; ?>
  </table>
</form>
<script type="text/javascript">
$('a.download').click(function(){
	$.download('?admin-txtdata2-download','f='+$(this).attr('f')+'&d=<?php echo $this->_var['input_dir']; ?>');
	return false;
});
function review(file,title){
	top.art.dialog.open('?admin-txtdata2-review-f-'+file,{ lock:true,opacity:0.3,title:'文件预览 ['+title+']',id:'reviewifrm',width:'700px'});
}
function uptxt(){
	top.art.dialog.data('title', '<?php echo $this->_var['title']; ?>');
	top.art.dialog.data('type', '<?php echo $this->_var['type']; ?>');
	top.art.dialog.open('?admin-txtdata2-upload_more-d-<?php echo $this->_var['input_dir']; ?>',{ lock:true,opacity:0.3,title:'上传<?php echo $this->_var['title']; ?>',id:'uptxtifrm',width:'750px',height:'400px',close: function () {
		location.reload();
	}});
}
</script>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>