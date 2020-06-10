<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)" onClick="selectTab('config0',this)">域名设置</a></li>
	<li class="unsub"><a href="javascript:void(0)" onClick="selectTab('config1',this)">站点模式</a></li>
	<li class="unsub"><a href="javascript:void(0)" onClick="selectTab('config2',this)">内容模式</a></li>
	<li class="unsub"><a href="javascript:void(0)" onClick="selectTab('config3',this)">MIP设置(<font color="#ff6600">new</font>)</a></li>
	<li class="unsub"><a href="javascript:void(0)" onClick="selectTab('config4',this)">手机版设置</a></li>
</ul>
<div id="admin_right_b">
<form method="post">
<input type="hidden" name="r[id]" value="<?php echo empty($this->_var['id']) ? 0 : $this->_var['id']; ?>">
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableConfig" id="config0">
	<tr class="tdbg item_title">
		<td width="100" align="right"><i class="typcn typcn-cog"></i> 域名设置</td>
		<td></td>
	</tr>
	<tr>
      <td width="100" align="right" class="config_td_first">分组名称：</td>
      <td class="tdbg" colspan="4"><input name="r[name]" type="text" value="<?php echo $this->_var['name']; ?>" class="input" size="20"> <font color="#ff3300">*</font> <span>给本分组起个名字</span></td>
    </tr>
	<tr>
      <td align="right" class="config_td_first">保存文件夹：</td>
      <td class="tdbg" colspan="4"><input name="r[dirname]" id="dirname" type="text" value="<?php echo $this->_var['dirname']; ?>" class="input" size="20"> <font color="#ff3300">*</font> <font size="" color="red">填字母数字</font>，<span>分组的关键词和外链将放在此文件夹</span></td>
    </tr>
	<tr>
	  <td align="right" class="config_td_first">所属模型：</td>
	  <td class="tdbg"><select name="r[cid]" id="cid">
	  <?php $_from=$this->_var['classlist']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['vo']):
?>
		<option dir="<?php echo $this->_var['vo']['dirname']; ?>" value="<?php echo $this->_var['vo']['id']; ?>" <?php if($this->_var['vo']['id'] == $this->_var['cid']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['vo']['name']; ?></option>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
	  </select> <span></span></td>
	</tr>
	<tr>
	 <td align="right" class="config_td_first">根域名(一行一个)：</td>
	  <td><textarea name="domain" id="text" type="text" style="height:220px;width:350px;"><?php echo $this->_var['domain']; ?></textarea></td>
	</tr>
	
</table>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableConfig" id="config1" style="display:none">
	<tr class="tdbg item_title">
		<td width="100" align="right"><i class="typcn typcn-cog"></i> 站点模式</td>
		<td></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">站点模式：</td>
	  <td><select name="r[domain_mod]">
		<option value="1" <?php if(!$this->_var['domain_mod']||$this->_var['domain_mod'] == '1'): ?> selected="selected"<?php endif; ?>>泛域名</option>
		<option value="2" <?php if($this->_var['domain_mod'] == '2'): ?> selected="selected"<?php endif; ?>>单域名</option>
	  </select>&nbsp;&nbsp;<span>泛域名需泛解析</span></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">301重定向到www：</td>
	  <td class="icheck_radios"><label><input type="radio" name="con[rewww]" value="1" <?php if($this->_var['rewww'] == 1): ?> checked<?php endif; ?>>全部重定向</label>
			<label><input type="radio" name="con[rewww]" value="2" <?php if($this->_var['rewww'] == 2): ?> checked<?php endif; ?>>顶级域名重定向</label>
			<label><input type="radio" name="con[rewww]" value="0" <?php if(! $this->_var['rewww']): ?> checked<?php endif; ?>>关闭</label></td>
	</tr>
	<tr class="tdbg">
      <td align="right" class="config_td_first">泛域名前缀：</td>
      <td class="icheck_radios prefix_type"><label><input type="radio" name="con[prefix_type]" value="1"<?php if($this->_var['prefix_type']): ?> checked<?php endif; ?> onclick="$('.make').show();$('.automake').hide();">自定义（<font color="red">推荐</font>）</label>
			<label><input type="radio" name="con[prefix_type]" value="0"<?php if(! $this->_var['prefix_type']): ?> checked<?php endif; ?> onclick="$('.automake').show();$('.make').hide();">自动生成</label>
			 <span class="tips"></span>
		</td>
    </tr>
	<script type="text/javascript">
		$('.prefix_type input').on('ifChecked ifClicked', function(event){
			if(this.value==1){
				$('.make').show();$('.automake').hide();
			}
			if(this.value==0){
				$('.automake').show();$('.make').hide();
			}
		});
	</script>
	<tr <?php if($this->_var['prefix_type']): ?> style="display:none"<?php endif; ?> class="automake">
      <td align="right" class="config_td_first">自动生成前缀：</td>
      <td class="tdbg">生成级数：<input name="con[prefix_leve]" type="text" class="input" size="2" value="<?php echo empty($this->_var['prefix_leve']) ? 1 : $this->_var['prefix_leve']; ?>">&nbsp;级 ，随机范围：<input name="con[prefix_start]" type="text" class="input" size="2" value="<?php echo empty($this->_var['prefix_start']) ? 5 : $this->_var['prefix_start']; ?>">&nbsp;至&nbsp;<input name="con[prefix_end]" type="text" class="input" size="2" value="<?php echo empty($this->_var['prefix_end']) ? 5 : $this->_var['prefix_end']; ?>">&nbsp;位数</td>
    </tr>
	<tr <?php if(! $this->_var['prefix_type']): ?> style="display:none"<?php endif; ?> class="make">
	  <td align="right" class="config_td_first">屏蔽非自定义泛前缀访问</td>
	  <td class="tdbg icheck_radios"><label><input type="radio" name="con[ban_prefix]" value="1" <?php if($this->_var['ban_prefix']): ?> checked<?php endif; ?>>开启</label>
			<label><input type="radio" name="con[ban_prefix]" value="0" <?php if(! $this->_var['ban_prefix']): ?> checked<?php endif; ?>>关闭</label>　<span>屏蔽非自定义泛前缀的域名访问</span></td>
	</tr>
	<tr <?php if(! $this->_var['prefix_type']): ?> style="display:none"<?php endif; ?> class="make">
		<td></td>
		<td class="tdbg"><font color="blue">注：如果前缀使用了标签并且超过50个，不要屏蔽，否则会卡</font></td>
	</tr>
	<tr <?php if(! $this->_var['prefix_type']): ?> style="display:none"<?php endif; ?> class="make">
	 <td align="right" class="config_td_first">自定义泛域名前缀：<br>(一行一个<br>注：不要超过1000)</td>
	  <td><span class="red">支持标签：{数字}、{字母}、{数字字母}<br>标签后面加数字是位数，{数字8}表示8个数字、{数字1-8}示随机1-8个数字<br></span><textarea name="domain_prefix" type="text" style="height:180px;width:350px;"><?php echo $this->_var['domain_prefix']; ?></textarea></td>
	</tr>
	<tr class="tdbg item_title">
		<td width="100" align="right"><i class="typcn typcn-cog"></i> URL设置</td>
		<td></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">URL模式：</td>
	  <td><select name="r[urltype]">
		<option value="1" <?php if($this->_var['urltype'] == 1): ?> selected="selected"<?php endif; ?>>随机模式</option>
		<option value="2" <?php if($this->_var['urltype'] == 2): ?> selected="selected"<?php endif; ?>>固定模式</option>
	  </select>&nbsp;&nbsp;<span>即模型里的2套URL模式选择</span></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">URL缓存开关：</td>
	  <td><select name="con[urlrules_cache]">
		<option value="1" <?php if($this->_var['urlrules_cache'] || $this->_var['urlrules_cache'] == ''): ?> selected="selected"<?php endif; ?>>开启</option>
		<option value="0" <?php if($this->_var['urlrules_cache'] == '0'): ?> selected="selected"<?php endif; ?>>关闭</option>
	  </select>&nbsp;&nbsp;<span>开启后可实现一个站点固定一条url规则，不开启则随机获取</span></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">URL路径：</td>
	  <td class="tdbg icheck_radios"><label><input type="radio" name="con[url_prefix]" value="1" <?php if($this->_var['url_prefix'] == 1 || $this->_var['url_prefix'] == ''): ?> checked<?php endif; ?>>绝对路径</label>
			<label><input type="radio" name="con[url_prefix]" value="2" <?php if($this->_var['url_prefix'] == 2): ?> checked<?php endif; ?>>相对路径</label>　<span>相对路径不带域名</span></td>
	</tr>
</table>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableConfig" id="config2" style="display:none">
	<tr class="tdbg item_title">
		<td width="100" align="right"><i class="typcn typcn-cog"></i> 内容模式设置</td>
		<td></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">导航缓存：</td>
	  <td><select name="con[menu_cache]">
		<option value="1" <?php if($this->_var['menu_cache']): ?> selected="selected"<?php endif; ?>>开启</option>
		<option value="0" <?php if(! $this->_var['menu_cache']): ?> selected="selected"<?php endif; ?>>关闭</option>
	  </select>&nbsp;&nbsp;<span>开启后可实现当前域名固定导航</span></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">自定义导航库：</td>
	  <td><input name="con[typefile]" type="text" id="typefile" value="<?php echo $this->_var['typefile']; ?>" class="input" style="text-align:right" size="10"> <button onclick="window.parent.select_file(document,'typefile','typename/'+$('#cid').find('option:selected').attr('dir'));" type="button" class="button">选择</button> <span>即网站头部的导航，不填则随机取自栏目库</span></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">自定义标题库：</td>
	  <td><input name="con[titlefile]" type="text" id="titlefile" value="<?php echo $this->_var['titlefile']; ?>" class="input" style="text-align:right" size="10"> <button onclick="window.parent.select_file(document,'titlefile','title/'+$('#cid').find('option:selected').attr('dir'));" type="button" class="button">选择</button> <span>内容类型为句子拼凑时使用，不选则随机调用</span></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">内容类型：</td>
	  <td><select name="r[bodytype]">
		<option value="1" <?php if($this->_var['bodytype'] == 1): ?> selected="selected"<?php endif; ?>>文章库内容</option>
		<option value="2" <?php if($this->_var['bodytype'] == 2): ?> selected="selected"<?php endif; ?>>句子拼凑</option>
	  </select>&nbsp;&nbsp;</td>
	</tr>
	<tr>
	  <td align="right" class="tdbg">注：</td>
	  <td><font color="red">1. 选择文章库内容时，标题、缩略图等从文章库内容中提取<br>2. 选择句子拼凑时，标题是从标题库中提取<br>3. 句子拼凑的格式可在 <font color="blue">TKDB调用模板->内容模板中设置</font></font></td>
	</tr>
</table>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableConfig" id="config3" style="display:none">

	<tr class="tdbg item_title">
		<td width="100" align="right"><i class="typcn typcn-cog"></i> MIP模块设置</td>
		<td></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">是否MIP站点：</td>
	  <td><select name="con[mip_open]">
		<option value="1" <?php if($this->_var['mip_open']): ?> selected="selected"<?php endif; ?>>是</option>
		<option value="0" <?php if(! $this->_var['mip_open']): ?> selected="selected"<?php endif; ?>>否</option>
	  </select>&nbsp;&nbsp;<span>当前站点是否设为MIP站点，MIP站点使用MIP模板</span></td>
	</tr>
	<tr>
      <td align="right" class="config_td_first">mip域名前缀：</td>
      <td class="tdbg" colspan="4"><input name="con[mip_prefix]" type="text" value="<?php echo $this->_var['mip_prefix']; ?>" class="input" size="10"> <span>mip域名前缀，如：mip，当域名前缀为该设置时设为MIP站点</span></td>
    </tr>
	<tr>
	  <td class="tdbg">&nbsp;</td>
	  <td><font color="red">注：mip域名前缀设置为空时，本分组下的全部域名都视为MIP站点（请关闭手机版)</font></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">无视MIP效验：</td>
	  <td><select name="con[mip_nosee]">
		<option value="1" <?php if($this->_var['mip_nosee']): ?> selected="selected"<?php endif; ?>>开启</option>
		<option value="0" <?php if(! $this->_var['mip_nosee']): ?> selected="selected"<?php endif; ?>>关闭</option>
	  </select>&nbsp;<span>关闭后，系统设置的广告，统计将无效，以便通过MIP效验</span></td>
	</tr>
	<tr>
	  <td class="tdbg">&nbsp;</td>
	  <td><font color="red">· 关闭才能通过效验，不过统计广告这些自定义js是无法通过效验的<br>· 通不过效验就进不了百度MIP索引，变成普通站点</font></td>
	</tr>
	<tr class="tdbg item_title">
		<td width="100" align="right"><i class="typcn typcn-cog"></i> MIP统计设置</td>
		<td><font color="blue" style="font-weight:500">（MIP引擎只支持以下统计，开启无视MIP效验时，将使用系统设置里的）</font></td>
	</tr>
	<tr>
      <td align="right" class="config_td_first">百度统计token：</td>
      <td class="tdbg" colspan="4"><input name="con[mip_tj_bdtk]" type="text" value="<?php echo $this->_var['mip_tj_bdtk']; ?>" class="input" size="20"> <span>百度统计代码里的token的值，一般是32位的字符</span></td>
    </tr>
	<tr>
      <td align="right" class="config_td_first">cnzz统计token：</td>
      <td class="tdbg" colspan="4"><input name="con[mip_tj_cnzztk]" type="text" value="<?php echo $this->_var['mip_tj_cnzztk']; ?>" class="input" size="20"> <span>cnzz友盟统计的token，一般是一串数字</span></td>
    </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableConfig" id="config4" style="display:none">
	<tr class="tdbg item_title">
		<td width="100" align="right"><i class="typcn typcn-cog"></i> 手机版设置</td>
		<td></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">开启手机版：</td>
	  <td><select name="con[mobile_open]">
		<option value="1" <?php if($this->_var['mobile_open']): ?> selected="selected"<?php endif; ?>>开启</option>
		<option value="0" <?php if(! $this->_var['mobile_open']): ?> selected="selected"<?php endif; ?>>关闭</option>
	  </select>&nbsp;&nbsp;<span>是否开启手机版</span></td>
	</tr>
	<tr class="tdbg">
	  <td align="right" class="config_td_first">地址跳转：</td>
	  <td><select name="con[mobile_jump]">
		<option value="1" <?php if($this->_var['mobile_jump']): ?> selected="selected"<?php endif; ?>>开启</option>
		<option value="0" <?php if(! $this->_var['mobile_jump']): ?> selected="selected"<?php endif; ?>>关闭</option>
	  </select>&nbsp;&nbsp;<span>手机访问时自动转到手机版地址</span></td>
	</tr>
	<tr>
      <td align="right" class="config_td_first">手机域名前缀：</td>
      <td class="tdbg" colspan="4"><input name="con[mobile_prefix]" type="text" value="<?php echo $this->_var['mobile_prefix']; ?>" class="input" size="10"> <font color="#ff3300">*</font> <span>手机版域名前缀，如：m 或者 wap</span></td>
    </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
	<tr>
	  <td width="120" align="center" class="tdbg">&nbsp;</td>
	  <td><button type="button" id="dosave" class="button button_submit">提交保存</button></td>
	</tr>
	</table>
</form>
<script type="text/javascript">
$("#dosave").click(function(){
		var _this=this;
		$(_this).html('正在保存...').attr('disabled','disabled');
		$.ajax({
			type:"post",
			url:"?admin-domain-update",
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
				$(_this).html('提交保存').attr('disabled',false);
			}
		});
	 return false;
	});
</script>
</body>
</html>