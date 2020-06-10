<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)">蜘蛛设置</a></li>
</ul>
<div id="admin_right_b">

<form action="?admin-robot-update-utype-redirect" method="post">
<table border="0" cellpadding="8" cellspacing="0" class="tableConfig">
<tr class="tdbg item_title">
	<td align="right"><i class="typcn typcn-cog"></i> 基本设置</td>
	<td></td>
</tr>
<tr>
	<td width="120" align="right" class="config_td_first">蜘蛛访问记录开关：</td>
	<td class="icheck_radios"><label><input type="radio" name="con[web_robot_log]" value="1" <?php if($this->_var['web_robot_log']): ?> checked<?php endif; ?>>开启</label>
	<label><input type="radio" name="con[web_robot_log]" value="0" <?php if(! $this->_var['web_robot_log']): ?> checked<?php endif; ?>>关闭</label>
	</td>
</tr>
<tr>
	<td align="right" class="config_td_first">访问css、js、图片的蜘蛛：</td>
	<td class="icheck_radios"><label><input type="radio" name="con[robot_pic]" value="0" <?php if(! $this->_var['robot_pic']): ?> checked<?php endif; ?>>不处理</label>
	<label><input type="radio" name="con[robot_pic]" value="1" <?php if($this->_var['robot_pic'] == 1): ?> checked<?php endif; ?>>不记录</label>
	<label><input type="radio" name="con[robot_pic]" value="2" <?php if($this->_var['robot_pic'] == 2): ?> checked<?php endif; ?>>直接屏蔽</label>
	</td>
</tr>
<tr class="tdbg item_title">
	<td align="right"><i class="typcn typcn-cog"></i> 蜘蛛强引设置</td>
	<td></td>
</tr>
<tr>
	<td align="right" class="config_td_first">蜘蛛强引开关：</td>
	<td class="icheck_radios"><label><input type="radio" name="con[robot_redirect_open]" value="1" <?php if($this->_var['robot_redirect_open']): ?> checked<?php endif; ?>>开启</label>
	<label><input type="radio" name="con[robot_redirect_open]" value="0" <?php if(! $this->_var['robot_redirect_open']): ?> checked<?php endif; ?>>关闭</label>
	<span class="tips" style="color:red"><i class="typcn typcn-info"></i>开启后将强制把蜘蛛劫持引到外链上，慎用，蜘蛛会变少</span>
	</td>
</tr>
<tr>
	<td align="right" class="config_td_first">指定网站分组：</td>
	<td><input type="hidden" name="con[robot_redirect_group]" id="robot_redirect_group_value" value="<?php echo $this->_var['robot_redirect_group']; ?>" /><font id="robot_redirect_group_items" color="#ff6600"><?php if(! $this->_var['robot_redirect_group_name']): ?>未选择<?php else: ?><?php echo $this->_var['robot_redirect_group_name']; ?><?php endif; ?></font>&nbsp;&nbsp;<a href="javascript:" class="button button_small" onclick="select_group('robot_redirect');">点击选择</a> <span class="tips" style="color:red"><i class="typcn typcn-info"></i>选中的分组才进行强引</span></td>
</tr>
<tr>
	<td align="right" class="config_td_first">指定蜘蛛：</td>
	<td><input type="hidden" name="con[robot_redirect_items]" id="rb_value" value="<?php echo $this->_var['robot_redirect_items_v']; ?>" /><font id="rb_items" color="#ff6600"><?php if(! $this->_var['robot_redirect_itemsname']): ?>不限制<?php else: ?><?php echo $this->_var['robot_redirect_itemsname']; ?><?php endif; ?></font>&nbsp;&nbsp;<a href="javascript:" class="button button_small" onclick="select_robots();">点击选择</a> <span class="tips" style="color:red"><i class="typcn typcn-info"></i>选中的蜘蛛才进行强引，一个不选则全部强引</span></td>
</tr>
<tr>
	<td align="right" class="config_td_first">权重传递：</td>
	<td class="icheck_radios"><label><input type="radio" name="con[robot_redirect_weight]" value="301" <?php if($this->_var['robot_redirect_weight'] == '301'): ?> checked<?php endif; ?>>是</label>
	<label><input type="radio" name="con[robot_redirect_weight]" value="302" <?php if(!$this->_var['robot_redirect_weight']||$this->_var['robot_redirect_weight'] == '302'): ?> checked<?php endif; ?>>否</label>
	</td>
</tr>
<tr class="tdbg">
  <td align="right" class="config_td_first">蜘蛛强引概率：</td>
  <td class="tdbg"><input name="con[robot_redirect_odds]" type="text" class="input" value="<?php echo empty($this->_var['robot_redirect_odds']) ? 60 : $this->_var['robot_redirect_odds']; ?>" size="12">
  <span class="tips">1到100的概率设置，100为100%</span>
  </td>
</tr>
<tr class="tdbg">
  <td align="right" class="config_td_first">强引时间段：</td>
  <td class="tdbg"><input name="con[robot_redirect_starttime]" type="text" onClick="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="input Wdate" style="width:130px;" value="<?php if($this->_var['robot_redirect_starttime']): ?><?php echo date('Y-m-d H:i',$this->_var['robot_redirect_starttime']); ?><?php endif; ?>">
  &nbsp;至 &nbsp;<input name="con[robot_redirect_endtime]" type="text" onClick="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="input Wdate" style="width:130px;" value="<?php if($this->_var['robot_redirect_endtime']): ?><?php echo date('Y-m-d H:i',$this->_var['robot_redirect_endtime']); ?><?php endif; ?>">
  <span class="tips">不填则为不限制</span>
  </td>
</tr>
<tr>
	<td align="right" class="config_td_first">强引外链类型：</td>
	<td class="icheck_radios"><label><input type="radio" name="con[robot_redirect_type]" value="system" <?php if(!$this->_var['robot_redirect_type']||$this->_var['robot_redirect_type'] == 'system'): ?> checked<?php endif; ?>>系统外链（<font color="red">外链管理里的</font>）</label>
	<label><input type="radio" name="con[robot_redirect_type]" value="custom" <?php if($this->_var['robot_redirect_type'] == 'custom'): ?> checked<?php endif; ?>>自定义外链</label>
	</td>
</tr>
<tr class="list">
  <td align="right" class="config_td_first">自定义强引外链：</td>
  <td>↑↑↑上面的类型需设置为自定义外链，建议1000条以内<br><textarea name="robot_redirect_data" type="text" style="height:250px;width:600px;"><?php echo $this->_var['robot_redirect_data']; ?></textarea></td>
</tr>
</table>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
    <tr class="tdbg">
	  <td width="130" align="center" class="tdbg">&nbsp;</td>
      <td><button type="submit" id="dosave" class="button button_submit">保存设置</button></td>
    </tr>
	</table>
</form>
<div class="runtime"></div>  
</div>
<div style="display:none">
<script id="robot_list_box" type="text/px-templates">
<form method="post">
<table align="center" cellpadding="8" cellspacing="1" id="robot_list">
		<tr align="center">
		  <td width="110" align='center' class="title_bg">蜘蛛</td>
		  <td width="110" align='center' class="title_bg">蜘蛛</td>
		  <td width="110" align='center' class="title_bg">蜘蛛</td>
		</tr>
<?php $i=1; ?>
<?php $_from=$this->_var['robot_list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('key', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['key'] => $this->_var['vo']):
?>
<?php if($i==1):?><tr><?php endif; ?>
	<td align="right"><label for="in_<?php echo $this->_var['key']; ?>"><?php echo $this->_var['vo']; ?></label><input type="checkbox" title="<?php echo $this->_var['vo']; ?>" name="robot_redirect_items[]" id="in_<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['key']; ?>" <?php if($this->_var['robot_redirect_items'] && in_array ( $this->_var['key'] , $this->_var['robot_redirect_items'] )): ?> checked<?php endif; ?> /></td>
		<?php if($i!=$this->_var['list_last'] and ($i%3==0)):?>
			</tr><tr>
		<?php endif; ?>
	<?php $i++; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars(); ?>
<tr bgcolor='#ffffff' style="border-top:1px solid #eee">
	<td colspan="4">
		<label><input name="chkall" type="checkbox" id="chkall" onclick=checkall(this.form) value="checkbox"> 全选/反选</label>
		<button type="button" class="button" onclick="select_robots_ok();">确定选择</button>
	</td>
</tr>
</table>
</form>
</script>
</div>
<script type="text/javascript">
var dialog;
function select_robots(){
	if($('#robot_list').length<1){
		dialog=art.dialog({ content:$('#robot_list_box').html(),lock:true,opacity:0.3,title:'选择蜘蛛',id:'rifrm'});
	}else{
		dialog.show();
	}
}
function select_robots_ok(){
	var rb=new Array();
	var rbtitle=new Array();
	$('#robot_list input[type="checkbox"]:checked').each(function(i,item) {
		rb[i]=$(this).val();
		rbtitle[i]=$(this).attr('title');
	});
	var rbvalue=rb.join(',');
	var rbtitles=rbtitle.join(',');
	if(rbvalue==''){
		rbvalue='不限制';
	}
	$('#rb_items').html(rbtitles);
	$('#rb_value').val(rbvalue);
	dialog.hide();
}
</script>
<?php echo $this->fetch('group_list.html'); ?>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>