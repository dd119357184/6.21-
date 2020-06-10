<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)" onClick="selectTab('config0',this)">站点互链</a></li>
</ul>
<div id="admin_right_b">
<script>
$(function() {
});
</script>
<form method="post" action="<?php echo url('admin/config/update'); ?>" enctype="multipart/form-data">
<table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" id="config0" class="tableConfig">
	<tbody>

		<tr class="tdbg item_title">
			<td width="150" align="right"><i class="typcn typcn-cog"></i> 站点互链设置</td>
			<td></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">站点互链开关：</td>
		  <td class="icheck_radios"><label><input type="radio" name="con[hulian]" value="1" <?php if($this->_var['hulian']): ?> checked<?php endif; ?>>开启</label>
				<label><input type="radio" name="con[hulian]" value="0" <?php if(! $this->_var['hulian']): ?> checked<?php endif; ?>>关闭</label>　<span>是否开启站点互链</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">站点互链条数：</td>
		  <td class="tdbg"><input name="con[domain_default_num]" type="text" class="input" value="<?php echo empty($this->_var['domain_default_num']) ? '10' : $this->_var['domain_default_num']; ?>" size="10"></td>
		</tr>
		<tr>
			<td align="right" class="config_td_first">选择网站分组：</td>
			<td><input type="hidden" name="con[hulian_group]" id="hulian_group_value" value="<?php echo $this->_var['hulian_group']; ?>" /><font id="hulian_group_items" color="#ff6600"><?php if(! $this->_var['hulian_group_name']): ?>未选择<?php else: ?><?php echo $this->_var['hulian_group_name']; ?><?php endif; ?></font>&nbsp;&nbsp;<a href="javascript:" class="button button_small" onclick="select_group('hulian');">点击选择</a> <span class="tips" style="color:red"><i class="typcn typcn-info"></i>选择开启此功能的网站分组</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">互链URL类型：</td>
		  <td><select name="con[flink_mod]">
			<option value="1" <?php if(!$this->_var['flink_mod']||$this->_var['flink_mod'] == '1'): ?> selected="selected"<?php endif; ?>>首页URL</option>
			<option value="2" <?php if($this->_var['flink_mod'] == '2'): ?> selected="selected"<?php endif; ?>>内页URL</option>
		  </select>&nbsp;&nbsp;</td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">互链描文本：</td>
		  <td class="tdbg"><select name="con[domain_title]" onchange="domain_title(this.value);">
					<option value="title" <?php if(!$this->_var['domain_title']||$this->_var['domain_title'] == 'title'): ?> selected="selected"<?php endif; ?>>标题库</option>
					<option value="keywords" <?php if($this->_var['domain_title'] == 'keywords'): ?> selected="selected"<?php endif; ?>>关键词库</option>
					<option value="txt" <?php if($this->_var['domain_title'] == 'txt'): ?> selected="selected"<?php endif; ?>>指定txt文件</option>
				  </select>
		  <span class="tips">默认使用标题库</span>
		  </td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">描文本指定文件：</td>
		  <td class="tdbg"><input id="domain_title_txt" name="con[domain_title_txt]" type="text" class="input" value="<?php echo $this->_var['domain_title_txt']; ?>" size="50">
		  <span class="tips">输入文件路径，如： /temp/data/domain_title.txt</span>
		  </td>
		</tr>
		<script type="text/javascript">
		function domain_title(s){
			if(s=='txt'){
				lockinput('#domain_title_txt',0);
			}else{
				lockinput('#domain_title_txt',1);
			}
		}
		<?php if($this->_var['domain_title'] != 'txt'): ?> lockinput('#domain_title_txt',1); <?php endif; ?>
		</script>
	</tbody>
</table>
	<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
    <tr class="tdbg">
	  <td width="150" align="center" class="tdbg">&nbsp;</td>
      <td><button type="submit" id="dosave" class="button button_submit">保存设置</button></td>
    </tr>
	</table>
	</form>
<div class="runtime"></div>  
</div>
<?php echo $this->fetch('group_list.html'); ?>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>