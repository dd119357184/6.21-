<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)" onClick="selectTab('config0',this)">基本设置</a></li>
	<li class="unsub"><a href="javascript:void(0)" onClick="selectTab('config1',this)">页面设置</a></li>
</ul>
<div id="admin_right_b">
<script>
$(function() {
});
</script>
<form method="post" action="<?php echo url('admin/config/update'); ?>" enctype="multipart/form-data">
<table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" id="config0" class="tableConfig">
	<tr class="tdbg item_title">
		<td align="right"><i class="typcn typcn-cog"></i> 基本设置</td>
		<td></td>
	</tr>

	<tr class="tdbg">
      <td align="right" class="config_td_first">蜘蛛池状态：</td>
      <td class="icheck_radios"><label><input type="radio" name="con[web_open]" value="1"<?php if($this->_var['web_open']): ?> checked<?php endif; ?>>开启</label>
			<label><input type="radio" name="con[web_open]" value="0"<?php if(! $this->_var['web_open']): ?> checked<?php endif; ?>>停止</label>
			 <span class="tips"></span>
		</td>
    </tr>
	
	<tr class="tdbg">
      <td align="right" class="config_td_first">屏蔽游客访问：</td>
      <td class="icheck_radios"><label><input type="radio" name="con[web_user_ban]" value="1"<?php if($this->_var['web_user_ban']): ?> checked<?php endif; ?>>是</label>
			<label><input type="radio" name="con[web_user_ban]" value="0"<?php if(! $this->_var['web_user_ban']): ?> checked<?php endif; ?>>否</label>
			 <span class="tips">禁止非蜘蛛用户访问</span>
			</td>
    </tr>

	<tr class="tdbg">
      <td align="right" class="config_td_first">禁止IP地址直接访问：</td>
      <td class="icheck_radios"><label><input type="radio" name="con[web_ip_ban]" value="1"<?php if($this->_var['web_ip_ban']): ?> checked<?php endif; ?>>是</label>
			<label><input type="radio" name="con[web_ip_ban]" value="0"<?php if(! $this->_var['web_ip_ban']): ?> checked<?php endif; ?>>否</label>
			 <span class="tips">禁止使用服务器IP地址直接访问网站前台</span>
			</td>
    </tr>

	<tr class="tdbg">
      <td align="right" class="config_td_first">屏蔽外部域名：</td>
		<td class="icheck_radios"><label><input type="radio" name="con[web_limit_domain_type]" value="301" <?php if($this->_var['web_limit_domain_type'] == 301): ?> checked<?php endif; ?>>随机重定向到现有域名</label>
				<label><input type="radio" name="con[web_limit_domain_type]" value="maps" <?php if($this->_var['web_limit_domain_type'] == 'maps'): ?> checked<?php endif; ?>>显示站点轮链（模板在template/maps.html）</label>
				<label><input type="radio" name="con[web_limit_domain_type]" value="401" <?php if($this->_var['web_limit_domain_type'] == 401): ?> checked<?php endif; ?>>直接屏蔽</label>
				<label><input type="radio" name="con[web_limit_domain_type]" value="" <?php if($this->_var['web_limit_domain_type'] == ''): ?> checked<?php endif; ?>>不处理</label>
				<span class="tips">（如何处理非本站添加的域名！）</span>
			</td>
    </tr>

	<tr class="tdbg">
      <td align="right" class="config_td_first">游客访问跳转：</td>
      <td class="icheck_radios"><label><input type="radio" name="con[web_user_jump]" value="1"<?php if($this->_var['web_user_jump']): ?> checked<?php endif; ?>>是</label>
			<label><input type="radio" name="con[web_user_jump]" value="0"<?php if(! $this->_var['web_user_jump']): ?> checked<?php endif; ?>>否</label>
			 <span class="tips">非蜘蛛用户访问后自动跳转到指定地址</span>
			</td>
    </tr>

    <tr class="tdbg">
      <td width="150" align="right" class="config_td_first">跳转地址：</td>
      <td class="tdbg"><input name="con[web_jumpurl]" type="text" class="input" value="<?php echo empty($this->_var['web_jumpurl']) ? 'http://' : $this->_var['web_jumpurl']; ?>" size="80"></td>
    </tr>

	<tr class="tdbg">
      <td align="right" class="config_td_first">流量统计代码：</td>
      <td><textarea name="con[web_tongji]"  rows="3"  class="inputs" style="width:450px;"><?php echo $this->_var['web_tongji']; ?></textarea></td>
    </tr>

	<tr class="tdbg">
      <td align="right" class="config_td_first">百度JS自动推送代码：</td>
      <td><textarea name="con[web_bdpush]"  rows="3"  class="inputs" style="width:450px;"><?php echo $this->_var['web_bdpush']; ?></textarea></td>
    </tr>

	<tr class="tdbg">
      <td align="right" class="config_td_first">分享代码：</td>
      <td><textarea name="con[web_share]"  rows="3"  class="inputs" style="width:450px;"><?php echo $this->_var['web_share']; ?></textarea></td>
    </tr>

	<tr class="tdbg">
      <td align="right" class="config_td_first">页面顶部插入代码：</td>
      <td class="icheck_radios"><label><input type="radio" name="con[web_inserttop]" value="1"<?php if($this->_var['web_inserttop']): ?> checked<?php endif; ?>>是</label>
			<label><input type="radio" name="con[web_inserttop]" value="0"<?php if(! $this->_var['web_inserttop']): ?> checked<?php endif; ?>>否</label>
			 <span class="tips">在页面顶部插入代码，一般用于广告</span>
			</td>
    </tr>
	<tr class="tdbg">
      <td align="right" class="config_td_first">顶部插入的代码：</td>
      <td><textarea name="con[web_inserttop_code]"  rows="3"  class="inputs" style="width:450px;"><?php echo $this->_var['web_inserttop_code']; ?></textarea></td>
    </tr>
	
</table>
<table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" id="config1" style="display:none" class="tableConfig">
	<tr class="tdbg item_title">
		<td width="150" align="right"><i class="typcn typcn-cog"></i> 页面设置</td>
		<td></td>
	</tr>
	<tr class="tdbg">
      <td align="right" class="config_td_first">GZIP页面压缩：</td>
      <td class="icheck_radios"><label><input type="radio" name="con[web_gzip_open]" value="1"<?php if($this->_var['web_gzip_open']): ?> checked<?php endif; ?>>开启</label>
			<label><input type="radio" name="con[web_gzip_open]" value="0"<?php if(! $this->_var['web_gzip_open']): ?> checked<?php endif; ?>>关闭</label>　<span>加快访问速度，轻微加重服务器负担，需服务器支持</span></td>
    </tr>
	
	<tr class="tdbg">
      <td align="right" class="config_td_first">记录后台操作IP：</td>
      <td class="icheck_radios"><label><input type="radio" name="con[aclogs_ip]" value="1"<?php if($this->_var['aclogs_ip']): ?> checked<?php endif; ?>>开启</label>
			<label><input type="radio" name="con[aclogs_ip]" value="0"<?php if(! $this->_var['aclogs_ip']): ?> checked<?php endif; ?>>关闭</label>　<span>后台操作日志是否记录IP</span></td>
    </tr>
	<tr class="tdbg">
      <td align="right" class="config_td_first">调试模式：</td>
      <td class="icheck_radios"><label><input type="radio" name="con[web_debug]" value="1"<?php if($this->_var['web_debug']): ?> checked<?php endif; ?>>开启</label>
			<label><input type="radio" name="con[web_debug]" value="0"<?php if(! $this->_var['web_debug']): ?> checked<?php endif; ?>>关闭</label>　<span>开启将关闭缓存以及输出php错误</span></td>
    </tr>
	<tr class="tdbg item_title">
		<td width="150" align="right"><i class="typcn typcn-cog"></i> 错误页设置</td>
		<td></td>
	</tr>
	<tr class="tdbg">
      <td align="right" class="config_td_first">网站关闭页：<br><font color="blue">( 蜘蛛池状态停止时显示 )</font></td>
     <td><textarea name="errpages[webclose]" class="inputs" style="width:550px;padding:1px;height:200px"><?php echo $this->_var['errpages']['webclose']; ?></textarea></td>
    </tr>
	<tr class="tdbg">
      <td align="right" class="config_td_first">游客屏蔽页：<br><font color="blue">( 屏蔽游客时显示 )</font></td>
     <td><textarea name="errpages[userban]" class="inputs" style="width:550px;padding:1px;height:200px"><?php echo $this->_var['errpages']['userban']; ?></textarea></td>
    </tr>
	<tr class="tdbg">
      <td align="right" class="config_td_first">外部域名屏蔽页：<br><font color="blue">( 外部域名屏蔽时显示 )</font></td>
     <td><textarea name="errpages[domainban]" class="inputs" style="width:550px;padding:1px;height:200px"><?php echo $this->_var['errpages']['domainban']; ?></textarea></td>
    </tr>
	<tr class="tdbg">
      <td align="right" class="config_td_first">域名前缀屏蔽页：<br><font color="blue">( 域名前缀屏蔽时显示 )</font></td>
     <td><textarea name="errpages[prefixban]" class="inputs" style="width:550px;padding:1px;height:200px"><?php echo $this->_var['errpages']['prefixban']; ?></textarea></td>
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

<?php echo $this->fetch('footer.html'); ?>
</body>
</html>