<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><?php echo $this->fetch('header.html'); ?>
<body class="body-main">
<ul id="admin_sub_title">
	<li class="sub"><a href="javascript:void(0)" onClick="selectTab('config0',this)">CC防御</a></li>
</ul>
<div id="admin_right_b">
<form method="post">
<table border="0" align="center" cellpadding="8" cellspacing="0" class="tableConfig">
<tr class="tdbg item_title">
	<td align="right"><i class="typcn typcn-cog"></i> 防御参数设置</td>
	<td></td>
</tr>
<tr>
  <td align="right" width="200" class="config_td_first">功能说明：</td>
  <td>
	<div style="color:red">防CC攻击，防止服务器卡死</div>
  </td>
</tr>
<tr>
	<td align="right" class="config_td_first">CC防御开关：</td>
	<td class="icheck_radios">
		<label><input type="radio" name="con[web_cc]" value="1"<?php if($this->_var['web_cc']): ?> checked<?php endif; ?>>开启</label>
		<label><input type="radio" name="con[web_cc]" value="0"<?php if(! $this->_var['web_cc']): ?> checked<?php endif; ?>>关闭</label>
	</td>
</tr>
<tr>
	<td align="right" class="config_td_first">蜘蛛过滤：</td>
	<td><input type="hidden" name="con[web_cc_robot_items]" id="rb_value" value="<?php echo $this->_var['robot_items_v']; ?>" /><font id="rb_items" color="#ff6600"><?php if(! $this->_var['robot_items_name']): ?>不过滤<?php else: ?><?php echo $this->_var['robot_items_name']; ?><?php endif; ?></font>&nbsp;&nbsp;<a href="javascript:" class="button button_small" onclick="select_robots();">点击选择</a> <span class="tips" style="color:red"><i class="typcn typcn-info"></i>选中的蜘蛛则直接跳过防御</span></td>
</tr>
<tr>
  <td align="right" class="config_td_first">CC触发频率：</td>
  <td class="tdbg"><input name="con[web_cc_disnum]" type="text" value="<?php echo $this->_var['web_cc_disnum']; ?>" class="input" size="10"> <font color="#ff3300">*</font> <span>次，每IP每分钟内访问达到该值时，触发CC防御，一般值 90-150，如果域名多可设高点</span></td>
</tr>
<tr>
  <td align="right" class="config_td_first">CC封印时间：</td>
  <td class="tdbg"><input name="con[web_cc_distime]" type="text" value="<?php echo $this->_var['web_cc_distime']; ?>" class="input" size="10"> <font color="#ff3300">*</font> <span>秒，触发CC的IP的封印时间，留空或者0则永久封印！</span></td>
</tr>
<tr class="tdbg">
  <td align="right" class="config_td_first"><b>防御白名单：</b><br>每行一个IP地址/(C段)<br>可使用星号通配符<font color=red>*</font><br>
	支持的格式如下：<br>
	<font>192.168.1.100<br>
	192.168.<font color='red'>*</font>.100<br>
	192.168.1.1<font color='red'>~</font>192.168.1.100</font></td>
 <td><textarea name="cc_white" class="inputs" style="width:550px;padding:1px;height:200px"><?php echo $this->_var['cc_white']; ?></textarea></td>
</tr>
<tr >
  <td>&nbsp;</td>
  <td align="left"><button type="submit" id="dosave" class="button button_submit">保存设置</button></td>
</tr>
<tr class="tdbg item_title">
	<td align="right"><i class="typcn typcn-cog"></i> CC封印列表</td>
	<td></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td align="left">
	<table border="0" align="center" cellpadding="8" cellspacing="1">
		<tr align="center">
		  <td width="80" align='center' class="title_bg">序号</td>
		  <td width="200" align='center' class="title_bg">ip地址</td>
		  <td width="150" align='center' class="title_bg">添加时间</td>
		  <td width="150" align='center' class="title_bg">操作</td>
		</tr>
		<?php $_from=$this->_var['list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('k', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['k'] => $this->_var['vo']):
?>
			<tr align="center">
			  <td><?php echo $this->_var['vo']['id']; ?></td>
			  <td><?php echo $this->_var['vo']['ip']; ?></td>
			  <td><?php echo now_date_color($this->_var['vo']['addtime']); ?></td>
			  <td><a href="?admin-cc-del-ip-<?php echo $this->_var['vo']['ip']; ?>" onclick='return confirm("确定删除?删除后不可恢复!");' class="button button_small button_remove">删除</a></td>
			</tr>
		<?php endforeach; else: ?>
			<tr align="center">
			  <td colspan="4">暂时没有记录!</td>
			</tr>
		<?php endif; unset($_from); ?><?php $this->pop_vars(); ?>
	</table>
  </td>
</tr>
</table>
</form>
<div class="runtime"></div>  
</div>
<script type="text/javascript">
$("#dosave").click(function(){
	showDialog();
	$.ajax({
		type:"post",
		url:"<?php echo url('admin/cc/update'); ?>",
		data:$("form").serialize(),
		dataType:'json',
		timeout:28000,
		global:false,
		success:function(data){
			if(data.status==1){
				showAlert('success','恭喜你，修改成功');
			}else{
				showAlert('error',data.info);
			}
		}
	});
 return false;
});
</script>
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
	<td align="right"><label for="in_<?php echo $this->_var['key']; ?>"><?php echo $this->_var['vo']; ?></label><input type="checkbox" title="<?php echo $this->_var['vo']; ?>" name="robot_items[]" id="in_<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['key']; ?>" <?php if($this->_var['robot_items'] && in_array ( $this->_var['key'] , $this->_var['robot_items'] )): ?> checked<?php endif; ?> /></td>
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
		rbvalue='不过滤';
	}
	$('#rb_items').html(rbtitles);
	$('#rb_value').val(rbvalue);
	dialog.hide();
}
</script>
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>