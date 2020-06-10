<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)">自动采集设置</a></li>
</ul>
<div id="admin_right_b">
<style type="text/css">
.hourtime{ line-height:30px; }
.hourtime label{ margin: 0 10px; }
</style>
<form action="?admin-collect-confupdate" method="post">
<table border="0" cellpadding="8" cellspacing="0" class="tableConfig">
<tr class="tdbg item_title">
	<td align="right"><i class="typcn typcn-cog"></i> 采集发布策略</td>
	<td></td>
</tr>
<tr class="tdbg">
  <td align="right" class="config_td_first">启动发布策略：</td>
  <td class="icheck_radios"><label><input type="radio" name="con[collect_send_type]" value="1" <?php if($this->_var['collect_send_type']): ?> checked<?php endif; ?>>开启</label>
		<label><input type="radio" name="con[collect_send_type]" value="0" <?php if(! $this->_var['collect_send_type']): ?> checked<?php endif; ?>>关闭</label> <span class="red"> 当网站使用随机url时建议开启，目前仅用于文章库和标题库</span>
	</td>
</tr>
<tr>
  <td align="right" class="config_td_first">每次发布(标题)：</td>
  <td><input name="con[collect_send_num_title]" type="text" class="input" value="<?php echo $this->_var['collect_send_num_title']; ?>" size="5"> <span>条，当采集到此数量时才发布，建议100-500</span>
  </td>
</tr>
<tr>
  <td align="right" class="config_td_first">每次发布(文章)：</td>
  <td><input name="con[collect_send_num_body]" type="text" class="input" value="<?php echo $this->_var['collect_send_num_body']; ?>" size="5"> <span>条，当采集到此数量时才发布，建议30-100</span>
  </td>
</tr>
<tr>
  <td align="right" class="config_td_first">每次发布间隔时间：</td>
  <td><input name="con[collect_send_interval]" type="text" class="input" value="<?php echo $this->_var['collect_send_interval']; ?>" size="5"> <span>秒，当采集够数量并且超过这里的时间才发布</span>
  </td>
</tr>
<tr class="tdbg item_title">
	<td align="right"><i class="typcn typcn-cog"></i> 自动采集选项</td>
	<td></td>
</tr>
<tr class="tdbg">
  <td align="right" class="config_td_first">自动采集总开关：</td>
  <td class="icheck_radios"><label><input type="radio" name="con[collect_open]" value="1" <?php if($this->_var['collect_open']): ?> checked<?php endif; ?>>开启</label>
		<label><input type="radio" name="con[collect_open]" value="0" <?php if(! $this->_var['collect_open']): ?> checked<?php endif; ?>>关闭</label></td>
</tr>
<tr>
	<td width="120" align="right" class="config_td_first">自动采集时段：</td>
	<td>
		<div class="hourtime">
		<?php for($i=0;$i<24;$i++){?>
		<?php if($i && $i%5==0){ echo '<br>'; }?>
		<?php $si=$i; if($i<10){ $si='0'.$i; }?>
		<label><input type="checkbox" name="collect_hour[]" value="<?php echo $i;?>" <?php if(in_array($i,$this->_var['collect_hour'])){ echo ' checked'; }?>><?php echo $si;?>时</label>
		<?php }?>
		</div>
		<br>
		<label><input type="checkbox" id='checkall_time'>全选</label>
	</td>
</tr>
<tr>
  <td align="right" class="config_td_first">采集间隔时间：</td>
  <td><input name="con[collect_interval]" type="text" class="input" value="<?php echo $this->_var['collect_interval']; ?>" size="5"> <span class="red">秒，全天采集时建议至少60起步，按需设置</span>
  </td>
</tr>
<tr class="tdbg item_title">
	<td align="right"><i class="typcn typcn-cog"></i> 其他选项</td>
	<td></td>
</tr>
<tr class="tdbg">
  <td align="right" class="config_td_first">保存图片地址：</td>
  <td class="icheck_radios"><label><input type="radio" name="con[collect_getpic]" value="1" <?php if($this->_var['collect_getpic']): ?> checked<?php endif; ?>>开启</label>
		<label><input type="radio" name="con[collect_getpic]" value="0" <?php if(! $this->_var['collect_getpic']): ?> checked<?php endif; ?>>关闭</label>　<span>保存内容中的图片地址到图片库</span></td>
</tr>
<tr>
	  <td>&nbsp;</td>
      <td><button type="submit" class="button button_submit">保存设置</button></td>
    </tr>
	</table>
</form>
<div class="runtime"></div>  
</div>
<script type="text/javascript">
$("#checkall_time").click(function(){   
	if(this.checked){   
		$(".hourtime :checkbox").prop("checked", true);  
	}else{   
		$(".hourtime :checkbox").prop("checked", false);
	}   
});
</script>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>