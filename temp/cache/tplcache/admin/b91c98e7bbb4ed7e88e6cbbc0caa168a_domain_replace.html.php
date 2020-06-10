<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)" onClick="selectTab('config0',this)">内容伪原创</a></li>
</ul>
<div id="admin_right_b">
<div class="divtips" style="font-size:13px;margin-top:10px;">
	<p>提示：前台伪原创为实时词汇替换会卡CPU，建议采集规则中启用伪原创比较好！</p>
</div>

<form method="post" action="<?php echo url('admin/config/update'); ?>" enctype="multipart/form-data">

<table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" id="config2" class="tableConfig">

		<tr class="tdbg item_title">
			<td width="150" align="right"><i class="typcn typcn-cog"></i> 前台伪原创</td>
			<td></td>
		</tr>
		<tr>
			<td align="right" class="config_td_first">选择网站分组：</td>
			<td><input type="hidden" name="con[replace_group]" id="replace_group_value" value="<?php echo $this->_var['replace_group']; ?>" /><font id="replace_group_items" color="#ff6600"><?php if(! $this->_var['replace_group_name']): ?>未选择<?php else: ?><?php echo $this->_var['replace_group_name']; ?><?php endif; ?></font>&nbsp;&nbsp;<a href="javascript:" class="button button_small" onclick="select_group('replace');">点击选择</a> <span class="tips" style="color:red"><i class="typcn typcn-info"></i>选择开启此功能的网站分组</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">前台标题伪原创：</td>
		  <td class="icheck_radios"><label><input type="radio" name="con[replace_title]" value="1" <?php if($this->_var['replace_title']): ?> checked<?php endif; ?>>开启</label>
				<label><input type="radio" name="con[replace_title]" value="0" <?php if(! $this->_var['replace_title']): ?> checked<?php endif; ?>>关闭</label>　<span>前台标题是否伪原创词汇替换，<font color="red">此选项词汇多于1000个时会卡CPU</font></span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" width="120" class="config_td_first">前台内容伪原创：</td>
		  <td class="icheck_radios"><label><input type="radio" name="con[replace_content]" value="1" <?php if($this->_var['replace_content']): ?> checked<?php endif; ?>>开启</label>
				<label><input type="radio" name="con[replace_content]" value="0" <?php if(! $this->_var['replace_content']): ?> checked<?php endif; ?>>关闭</label>　<span>前台内容进行伪原创词汇替换，<font color="red">此选项词汇多于1000个时会卡CPU</font></span></td>
		</tr>
		<tr class="tdbg item_title">
			<td width="150" align="right"><i class="typcn typcn-cog"></i> 伪原创词汇</td>
			<td></td>
		</tr>
		<tr>
			<td align="right" class="config_td_first">伪原创词汇：</td>
			<td><div style="color:red;margin-bottom:5px;"><i class="typcn typcn-info"></i>每行一对同义词，半角逗号分隔  如：开心,高兴</div>
			<textarea name="replaceword" class="inputs" style="width:350px;padding:1px;height:200px"><?php echo $this->_var['replaceword']; ?></textarea>
			</td>
		</tr>
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