<?php if(!defined('IN_TXTCMS')){define('IN_TXTCMS',true);} ?><script id="group_list_scriptbox" type="text/px-templates">
<form method="post">
<table align="center" cellpadding="3" cellspacing="1" class="table_b">
<tr>
  <td width="50" align='center' class="title_bg">选择</td>
  <td width="120" align='center' class="title_bg">分组名称</td>
  <td width="120" align='center' class="title_bg">所属模型</td>
  <td width="150" class="title_bg">域名</td>
  <td width="70" align='center' class="title_bg">网站模式</td>
</tr>
<tbody id="group_list">
<tr bgcolor='#fff2d5'>
  <td align="center" height="25"><input type="checkbox" value="0" title="全部分组" onclick="select0(this);"  /></td>
  <td align="center" style="color:#ff3300">全部分组</td>
  <td colspan="3" style="color:#ff3300">&nbsp;&nbsp;勾选本项则全部分组都开启，不管是新添加的还是旧的</td>
 </tr>
<?php $_from=$this->_var['group_list']; if(!is_array($_from) && !is_object($_from)){ settype($_from, 'array'); }; $this->push_vars('', 'vo');if(count($_from)):
    foreach($_from AS $this->_var['vo']):
?>
	<tr onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
	  <td align="center" height="25"><input type="checkbox" value="<?php echo $this->_var['vo']['id']; ?>" title="<?php echo $this->_var['vo']['name']; ?>"/></td>
	  <td align="center"><?php echo $this->_var['vo']['name']; ?></td>
	  <td align="center"><?php echo $this->_var['vo']['typename']; ?></td>
	  <td><?php echo $this->_var['vo']['domain']; ?></td>
	  <td align="center"><?php if($this->_var['vo']['domain_mod'] == 2): ?>单域名<?php else: ?>泛域名<?php endif; ?></td>
	 </tr>
	<?php endforeach; else: ?>
	<tr onmouseover=this.bgColor='#EDF8FE'; onmouseout=this.bgColor='#ffffff'; bgcolor='#ffffff'>
		<td align="center" colspan='5' height="25">请先添加网站分组！</td>
	</tr>
	<?php endif; unset($_from); ?><?php $this->pop_vars(); ?>
</tbody>
<tr bgcolor='#ffffff' style="border-top:1px solid #eee">
	<td colspan="5">
		<button type="button" class="button" onclick="select_ok();">确定选择</button>
	</td>
</tr>
</table>
</form>
</script>

<script type="text/javascript">
var dialog;
var body=$('#group_list_scriptbox').html();
var thistype='';
function select0(_this){
	if(_this.checked){
		$('#group_list input:checkbox').each(function(i) {
			if(0!=$(this).val()){
				$(this).attr('disabled',true);
				$(this).attr('checked',false);
			}
		});
		_this.checked=true;
    }else{
		$('#group_list input:checkbox').each(function(i) {
			if(0!=$(this).val()){
				$(this).attr('disabled',false);
			}
		});
		_this.checked=false;
	}
}
function select_group(type){
	thistype=type;
	var typevalue=','+$('#'+type+'_group_value').val()+',';
	dialog=art.dialog({ 
		content:'<div id="group_list_box">'+body+'</div>',
		init: function(){
			console.log('-------------------'+typevalue);
			var select0=false;
			$('#group_list input:checkbox').each(function(i) {
				if(typevalue.indexOf(','+$(this).val()+',')>-1 || typevalue==$(this).val()){
					$(this).attr('checked',true);
					if($(this).val()==0){
						select0=true;
					}
				}
				if(select0 && $(this).val()!=0){
					$(this).attr('disabled',true);
				}
			});
		},
		lock:true,opacity:0.3,title:'选择开启此功能的网站分组',id:'rifrm'+type
	});
	dialog.show();
}
function select_ok(){
	var rb=new Array();
	var rbtitle=new Array();
	$('#group_list input:checkbox:checked').each(function(i) {
		rb[i]=$(this).val();
		rbtitle[i]=$(this).attr('title');
	});
	var rbvalue=rb.join(',');
	var rbtitles=rbtitle.join(',');
	if(rbvalue==''){
		rbtitles='未选择';
	}
	if(rbvalue=='0'){
		rbtitles='全部分组';
	}
	$('#'+thistype+'_group_items').html(rbtitles);
	$('#'+thistype+'_group_value').val(rbvalue);
	dialog.hide();
}
</script>