<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<form method="post">
<input type="hidden" name="r[cid]" value="<?php echo empty($this->_var['cid']) ? 0 : $this->_var['cid']; ?>">
<table border="0" cellpadding="8" cellspacing="0" class="tableConfig">
<tr class="tdbg item_title">
	<td colspan=2><i class="typcn typcn-cog"></i> 基本设置</td>
	<td></td>
</tr>
<tr>
	<td width="120" align="right" class="config_td_first">外链开关：</td>
	<td class="icheck_radios"><label><input type="radio" name="r[links_open]" value="1" <?php if($this->_var['links_open']): ?> checked<?php endif; ?>>开启</label>
	<label><input type="radio" name="r[links_open]" value="0" <?php if(! $this->_var['links_open']): ?> checked<?php endif; ?>>关闭</label>
	</td>
</tr>
<tr class="tdbg">
  <td align="right" class="config_td_first">外链调用条数：</td>
  <td class="tdbg"><input name="r[links_default_num]" type="text" class="input" value="<?php echo empty($this->_var['links_default_num']) ? 10 : $this->_var['links_default_num']; ?>" size="12">
  <span class="tips">当模板标签中未指定条数时使用此值</span>
  </td>
</tr>
<tr class="tdbg item_title">
	<td colspan=2><i class="typcn typcn-cog"></i> 索引池设置（即外链库中的格式未设置描文本时）</td>
	<td></td>
</tr>
<tr class="tdbg">
  <td align="right" class="config_td_first">外链描文本：</td>
  <td class="tdbg"><select name="r[links_title]" onchange="links_title(this.value);">
			<option value="title" <?php if(!$this->_var['links_title']||$this->_var['links_title'] == 'title'): ?> selected="selected"<?php endif; ?>>标题库</option>
			<option value="keywords" <?php if($this->_var['links_title'] == 'keywords'): ?> selected="selected"<?php endif; ?>>关键词库</option>
			<option value="url" <?php if($this->_var['links_title'] == 'url'): ?> selected="selected"<?php endif; ?>>使用URL链接</option>
			<option value="txt" <?php if($this->_var['links_title'] == 'txt'): ?> selected="selected"<?php endif; ?>>指定txt文件</option>
		  </select>
  <span class="tips">默认使用标题库</span>
  </td>
</tr>
<tr class="tdbg">
  <td align="right" class="config_td_first">描文本指定文件：</td>
  <td class="tdbg"><input id="links_title_txt" name="r[links_title_txt]" type="text" class="input" value="<?php echo $this->_var['links_title_txt']; ?>" size="30">
  <span class="tips">输入文件路径，如： /temp/data/links_title.txt</span>
  </td>
</tr>
<tr class="tdbg">
	  <td>&nbsp;</td>
      <td><button type="submit" id="savec" class="button button_submit">保存设置</button></td>
    </tr>
</table>
</form>
<script type="text/javascript">
function links_title(s){
	if(s=='txt'){
		lockinput('#links_title_txt',0);
	}else{
		lockinput('#links_title_txt',1);
	}
}
<?php if($this->_var['links_title'] != 'txt'): ?> lockinput('#links_title_txt',1); <?php endif; ?>
$("#savec").click(function(){
	$(this).html('正在保存...');
	$.ajax({
		type:"post",
		url:"?admin-links-update",
		data:$("form").serialize(),
		dataType:'json',
		timeout:28000,
		global:false,
		success:function(data){
			if(data.status==1){
				showAlert('success',data.info);
				setTimeout(function(){ var win = art.dialog.open.origin;win.location.reload(); top.art.dialog.list['openifrm'].close(); },2000);
			}else{
				showAlert('error',data.info);
			}
		}
	});
 return false;
});
</script>
</body>
</html>