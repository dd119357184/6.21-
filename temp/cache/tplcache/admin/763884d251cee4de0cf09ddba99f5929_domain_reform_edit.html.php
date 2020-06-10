<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)" onClick="selectTab('config0',this)">内容优化</a></li>
	<li class="unsub"><a href="javascript:void(0)" onClick="selectTab('config1',this)">其他设置(<span style="color:red;">new</span>)</a></li>
</ul>
<form method="post">
<input type="hidden" name="con[cid]" value="<?php echo empty($this->_var['cid']) ? 0 : $this->_var['cid']; ?>">
<table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" id="config0"  class="tableConfig">
	<tbody>
		<tr class="tdbg item_title">
			<td width="100" align="right"><i class="typcn typcn-cog"></i> 内容优化设置</td>
			<td></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">网站分组：</td>
		  <td class="tdbg"><font color="blue"><?php echo $this->_var['classname']; ?></font></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">标题重组方式：</td>
		  <td>
		  <select name="con[reform_title]">
			<option value="0" <?php if(! $this->_var['reform_title']): ?> selected="selected"<?php endif; ?>>关闭</option>
			<option value="1" <?php if($this->_var['reform_title'] == '1'): ?> selected="selected"<?php endif; ?>>打散重组</option>
			<option value="2" <?php if($this->_var['reform_title'] == '2'): ?> selected="selected"<?php endif; ?>>2个标题重组</option>
			<option value="3" <?php if($this->_var['reform_title'] == '3'): ?> selected="selected"<?php endif; ?>>内容取一句话作为标题</option>
			<option value="4" <?php if($this->_var['reform_title'] == '4'): ?> selected="selected"<?php endif; ?>>内容取一句话加在标题后面</option>
		  </select> <span>标题是否重组方式</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">打散基数：</td>
		  <td class="tdbg"><input name="con[reform_title_base]" type="text" class="input" value="<?php echo empty($this->_var['reform_title_base']) ? '2' : $this->_var['reform_title_base']; ?>" size="10"> <span>范围2-5，越小越乱</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">内容句子打乱：</td>
		  <td class="icheck_radios"><label><input type="radio" name="con[shuffle_content]" value="1" <?php if($this->_var['shuffle_content']): ?> checked<?php endif; ?>>开启</label>
				<label><input type="radio" name="con[shuffle_content]" value="0" <?php if(! $this->_var['shuffle_content']): ?> checked<?php endif; ?>>关闭</label>　<span>内容句子打乱重组</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">内容关联标题：</td>
		  <td class="icheck_radios"><label><input type="radio" name="con[insert_title2content]" value="1" <?php if($this->_var['insert_title2content'] || $this->_var['insert_title2content'] == null): ?> checked<?php endif; ?>>开启</label>
				<label><input type="radio" name="con[insert_title2content]" value="0" <?php if($this->_var['insert_title2content'] == '0'): ?> checked<?php endif; ?>>关闭</label>　<span>标题分词分布插入内容，提升内容标题相关度</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">内容库繁体转换：</td>
		  <td class="icheck_radios"><label><input type="radio" name="con[tobig5]" value="1" <?php if($this->_var['tobig5']): ?> checked<?php endif; ?>>开启</label>
				<label><input type="radio" name="con[tobig5]" value="0" <?php if(! $this->_var['tobig5']): ?> checked<?php endif; ?>>关闭</label>　<span>可将内容库的标题、内容等即时转换成繁体</span></td>
		</tr>
		
		<tr class="tdbg">
		  <td align="right" class="config_td_first">unicode转码：</td>
		  <td class="icheck_radios">
				<label><input type="checkbox" name="unicode[]" value="tkd" <?php if(in_array('tkd', $this->_var['unicode'] )): ?> checked<?php endif; ?>>TKD(标题,关键词,描述)</label>
				<label><input type="checkbox" name="unicode[]" value="body" <?php if(in_array('body', $this->_var['unicode'] )): ?> checked<?php endif; ?>>内容页内容</label>
				<span>哪些地方进行unicode转码</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">ASCII特殊码插入(<font class="red">标题</font>)：</td>
		  <td class="icheck_radios"><label><input type="radio" name="con[insert_titleascii]" value="1" <?php if($this->_var['insert_titleascii']): ?> checked<?php endif; ?>>开启</label>
				<label><input type="radio" name="con[insert_titleascii]" value="0" <?php if(! $this->_var['insert_titleascii']): ?> checked<?php endif; ?>>关闭</label>　<span>标题插入ASCII特殊码过飓风算法</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">ASCII特殊码插入(<font class="red">内容</font>)：</td>
		  <td class="icheck_radios"><label><input type="radio" name="con[insert_bodyascii]" value="1" <?php if($this->_var['insert_bodyascii']): ?> checked<?php endif; ?>>开启</label>
				<label><input type="radio" name="con[insert_bodyascii]" value="0" <?php if(! $this->_var['insert_bodyascii']): ?> checked<?php endif; ?>>关闭</label>　<span>内容插入ASCII特殊码过飓风算法</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">插入模板干扰标签(<font class="red">new</font>)：</td>
		  <td class="icheck_radios">
				<label><input type="radio" name="con[insert_randtags]" value="1" <?php if($this->_var['insert_randtags'] == 1): ?> checked<?php endif; ?>>老版干扰</label>
				<label><input type="radio" name="con[insert_randtags]" value="2" <?php if($this->_var['insert_randtags'] == 2): ?> checked<?php endif; ?>><font color="red">新版干扰</font></label>
				<label><input type="radio" name="con[insert_randtags]" value="0" <?php if(! $this->_var['insert_randtags']): ?> checked<?php endif; ?>>关闭</label>　<span>自动插入模板干扰标签过飓风算法</span></td>
		</tr>
</tbody>
</table>
<table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" id="config1"  class="tableConfig" style="display:none">
	<tbody>
		<tr class="tdbg item_title">
			<td width="100" align="right"><i class="typcn typcn-cog"></i> 其他设置</td>
			<td></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first">图片url本地化<sup style="color:red">new</sup></td>
		  <td class="icheck_radios"><label><input type="radio" name="con[localpic]" value="1" <?php if($this->_var['localpic']): ?> checked<?php endif; ?>>开启</label>
				<label><input type="radio" name="con[localpic]" value="0" <?php if(! $this->_var['localpic']): ?> checked<?php endif; ?>>关闭</label>　<span>关闭则直接调用原始图片url（句子模式用）</span></td>
		</tr>
		<tr class="tdbg">
		  <td align="right" class="config_td_first" width="120">文章发布时间：</td>
		  <td><select name="con[addtime_type]">
			<option value="1" <?php if(!$this->_var['addtime_type']||$this->_var['addtime_type'] == '1'): ?> selected="selected"<?php endif; ?>>内置时间</option>
			<option value="2" <?php if($this->_var['addtime_type'] == '2'): ?> selected="selected"<?php endif; ?>>当前时间</option>
		  </select></td>
		</tr>

		<tr class="tdbg">
		  <td align="right" class="config_td_first">企业名称自动生成：</td>
		  <td class="icheck_radios"><label><input type="radio" name="con[auto_make_webname]" value="1" <?php if($this->_var['auto_make_webname']): ?> checked<?php endif; ?>>开启</label>
				<label><input type="radio" name="con[auto_make_webname]" value="0" <?php if(! $this->_var['auto_make_webname']): ?> checked<?php endif; ?>>关闭</label>　<span>仅限企业模型</span></td>
		</tr>
	</tbody>
	</table>
	<table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" class="tableConfig">
    <tr class="tdbg">
	  <td width="120">&nbsp;</td>
      <td><button type="submit" id="dosave" class="button button_submit">保存设置</button></td>
    </tr>
	</table>
	</form>
<script>
$("#dosave").click(function(){
	$(this).html('正在保存...');
	$.ajax({
		type:"post",
		url:"?admin-domain-reform_update",
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